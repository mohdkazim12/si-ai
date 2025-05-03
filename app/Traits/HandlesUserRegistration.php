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
}
?>