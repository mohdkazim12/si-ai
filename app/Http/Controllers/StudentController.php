<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function dashboard(Request $request)
    {
        $students = Student::with('user')->paginate(7);

        if ($request->ajax()) {
            return response()->json([
                'students' => $students->items(),
                'links' => $students->links('vendor.pagination.custom-ajax')->toHtml(),
            ]);
        }

        return view('dashboard.student', compact('students'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            DB::beginTransaction();

            // 1. Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile_no' => $request->number,
                'password' => Hash::make('12345678'), // Default password, update as needed
            ]);

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

            return response()->json([
                'status' => 'success',
                'message' => 'Student and user created successfully.'
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => true,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(), 
            ], 500);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
