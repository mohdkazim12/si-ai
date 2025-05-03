
<!-- dd($stats) -->
@extends('layouts.app')

@section('content')
    <header class="bg-white shadow-sm z-10">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center md:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-600 p-2 rounded-md">
                    <div class="w-6 h-6 flex items-center justify-center">
                        <i class="ri-menu-line"></i>
                    </div>
                </button>
                <span class="font-['Pacifico'] text-primary text-xl ml-2">EduConnect</span>
            </div>
            <div class="hidden md:flex items-center flex-1 px-4">
                <div class="relative max-w-md w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <input type="text" class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 focus:ring-2 focus:ring-primary/20 focus:outline-none" placeholder="Search students, classes, or activities...">
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button type="button" class="relative p-2 text-gray-500 hover:text-gray-600 rounded-full">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-notification-3-line"></i>
                        </div>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full flex items-center justify-center text-xs text-white">3</span>
                    </button>
                </div>
                <div class="relative">
                    <button type="button" class="relative p-2 text-gray-500 hover:text-gray-600 rounded-full">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-message-2-line"></i>
                        </div>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-primary rounded-full flex items-center justify-center text-xs text-white">5</span>
                    </button>
                </div>
                <div class="relative ml-2">
                    <button type="button" class="flex items-center text-sm rounded-full focus:outline-none">
                        <img class="h-8 w-8 rounded-full object-cover" src="https://readdy.ai/api/search-image?query=professional%2520portrait%2520of%2520a%2520female%2520teacher%2520with%2520brown%2520hair%252C%2520warm%2520smile%252C%2520business%2520casual%2520attire%252C%2520neutral%2520background%252C%2520high%2520quality%252C%2520photorealistic&width=200&height=200&seq=teacher1&orientation=squarish" alt="User">
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content Area -->
    <main class="flex-1 overflow-y-auto bg-gray-50 p-4 custom-scrollbar">
        <div class="max-w-7xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="https://readdy.ai/home/b8e20487-1c5f-4382-bb15-ebd7a3c4d48a/c7194a38-0291-4ef5-acc3-195b70ab57d1" data-readdy="true" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-primary">
                            <div class="w-4 h-4 mr-2 flex items-center justify-center">
                                <i class="ri-dashboard-line"></i>
                            </div>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <div class="w-4 h-4 text-gray-400 mx-1 flex items-center justify-center">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                            <span class="text-sm font-medium text-primary">Students</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Quick Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mr-4">
                            <div class="w-6 h-6 flex items-center justify-center text-primary">
                                <i class="ri-user-line"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Students</p>
                            <h3 class="text-2xl font-bold text-gray-900">128</h3>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <div class="w-4 h-4 flex items-center justify-center text-green-500 mr-1">
                            <i class="ri-arrow-up-line"></i>
                        </div>
                        <span class="text-green-500 font-medium">3.2%</span>
                        <span class="text-gray-500 ml-1">from last month</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <div class="w-6 h-6 flex items-center justify-center text-blue-600">
                                <i class="ri-bar-chart-line"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Average Performance</p>
                            <h3 class="text-2xl font-bold text-gray-900">76%</h3>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <div class="w-4 h-4 flex items-center justify-center text-green-500 mr-1">
                            <i class="ri-arrow-up-line"></i>
                        </div>
                        <span class="text-green-500 font-medium">2.5%</span>
                        <span class="text-gray-500 ml-1">from last semester</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <div class="w-6 h-6 flex items-center justify-center text-green-600">
                                <i class="ri-calendar-check-line"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Attendance Rate</p>
                            <h3 class="text-2xl font-bold text-gray-900">92%</h3>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <div class="w-4 h-4 flex items-center justify-center text-green-500 mr-1">
                            <i class="ri-arrow-up-line"></i>
                        </div>
                        <span class="text-green-500 font-medium">1.8%</span>
                        <span class="text-gray-500 ml-1">from last month</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mr-4">
                            <div class="w-6 h-6 flex items-center justify-center text-amber-600">
                                <i class="ri-flag-line"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">At-Risk Students</p>
                            <h3 class="text-2xl font-bold text-gray-900">12</h3>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <div class="w-4 h-4 flex items-center justify-center text-red-500 mr-1">
                            <i class="ri-arrow-up-line"></i>
                        </div>
                        <span class="text-red-500 font-medium">2.1%</span>
                        <span class="text-gray-500 ml-1">from last month</span>
                    </div>
                </div>
            </div>

            <!-- Attendance check-in -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Attendance Card (2x width) -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 md:col-span-2"> <!-- md:col-span-2 makes it double width -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mr-4">
                                <div class="w-6 h-6 flex items-center justify-center text-primary">
                                    <i class="ri-calendar-check-line"></i> <!-- Changed icon to calendar -->
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Today's Attendance</p>
                                <h3 class="text-2xl font-bold text-gray-900">{{$stats['current_month']['present_days']}}/{{$stats['current_month']['working_days']}} </h3>
                            </div>
                        </div>
                        <button 
                            id="markAttendanceBtn"
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                            @if($stats['today_details']['is_marked']) disabled @endif
                        >
                            <i class="ri-check-line mr-2"></i> {{$stats['today_details']['is_marked'] ? "Marked Attendance" : "Mark Attendance" }} 
                        </button>
                    </div>
                    <div class="mt-4 flex items-center text-sm">
                        <div class="w-4 h-4 flex items-center justify-center text-green-500 mr-1">
                            <i class="ri-arrow-{{$stats['comparison']['trend']}}-line"></i>
                        </div>
                        <span class="text-{{$stats['comparison']['color']}}-500 font-medium">{{$stats['comparison']['percentage_difference']}}</span>
                        <span class="text-gray-500 ml-1">{{$stats['comparison']['message']}}</span>
                    </div>
                </div>
            </div>



            <!-- Performance Distribution Chart -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-medium text-gray-900">Performance Distribution</h2>
                    <div class="relative">
                        <button class="text-gray-400 hover:text-gray-500 flex items-center text-sm">
                            All Classes
                            <div class="w-4 h-4 ml-1 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="h-80" id="performance-distribution-chart"></div>
            </div>
        </div>
    </main>


