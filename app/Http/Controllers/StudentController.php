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

        return view('dashboard.student', compact('students'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {

            
            $this->createStudentProfile($request);

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
}
