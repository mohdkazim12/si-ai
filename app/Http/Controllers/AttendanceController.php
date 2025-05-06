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
use App\Traits\HandlesUserRegistration;

class AttendanceController extends Controller
{
    use HandlesUserRegistration;
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

        return view('dashboard.attendance', compact('students'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $user_id = $request->user_id ?? auth()->id() ;
        $attendance_date = $request->date ?? Carbon::now()->format('Y-m-d');
        // $request->validate([
        //     'date' => 'required|date'
        // ]);
        
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
            'user_id' => $user_id,
            'marked_by' => auth()->id(),
            'date' => $attendance_date,
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
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(), 
            ], 500);
        }
    }

    public function attendanceDetails(Request $request){    
        $apiType = 'user_attendance_details';

        $reqDataArr = [
            'search' => $request->input('search'),
            'perPage' => $request->input('per_page', 10),
            'role' => null,
            'status' => (int) $request->status ?? null,
            'apiType' => $apiType
        ];

        $users = $this->getUsersDetails($reqDataArr);

        return response()->json($users);
    }
}
