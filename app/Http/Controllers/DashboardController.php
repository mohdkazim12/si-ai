<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use App\Services\AttendanceService;

class DashboardController extends Controller
{
   public function index(){
        $attendanceService = new AttendanceService();
        $stats = $attendanceService->getAttendanceAnalytics(auth()->user()->id);
        // dd($stats);
        $attendance =  Attendance::where('user_id',auth()->user()->id)->get();
        return view('dashboard.dashboard', compact('stats'));
   }
}