<!-- Mobile Bottom Navigation -->
<div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 z-10">
        <div class="flex justify-around">
            <a href="https://readdy.ai/home/b8e20487-1c5f-4382-bb15-ebd7a3c4d48a/c7194a38-0291-4ef5-acc3-195b70ab57d1" data-readdy="true" class="flex flex-col items-center py-2 px-3 text-gray-500">
                <div class="w-6 h-6 flex items-center justify-center">
                    <i class="ri-dashboard-line"></i>
                </div>
                <span class="text-xs mt-1">Dashboard</span>
            </a>
            <a href="#" class="flex flex-col items-center py-2 px-3 text-primary">
                <div class="w-6 h-6 flex items-center justify-center">
                    <i class="ri-user-line"></i>
                </div>
                <span class="text-xs mt-1">Students</span>
            </a>
            <a href="#" class="flex flex-col items-center py-2 px-3 text-gray-500">
                <div class="w-6 h-6 flex items-center justify-center">
                    <i class="ri-calendar-line"></i>
                </div>
                <span class="text-xs mt-1">Schedule</span>
            </a>
            <a href="#" class="flex flex-col items-center py-2 px-3 text-gray-500">
                <div class="w-6 h-6 flex items-center justify-center">
                    <i class="ri-message-2-line"></i>
                </div>
                <span class="text-xs mt-1">Messages</span>
            </a>
            <a href="#" class="flex flex-col items-center py-2 px-3 text-gray-500">
                <div class="w-6 h-6 flex items-center justify-center">
                    <i class="ri-menu-line"></i>
                </div>
                <span class="text-xs mt-1">More</span>
            </a>
        </div>
    </div>

            <!-- Modal Overlay -->
            <div id="studentModal" class="fixed inset-0 z-[1000] hidden bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-xl w-full max-w-lg shadow-lg relative">
                    <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">×</button>

                    <h2 class="text-xl font-semibold mb-6 text-gray-900">Add New Student</h2>

                    <form id="studentForm" method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <div class="relative">
                                <input type="text" name="name" class="w-full border border-gray-300 rounded-md pl-10 pr-3 py-2 text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter name" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-user-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <input type="email" name="email" class="w-full border border-gray-300 rounded-md pl-10 pr-3 py-2 text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="your@email.com" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-mail-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
                            <div class="relative">
                                <input type="text" name="number" class="w-full border border-gray-300 rounded-md pl-10 pr-3 py-2 text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="+91 1234567890" required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="ri-phone-line text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Class</label>
                    <select name="class" class="w-full border border-gray-300 rounded-md pl-3 pr-3 py-2 text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="" selected disabled>Select Class</option>
                        @foreach(App\Helpers\SchoolHelper::classList() as $key => $classList)
                            <option value="{{$key}}">{{$classList}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                    <select name="section" class="w-full border border-gray-300 rounded-md pl-3 pr-3 py-2 text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" selected disabled>Select Class</option>
                        @foreach(App\Helpers\SchoolHelper::sectionList() as $key => $sectionList)
                            <option value="{{$key}}">{{$sectionList}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Roll Number</label>
                <input type="text" name="roll_number" class="w-full border border-gray-300 rounded-md pl-3 pr-3 py-2 text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter roll number">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Profile Picture</label>
                <input type="file" name="profile_picture" class="w-full mt-1 text-gray-900">
            </div>

            <div class="flex justify-end space-x-3 pt-6">
                <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save</button>
            </div>
        </form>
    </div>
</div>

        <!-- In your blade template -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
           $(document).ready(function() {
    // Get CSRF token from meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $('#markAttendanceBtn').click(function() {
        var $btn = $(this);
        
        // Show loading state
        $btn.html('<i class="ri-loader-4-line animate-spin mr-2"></i>Processing...');
        $btn.prop('disabled', true);
        
        $.ajax({
            url: '/mark-attendance',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                _token: csrfToken, // Send as both header and form data
                date: new Date().toISOString().split('T')[0]
            },
            success: function(response) {
    if(response.success == true){
        // Success case - attendance marked
        Swal.fire({
            icon: 'success',
            title: 'Attendance Recorded!',
            text: response.message || 'Your attendance has been successfully marked',
            showConfirmButton: true,
            confirmButtonColor: '#3B82F6',
            timer: 3000,
            timerProgressBar: true,
            didClose: () => {
                // Optional: Do something after alert closes
                $btn.html('<i class="ri-checkbox-circle-line mr-2"></i>Attendance Recorded');
                $btn.prop('disabled', true);
                
                // Update UI if needed
                if(response.new_count) {
                    $('.attendance-count').text(response.new_count);
                }
            }
        });
    } else {
        // Server returned success=false (e.g., already marked)
        Swal.fire({
            icon: 'warning',
            title: 'Already Marked',
            text: response.message || 'Attendance was already recorded for today',
            showConfirmButton: true,
            confirmButtonColor: '#3B82F6',
            // footer: '<a href="/attendance-history">View attendance history</a>'
        });
        
        // Reset button state
        $btn.html('<i class="ri-check-line mr-2"></i>Mark Attendance');
        $btn.prop('disabled', false);
    }
},
error: function(xhr) {
    // Error case (server error, network issue, etc.)
    let errorMsg = xhr.responseJSON?.message || 'Failed to mark attendance';
    
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: errorMsg,
        showConfirmButton: true,
        confirmButtonColor: '#3B82F6',
        showCancelButton: true,
        cancelButtonText: 'Try Again',
        cancelButtonColor: '#EF4444',
        showDenyButton: true,
        denyButtonText: 'Contact Support',
        denyButtonColor: '#6B7280'
    }).then((result) => {
        if (result.isDenied) {
            window.location.href = '/contact-support';
        } else if (result.isDismissed) {
            // Try again automatically
            $btn.trigger('click');
        }
    });
    
    // Reset button state
    $btn.html('<i class="ri-check-line mr-2"></i>Mark Attendance');
    $btn.prop('disabled', false);
}
        });
    });
});
        </script>
@endsection