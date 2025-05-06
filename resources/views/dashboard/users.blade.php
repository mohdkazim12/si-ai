
@extends('layouts.app')

@section('content')

    <style>
    .custom-checkbox-input:checked + span::after {
        content: '✔';
        color: white;
        background-color: #3b82f6;
        border-radius: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 16px;
        height: 16px;
    }
    .custom-checkbox-input + span {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 1px solid #d1d5db;
        border-radius: 3px;
    }
    </style>
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
        <div class="border-b border-gray-200 px-4 py-2 flex items-center overflow-x-auto custom-scrollbar">
            <!-- <div class="flex space-x-4">
                <a href="{{route('student')}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Overview</a>
                <a href="{{route('student',['class' => 12])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 12</a>
                <a href="{{route('student',['class' => 11])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 11</a>
                <a href="{{route('student',['class' => 10])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 10</a>
                <a href="{{route('student',['class' => 9])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 9</a>
                <a href="{{route('student',['class' => 8])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 8</a>
                <a href="{{route('student',['class' => 7])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 7</a>
            </div> -->
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
                            <span class="text-sm font-medium text-primary">Users</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Students Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Users</h1>
                    <p class="text-gray-600">Manage all your Users in one place</p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                        <!-- <button id="importBtn" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 !rounded-button whitespace-nowrap">
                            <div class="w-4 h-4 mr-2 flex items-center justify-center">
                                <i class="ri-upload-2-line"></i>
                            </div>
                            Import
                        </button>
                        <button id="exportBtn" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 !rounded-button whitespace-nowrap">
                            <div class="w-4 h-4 mr-2 flex items-center justify-center">
                                <i class="ri-download-2-line"></i>
                            </div>
                            Export
                        </button>
                        <button id="openModalBtn" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-primary/90 !rounded-button whitespace-nowrap">
                            <div class="w-4 h-4 mr-2 flex items-center justify-center">
                                <i class="ri-user-add-line"></i>
                            </div>
                            Add New Student
                        </button> -->
                </div>
            </div>

            <!-- Search and Filter Section -->
        <!-- Assuming this is part of your existing Blade file -->
        <div class="container mx-auto p-6">
            <!-- Search and Filter Section -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6 border border-gray-100">
    <div class="flex flex-col md:flex-row gap-4">
        <!-- Search Input -->
        <div class="flex-1">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
                <input type="text" id="searchInput" class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Search by name, ID, class, or email...">
            </div>
        </div>
        <!-- Filter Buttons -->
        <div class="flex flex-wrap gap-3">
            <!-- User Type Dropdown -->
            <div class="relative">
                <button id="userTypeFilterBtn" class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 whitespace-nowrap">
                    <div class="w-4 h-4 mr-2 flex items-center justify-center">
                        <i class="ri-user-3-line"></i>
                    </div>
                    User Type
                    <div class="w-4 h-4 ml-2 flex items-center justify-center">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </button>
                <!-- Dropdown Menu -->
                <div id="userTypeDropdown" class="absolute z-10 hidden mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-200">
                    <ul class="py-1 text-sm text-gray-700">
                        <li>
                            <button class="filter-option w-full text-left px-4 py-2 hover:bg-gray-100" data-filter="user_type" data-value="Student">Student</button>
                        </li>
                        <li>
                            <button class="filter-option w-full text-left px-4 py-2 hover:bg-gray-100" data-filter="user_type" data-value="Teacher">Teacher</button>
                        </li>
                        <li>
                            <button class="filter-option w-full text-left px-4 py-2 hover:bg-gray-100" data-filter="user_type" data-value="Admin">Admin</button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Status Dropdown -->
            <div class="relative">
                <button id="statusFilterBtn" class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 whitespace-nowrap">
                    <div class="w-4 h-4 mr-2 flex items-center justify-center">
                        <i class="ri-filter-line"></i>
                    </div>
                    Status
                    <div class="w-4 h-4 ml-2 flex items-center justify-center">
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </button>
                <!-- Dropdown Menu -->
                <div id="statusDropdown" class="absolute z-10 hidden mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-200">
                    <ul class="py-1 text-sm text-gray-700">
                        <li>
                            <button class="filter-option w-full text-left px-4 py-2 hover:bg-gray-100" data-filter="status" data-value="1">Active</button>
                        </li>
                        <li>
                            <button class="filter-option w-full text-left px-4 py-2 hover:bg-gray-100" data-filter="status" data-value="On Leave">On Leave</button>
                        </li>
                        <li>
                            <button class="filter-option w-full text-left px-4 py-2 hover:bg-gray-100" data-filter="status" data-value="0">Inactive</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Filters -->
    <div id="activeFilters" class="flex flex-wrap gap-2 mt-4">
        <!-- Filters will be added dynamically -->
    </div>
