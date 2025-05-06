<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\SchoolHelper;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

trait HandlesUserRegistration
{
    public function registerUser(array $data): User
    {
        $role = $this->checkUserRole($data);

        $userCreated =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_no' => $data['mobile_no'],
            'status' => false,
            'role' => $role,
            'password' => Hash::make($data['password']),
        ]);
        if(!empty($userCreated)){
            $userCreated->assignRole($data['role']);
        }
        return $userCreated;
    }
    /**
     * Return string role
     */
    protected function checkUserRole($data){
        $role =  null;
        if(!empty($data['role'])){
            $rolesArr = SchoolHelper::roles();
            $rolesArrFlip = array_flip($rolesArr);
            $role =  $rolesArrFlip[$data['role']];
        }
        return $role;
        
    }

    public function createStudentProfile($request){
        // dd($request->all());
        try{
            DB::beginTransaction();
            $assignRole = ['role' =>'student'];
            $role = $this->checkUserRole($assignRole);

            // 1. Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile_no' => $request->number,
                'role' => $role,
                'status' => true,
                'password' => Hash::make('12345678'), // Default password, update as needed
            ]);

            if(!empty($user)){
                $user->assignRole($assignRole['role']);
            }
            // 2. Create student
            $student = new Student();
            $student->user_id = $user->id;
            $student->class = $request->class;
            $student->section = $request->section;
            $student->roll_number = $request->roll_number;

            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('students', 'public');
                $student->profile_picture = $path;
            }

            $student->save();

            DB::commit();

            return $student;
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(), 
            ], 500);
        }
    }

    public function getUsersDetails($reqDataArr){
    
        $query = User::query();
        $search = $reqDataArr['search'];
        $role = $reqDataArr['role'];
        $status = $reqDataArr['status'];
        $userType = $reqDataArr['user_type'];
        $apiType = $reqDataArr['apiType'];
        $class = $reqDataArr['class'] ?? null;
        // dd($class);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('mobile_no', 'like', "%$search%")
                ->orWhere('id', 'like', "%$search%");
            });
        }
        if(!empty($userType)){
            $newArr['role'] = strtolower($userType);
            $role =  $this->checkUserRole($newArr);
            $query->where('role',$role);
        }

        $query->when($role, function ($q) use ($role) {
            $q->whereHas('roles', function ($r) use ($role) {
                $r->where('name', $role);
            });
        });

        $query->when($status !== null, function ($q) use ($status) {
            $q->where('status', $status);
        });

        if(!empty($apiType) && $apiType === 'user_attendance_details'){
            $query->with('attendanceDetails');
        }

        if(!empty($apiType) && $apiType === 'student_details_page' || $apiType === 'get_user_details'){
            $query = $query->with('student');
            
        }
        

        $users = $query->paginate($reqDataArr['perPage']);
        $users = $this->_getFormattedPaginatedData($users,$apiType);
        // dd($users);
        return $users;
    }

    private function _getFormattedPaginatedData($paginatedData,$apiType){
        $formattedUsers = [];

        foreach ($paginatedData as $user) {
            $formattedUsers[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile_no' => $user->mobile_no,
                'email_verified_at' => $user->email_verified_at,
                'status' => $user->status,
                'status_label' => $user->status ? 'Active' : 'Inactive',
                'role' => optional($user->roles->first())->id ?? null, // if role is from relation
                'role_label' => optional($user->roles->first())->name ?? 'User', // use relation name
                'created_at' => $user->created_at->format('d M Y'),
                'attendance' => $this->_attendanceDetails($user->attendanceDetails,$apiType),
                'student_details' => $this->_studentDetails($user->student,$apiType),
            ];
        }

        // Reconstruct full pagination structure
        return [
            'current_page' => $paginatedData->currentPage(),
            'data' => $formattedUsers,
            'first_page_url' => $paginatedData->url(1),
            'from' => $paginatedData->firstItem(),
            'last_page' => $paginatedData->lastPage(),
            'last_page_url' => $paginatedData->url($paginatedData->lastPage()),
            'links' => $paginatedData->linkCollection(),
            'next_page_url' => $paginatedData->nextPageUrl(),
            'path' => $paginatedData->path(),
            'per_page' => $paginatedData->perPage(),
            'prev_page_url' => $paginatedData->previousPageUrl(),
            'to' => $paginatedData->lastItem(),
            'total' => $paginatedData->total(),
        ];
    }

    protected function _attendanceDetails($attendanceDetails,$apiType){
        $attendanceDetailsArr =  [];
        if($apiType === 'user_attendance_details' && !empty($attendanceDetails)){
            $attendanceDetailsArr = [
                'is_marked' => true,
                'status' => ucwords($attendanceDetails->status),
            ];
        }
        return $attendanceDetailsArr;
    }

    public function _studentDetails($studentDetails,$apiType){
        $studentDetailsArr =  [];
        if(($apiType === 'student_details_page' || $apiType === 'get_user_details') && !empty($studentDetails)){
            $studentDetailsArr =  [
                'is_student' => true,
                'id' => $studentDetails->id,
                'class' => $studentDetails->class,
                'section' => $studentDetails->section,
                'roll_number' => $studentDetails->roll_number
            ];
        }
        return $studentDetailsArr;
    }
}
?>