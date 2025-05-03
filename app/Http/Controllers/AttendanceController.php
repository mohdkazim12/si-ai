<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\SchoolHelper;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);
        
        // Check if attendance already marked today
        $existing = Attendance::where('user_id', auth()->id())
            ->whereDate('date', $request->date)
            ->first();
        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'Attendance already marked for today'
            ], 200);
        }
        
        // Create new attendance record
        $attendance = Attendance::create([
            'user_id' => auth()->id(),
            'marked_by' => auth()->id(),
            'date' => $request->date,
            'status' => 'present',
            'marked_at' => now()
        ]);
        
        // Get updated attendance count for today
        $todayCount = Attendance::whereDate('date', $request->date)->count();
        
        return response()->json([
            'success' => true,
            'message' => 'Attendance marked successfully',
            'new_count' => $todayCount
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
