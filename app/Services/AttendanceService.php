<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class AttendanceService
{
    public function getAttendanceAnalytics($userId = null)
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $previousMonth = now()->subMonth()->month;
        $previousYear = now()->subMonth()->year;
        $currentDate = now()->format('Y-m-d');

        // Get working days for current and previous month (excluding Sundays)
        $currentMonthWorkingDays = $this->getWorkingDays($currentMonth, $currentYear);
        $previousMonthWorkingDays = $this->getWorkingDays($previousMonth, $previousYear);

        // Base query
        $query = Attendance::where('status', 'present')
            ->when($userId, function ($q) use ($userId) {
                $q->where('user_id', $userId);
            });
        
        $checkTodayAttendance = (clone $query)->where('date',$currentDate)->count();

        // Current month stats
        $currentMonthPresent = (clone $query)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->count();

        // Previous month stats
        $previousMonthPresent = (clone $query)
            ->whereMonth('date', $previousMonth)
            ->whereYear('date', $previousYear)
            ->count();

        // Calculate percentages
        $currentMonthPercentage = $currentMonthWorkingDays > 0 
            ? round(($currentMonthPresent / $currentMonthWorkingDays) * 100, 2)
            : 0;

        $previousMonthPercentage = $previousMonthWorkingDays > 0 
            ? round(($previousMonthPresent / $previousMonthWorkingDays) * 100, 2)
            : 0;

        // Comparison with previous month
        $percentageDifference = $currentMonthPercentage - $previousMonthPercentage;
        $trend = $percentageDifference > 0 ? 'up' : ($percentageDifference < 0 ? 'down' : 'same');
        $color = $percentageDifference > 0 ? 'green' : ($percentageDifference < 0 ? 'red' : 'yellow');

        return [
            'today_details' => [
                'is_marked' => $checkTodayAttendance,
            ],
            'current_month' => [
                'present_days' => $currentMonthPresent,
                'working_days' => $currentMonthWorkingDays,
                'percentage' => $currentMonthPercentage,
                'month_name' => Carbon::create()->month($currentMonth)->format('F')
            ],
            'previous_month' => [
                'present_days' => $previousMonthPresent,
                'working_days' => $previousMonthWorkingDays,
                'percentage' => $previousMonthPercentage,
                'month_name' => Carbon::create()->month($previousMonth)->format('F')
            ],
            'comparison' => [
                'percentage_difference' => abs($percentageDifference),
                'trend' => $trend,
                'color' => $color,
                'message' => $this->getComparisonMessage($trend, $percentageDifference)
            ],
            'all_users_stats' => !$userId ? $this->getAllUsersStats($currentMonth, $currentYear) : null
        ];
    }

    protected function getWorkingDays($month, $year)
    {
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
        $workingDays = 0;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::createFromDate($year, $month, $day);
            if (!$date->isSunday()) {
                $workingDays++;
            }
        }

        return $workingDays;
    }

    protected function getAllUsersStats($month, $year)
    {
        $workingDays = $this->getWorkingDays($month, $year);
        
        return User::withCount(['attendances' => function($q) use ($month, $year) {
                $q->whereMonth('date', $month)
                  ->whereYear('date', $year)
                  ->where('status', 'present');
            }])
            ->get()
            ->map(function($user) use ($workingDays) {
                $percentage = $workingDays > 0 
                    ? round(($user->attendances_count / $workingDays) * 100, 2)
                    : 0;
                
                return [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'present_days' => $user->attendances_count,
                    'percentage' => $percentage
                ];
            });
    }

    protected function getComparisonMessage($trend, $difference)
    {
        if ($trend === 'same') {
            return 'No change from previous month';
        }

        $message = $trend === 'up' 
            ? 'Increased by ' 
            : 'Decreased by ';
        
        return $message . abs($difference) . '% compared to last month';
    }
}