</div>

            

            <!-- Students List -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100 mb-6">
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900">All Users <span class="text-gray-300">(Teacher and student Both)</span><span id="totalStudents" class="text-gray-500 text-sm"></span></h2>
                    <div class="flex items-center">
                        <!-- <label class="custom-checkbox mr-4">
                            <input type="checkbox" class="custom-checkbox-input" id="selectAllStudents">
                            <span class="text-sm text-gray-700">Select All</span>
                        </label> -->
                        <div class="relative">
                            <!-- <button id="bulkActionsBtn" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 whitespace-nowrap">
                                Bulk Actions
                                <div class="w-4 h-4 ml-2 flex items-center justify-center">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </button> -->
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-10">
                                    <span class="sr-only">Select</span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Class(Section)
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Roll No
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Student ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="bg-white divide-y divide-gray-200"></tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div id="pagination" class="px-6 py-3 flex items-center justify-between border-t border-gray-200">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button id="prevPageMobile" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 whitespace-nowrap">
                            Previous
                        </button>
                        <button id="nextPageMobile" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 whitespace-nowrap">
                            Next
                        </button>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p id="paginationInfo" class="text-sm text-gray-700">
                                Showing <span id="from">1</span> to <span id="to">7</span> of <span id="total">0</span> students
                            </p>
                        </div>
                        <div>
                            <nav id="paginationNav" class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  -->

            <!-- Performance Distribution Chart -->
            <!-- <div class="bg-white rounded-lg shadow-sm p-4 mb-6 border border-gray-100">
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
            </div> -->
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
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cladss</label>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include in your blade -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#openModalBtn').click(function () {
                $('#studentModal').removeClass('hidden');
            });

            $('#closeModalBtn, #cancelBtn').click(function () {
                $('#studentModal').addClass('hidden');
            });

            $('#studentForm').submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            $('.error-text').remove(); // Remove old error messages

                $.ajax({
                    url: "{{ route('students.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status === 'success') {
                            toastr.success(response.message || 'Student created successfully!');
                            $('#studentForm')[0].reset();
                            $('#studentModal').addClass('hidden');
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            console.log("Validation Errors:", errors);

                            // Show first error message in toastr
                            let firstError = Object.values(errors)[0][0];
                            toastr.error(firstError || 'Validation error occurred');

                            // Show all field errors
                            $.each(errors, function (field, messages) {
                                let input = $('[name="' + field + '"]');
                                let errorHtml = `<p class="text-red-500 text-sm error-text mt-1">${messages[0]}</p>`;
                                input.after(errorHtml);
                            });
                        }
                    }
                });
            });

        });


