<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\SchoolHelper;
use App\Traits\HandlesUserRegistration;

class StudentController extends Controller
{
    use HandlesUserRegistration;
    public function dashboard(Request $request)
    {
        $class = (int)$request->class;

        $query = Student::with('user');
        $class ? $query = $query->where('class',$class) : null;
        $students = $query->orderBy('id','desc')->paginate(4);
        if ($request->ajax()) {
            return response()->json([
                'students' => $students->items(),
                'links' => $students->links('vendor.pagination.custom-ajax')->toHtml(),
            ]);
        }

        return view('dashboard.student', compact('students','class'));
    }

    // public function store(StoreStudentRequest $request)
    // {
    //     try {

            
    //         $this->createStudentProfile($request);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Student and user created successfully.'
    //         ]);
    //     } catch (\Throwable $e) {
    //         DB::rollBack();

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Something went wrong.',
    //             'error' => $e->getMessage(), 
    //         ], 500);
    //     }
    // }


    public function show($id)
    {
        $student = User::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,
                'number' => $student->contact,
                'class' => $student->class,
                'section' => $student->section ?? '',
                'roll_number' => $student->roll_number ?? '',
                'profile_picture' => $student->profile_picture ? Storage::url($student->profile_picture) : null,
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'number' => 'required|string|max:15',
            'class' => 'required|string',
            'section' => 'nullable|string',
            'roll_number' => 'nullable|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student = new User();
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->contact = $validated['number'];
        $student->class = $validated['class'];
        $student->section = $validated['section'];
        $student->roll_number = $validated['roll_number'];

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $student->profile_picture = $path;
        }

        $student->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Student created successfully',
        ]);
    }

    public function update(Request $request, $id)
    {
        dd('update');
        $student = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'number' => 'required|string|max:15',
            'class' => 'required|string',
            'section' => 'nullable|string',
            'roll_number' => 'nullable|string|max:50',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->contact = $validated['number'];
        $student->class = $validated['class'];
        $student->section = $validated['section'];
        $student->roll_number = $validated['roll_number'];

        if ($request->hasFile('profile_picture')) {
            // Delete old image if exists
            if ($student->profile_picture) {
                Storage::disk('public')->delete($student->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $student->profile_picture = $path;
        }

        $student->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Student updated successfully',
        ]);
    }

    public function studentDetails(Request $request){
        $apiType = 'student_details_page';

        $reqDataArr = [
            'search' => $request->input('search'),
            'perPage' => $request->input('per_page', 10),
            'class' => $request->class,
            'role' => null,
            'status' => (int) $request->status ?? null,
            'apiType' => $apiType
        ];

        $users = $this->getUsersDetails($reqDataArr);

        return response()->json($users);
    }

}