// <!-- JavaScript for Search and Pagination -->
    // Debounce function to limit API calls
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Function to fetch and display data
    async function fetchData(page = 1, search = '' , per_page =  10) {
        try {
            const response = await fetch(`/users/data?page=${page}&search=${encodeURIComponent(search)}&per_page=${per_page}`);
            const data = await response.json();
            const tableBody = document.getElementById('tableBody');
            const totalStudents = document.getElementById('totalStudents');
            const paginationInfo = document.getElementById('paginationInfo');
            const paginationNav = document.getElementById('paginationNav');
            tableBody.innerHTML = ''; // Clear existing rows
            totalStudents.textContent = `(${data.total})`; // Update total count

            // Update table
            if (data.data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="9" class="px-6 py-4 text-center text-gray-500">No students found</td></tr>';
                paginationInfo.innerHTML = 'Showing 0 to 0 of 0 students';
                paginationNav.innerHTML = '';
                return;
            }

            data.data.forEach(user => {
                // user.student_details
                const isStudent = user.student_details?.is_student ? { is_student: 'Student', color: 'bg-yellow-100 text-yellow-800' } : { is_student: 'Teacher', color: 'bg-green-100 text-green-800' };
            
                const statusColor = user.status === 'Active' ? 'bg-green-100 text-green-800' : 
                                  user.status === 'On Leave' ? 'bg-yellow-100 text-yellow-800' : 
                                  'bg-gray-100 text-gray-800';
                const row = `
                    <tr class="hover:bg-gray-50 cursor-pointer" data-student-id="${user.id}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <label class="custom-checkbox">
                                <input type="checkbox" class="custom-checkbox-input student-checkbox">
                                <span class="sr-only">Select student</span>
                            </label>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-cover" src="https://via.placeholder.com/40" alt="Student">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">${user.name}</div>
                                    <div class="text-sm text-gray-500">${user.email} </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">User-ID ${user.id}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">${user.student_details.class ? user.student_details.class + ' ' + user.student_details.section :'NA'}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"> ${user.student_details.roll_number ?? 'NA'}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"> ${user.student_details.id ?? 'NA'}</div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">${user.mobile_no}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${isStudent.color}">
                                ${isStudent.is_student}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusColor}">
                                ${user.status ? 'ACTIVE' : 'Inactive'}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <button class="text-gray-500 hover:text-blue-600" title="Edit">
                                    <div class="w-6 h-6 flex items-center justify-center">
                                        <i class="ri-edit-line"></i>
                                    </div>
                                </button>
                                <!--- <button class="text-gray-500 hover:text-gray-700" title="More">
                                    <div class="w-6 h-6 flex items-center justify-center">
                                        <i class="ri-more-2-line"></i>
                                    </div>
                                </button> --->
                            </div>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });

            // Update pagination info
            paginationInfo.innerHTML = `Showing <span id="from">${data.from || 0}</span> to <span id="to">${data.to || 0}</span> of <span id="total">${data.total}</span> students`;

            // Render pagination
            renderPagination(data.current_page, data.last_page, search);
        } catch (error) {
            console.error('Error fetching data:', error);
        document.getElementById('tableBody').innerHTML = '<tr><td colspan="9" class="px-6 py-4 text-center text-gray-500">Error loading data</td></tr>';
        }
    }

    // Function to render pagination
    function renderPagination(currentPage, lastPage, search) {
        const paginationNav = document.getElementById('paginationNav');
        paginationNav.innerHTML = '';

        // Previous button
        paginationNav.innerHTML += `
            <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 ${currentPage === 1 ? 'cursor-not-allowed opacity-50' : ''}" 
                    ${currentPage === 1 ? 'disabled' : `onclick="fetchData(${currentPage - 1}, '${search}')"`}>
                <span class="sr-only">Previous</span>
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
            </button>
        `;

        // Page numbers (limited to 5 for simplicity)
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(lastPage, currentPage + 2);
        if (endPage - startPage < 4) {
            startPage = Math.max(1, endPage - 4);
        }

        if (startPage > 1) {
            paginationNav.innerHTML += `
                <button class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium" onclick="fetchData(1, '${search}')">1</button>
                ${startPage > 2 ? '<span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>' : ''}
            `;
        }

        for (let i = startPage; i <= endPage; i++) {
            paginationNav.innerHTML += `
                <button class="${i === currentPage ? 'z-10 bg-blue-600 text-white border-blue-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'} relative inline-flex items-center px-4 py-2 border text-sm font-medium" 
                        onclick="fetchData(${i}, '${search}')">${i}</button>
            `;
        }

        if (endPage < lastPage) {
            paginationNav.innerHTML += `
                ${endPage < lastPage - 1 ? '<span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>' : ''}
                <button class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium" onclick="fetchData(${lastPage}, '${search}')">${lastPage}</button>
            `;
        }

        // Next button
        paginationNav.innerHTML += `
            <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 ${currentPage === lastPage ? 'cursor-not-allowed opacity-50' : ''}" 
                    ${currentPage === lastPage ? 'disabled' : `onclick="fetchData(${currentPage + 1}, '${search}')"`}>
                <span class="sr-only">Next</span>
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-arrow-right-s-line"></i>
                </div>
            </button>
        `;

        // Mobile pagination buttons
        document.getElementById('prevPageMobile').disabled = currentPage === 1;
        document.getElementById('nextPageMobile').disabled = currentPage === lastPage;
        document.getElementById('prevPageMobile').onclick = currentPage > 1 ? () => fetchData(currentPage - 1, search) : null;
        document.getElementById('nextPageMobile').onclick = currentPage < lastPage ? () => fetchData(currentPage + 1, search) : null;
    }

    // Initial load
    fetchData();

    // Search input event listener with debounce
    document.getElementById('searchInput').addEventListener('input', debounce((e) => {
        fetchData(1, e.target.value); // Reset to page 1 on search
    }, 300));

        // Top filters Js Code  Start 
        // State to track active filters
            let filters = {
                user_type: null,
                status: null,
                // class: 'Class 8A' // Pre-applied filter as per image
            };

            // Function to toggle dropdown visibility
            function toggleDropdown(dropdownId) {
                const dropdown = document.getElementById(dropdownId);
                dropdown.classList.toggle('hidden');
            }

            // Function to close all dropdowns
            function closeAllDropdowns() {
                document.getElementById('userTypeDropdown').classList.add('hidden');
                document.getElementById('statusDropdown').classList.add('hidden');
            }

            // Event listeners for dropdown buttons
            document.getElementById('userTypeFilterBtn').addEventListener('click', () => {
                closeAllDropdowns();
                toggleDropdown('userTypeDropdown');
            });

            document.getElementById('statusFilterBtn').addEventListener('click', () => {
                closeAllDropdowns();
                toggleDropdown('statusDropdown');
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('#userTypeFilterBtn') && !e.target.closest('#userTypeDropdown')) {
                    document.getElementById('userTypeDropdown').classList.add('hidden');
                }
                if (!e.target.closest('#statusFilterBtn') && !e.target.closest('#statusDropdown')) {
                    document.getElementById('statusDropdown').classList.add('hidden');
                }
            });

            // Function to render active filters as tags
            function renderFilters() {
                const activeFilters = document.getElementById('activeFilters');
                activeFilters.innerHTML = '';

                // Add filter tags
                Object.entries(filters).forEach(([key, value]) => {
                    let bgColor =  "bg-red-100 text-red-800";
                    if(key === 'user_type'){
                         bgColor =  "bg-green-100 text-green-800";
                    }else{
                        bgColor = "bg-blue-100 text-blue-800";
                    }
                    if (value) {
                        const label = key === 'user_type' ? 'User Type' : key.charAt(0).toUpperCase() + key.slice(1);
                        const tagColor = bgColor;///key === 'status' && value === 'Active' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800';
                        const tag = `
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm ${tagColor}">
                                ${label}: ${value}
                                <button class="ml-2" onclick="removeFilter('${key}')">
                                    <div class="w-4 h-4 flex items-center justify-center">
                                        <i class="ri-close-line"></i>
                                    </div>
                                </button>
                            </div>
                        `;
                        activeFilters.innerHTML += tag;
                    }
                });

                // Add Clear All Filters button if there are active filters
                if (Object.values(filters).some(val => val !== null)) {
                    activeFilters.innerHTML += `
                        <button id="clearFilters" class="text-sm text-blue-600 hover:text-blue-800">
                            Clear ALL Filter
                        </button>
                    `;
                    document.getElementById('clearFilters').addEventListener('click', clearFilters);
                }
            }

            // Function to remove a specific filter
            function removeFilter(filterKey) {
                filters[filterKey] = null;
                renderFilters();
            }

            // Function to clear all filters
            function clearFilters() {
                filters = {
                    user_type: null,
                    status: null,
                    class: null
                };
                document.getElementById('searchInput').value = '';
                renderFilters();
            }

            // Event listeners for filter options
            document.querySelectorAll('.filter-option').forEach(option => {
                option.addEventListener('click', (e) => {
                    const filterKey = e.target.dataset.filter;
                    const filterValue = e.target.dataset.value;
                    filters[filterKey] = filterValue;
                    closeAllDropdowns();
                    renderFilters();
                });
            });

            // Initial render of filters (to show pre-applied Class: 8A)
            renderFilters();

            // Top filter js code end 


            // Function to fetch data with separate filter parameters
        async function fetchDataWithFilters(page = 1) {
            const search = document.getElementById('searchInput').value;
            let query = `page=${page}&per_page=7`;

            // Add search parameter
            if (search) {
                query += `&search=${encodeURIComponent(search)}`;
            }

            // Add filter parameters
            if (filters.user_type) {
                query += `&user_type=${encodeURIComponent(filters.user_type)}`;
            }
            if (filters.status) {
                query += `&status=${encodeURIComponent(filters.status)}`;
            }
            if (filters.class) {
                query += `&class=${encodeURIComponent(filters.class)}`;
            }

            try {
                const response = await fetch(`/users/data?${query}`);
                const data = await response.json();
                console.log(data); // Aap yaha apna table update kar sakte ho
                // Example: updateTable(data);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        // Update renderFilters to call fetchDataWithFilters
        function renderFilters() {
            const activeFilters = document.getElementById('activeFilters');
            activeFilters.innerHTML = '';

            Object.entries(filters).forEach(([key, value]) => {
                if (value) {
                    const label = key === 'user_type' ? 'User Type' : key.charAt(0).toUpperCase() + key.slice(1);
                    const tagColor = key === 'status' && value === 'Active' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800';
                    const tag = `
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm ${tagColor}">
                            ${label}: ${value}
                            <button class="ml-2" onclick="removeFilter('${key}')">
                                <div class="w-4 h-4 flex items-center justify-center">
                                    <i class="ri-close-line"></i>
                                </div>
                            </button>
                        </div>
                    `;
                    activeFilters.innerHTML += tag;
                }
            });

            if (Object.values(filters).some(val => val !== null)) {
                activeFilters.innerHTML += `
                    <button id="clearFilters" class="text-sm text-blue-600 hover:text-blue-800">
                        Clear ALL Filter
                    </button>
                `;
                document.getElementById('clearFilters').addEventListener('click', clearFilters);
            }

            // Call fetchDataWithFilters after rendering filters
            fetchDataWithFilters();
        }

        // Update removeFilter to fetch data after removing a filter
        function removeFilter(filterKey) {
            filters[filterKey] = null;
            renderFilters();
            fetchDataWithFilters();
        }

        // Update clearFilters to fetch data after clearing filters
        function clearFilters() {
            filters = {
                user_type: null,
                status: null,
                class: null
            };
            document.getElementById('searchInput').value = '';
            renderFilters();
            fetchDataWithFilters();
        }

        // Add search input listener to fetch data on search
        document.getElementById('searchInput').addEventListener('input', debounce(() => {
            fetchDataWithFilters();
        }, 300));

        // Initial fetch
        fetchDataWithFilters();
    </script>
@endsection