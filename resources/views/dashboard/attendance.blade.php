
@extends('layouts.app')

@section('content')

    <style>
            /* Pagination Styling */
            .pagination {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .pagination .page-item {
                display: inline-flex;
            }

            .pagination .page-link {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
                font-weight: 500;
                line-height: 1.25rem;
                color: #4b5563; /* gray-600 */
                background-color: #ffffff;
                border: 1px solid #d1d5db; /* gray-300 */
                border-radius: 0.375rem;
                transition: all 0.2s ease;
                cursor: pointer;
                text-decoration: none;
            }

            .pagination .page-link:hover {
                color: #2563eb; /* primary */
                background-color: #f3f4f6; /* gray-100 */
                border-color: #9ca3af; /* gray-400 */
            }

            .pagination .active .page-link {
                color: #ffffff;
                background-color: #2563eb; /* primary */
                border-color: #2563eb;
            }

            .pagination .disabled .page-link {
                color: #9ca3af; /* gray-400 */
                pointer-events: none;
                background-color: #f9fafb; /* gray-50 */
                border-color: #d1d5db;
                cursor: not-allowed;
            }

            .pagination .page-link:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2); /* primary/20 */
            }

            /* Mobile pagination links */
            .ajax-pagination-link {
                border-radius: 0.375rem !important;
                text-decoration: none;
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
            <div class="flex space-x-4">
                <a href="{{route('dashboard')}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Overview</a>
                <a href="{{route('dashboard',['class' => 12])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 12</a>
                <a href="{{route('dashboard',['class' => 11])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 11</a>
                <a href="{{route('dashboard',['class' => 10])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 10</a>
                <a href="{{route('dashboard',['class' => 9])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 9</a>
                <a href="{{route('dashboard',['class' => 8])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 8</a>
                <a href="{{route('dashboard',['class' => 7])}}" data-readdy="true" class="whitespace-nowrap px-3 py-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">Class 7</a>
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
                            <span class="text-sm font-medium text-primary">Attendance</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Students Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Attendance</h1>
                    <p class="text-gray-600">Manage all your students in one place</p>
                </div>
                <div class="mt-4 md:mt-0 flex flex-wrap gap-3">
                    <button id="importBtn" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 !rounded-button whitespace-nowrap">
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
                    </button>
                </div>
            </div>

            <!-- Search and Filter Section -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-6 border border-gray-100">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                                    <i class="ri-search-line"></i>
                                </div>
                            </div>
                            <input type="text" class="bg-gray-50 border-none text-gray-900 text-sm rounded-lg block w-full pl-10 p-2.5 focus:ring-2 focus:ring-primary/20 focus:outline-none" placeholder="Search by name, ID, class, or email...">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <div class="relative">
                            <button id="classFilterBtn" class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 !rounded-button whitespace-nowrap">
                                <div class="w-4 h-4 mr-2 flex items-center justify-center">
                                    <i class="ri-group-line"></i>
                                </div>
                                Class
                                <div class="w-4 h-4 ml-2 flex items-center justify-center">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </button>
                        </div>
                        <div class="relative">
                            <button id="statusFilterBtn" class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 !rounded-button whitespace-nowrap">
                                <div class="w-4 h-4 mr-2 flex items-center justify-center">
                                    <i class="ri-filter-line"></i>
                                </div>
                                Status
                                <div class="w-4 h-4 ml-2 flex items-center justify-center">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </button>
                        </div>
                        <div class="relative">
                            <button id="performanceFilterBtn" class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 !rounded-button whitespace-nowrap">
                                <div class="w-4 h-4 mr-2 flex items-center justify-center">
                                    <i class="ri-bar-chart-line"></i>
                                </div>
                                Performance
                                <div class="w-4 h-4 ml-2 flex items-center justify-center">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Active Filters -->
                <div class="flex flex-wrap gap-2 mt-4">
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-primary/10 text-primary">
                        Class: 8A
                        <button class="ml-2 text-primary">
                            <div class="w-4 h-4 flex items-center justify-center">
                                <i class="ri-close-line"></i>
                            </div>
                        </button>
                    </div>
                    <div class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                        Status: Active
                        <button class="ml-2 text-green-800">
                            <div class="w-4 h-4 flex items-center justify-center">
                                <i class="ri-close-line"></i>
                            </div>
                        </button>
                    </div>
                    <button class="text-sm text-primary hover:text-primary/80">
                        Clear All Filters
                    </button>
                </div>
            </div>

            <!-- Students List -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100 mb-6">
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900">All Students <span class="text-gray-500 text-sm">(128)</span></h2>
                    <div class="flex items-center">
                        <label class="custom-checkbox mr-4">
                            <input type="checkbox" class="custom-checkbox-input" id="selectAllStudents">
                            <span class="text-sm text-gray-700">Select All</span>
                        </label>
                        <div class="relative">
                            <button id="bulkActionsBtn" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 bg-gray-50 rounded-lg hover:bg-gray-100 !rounded-button whitespace-nowrap">
                                Bulk Actions
                                <div class="w-4 h-4 ml-2 flex items-center justify-center">
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </button>
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Class</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Performance</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Attendance</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="students-table-body">
                            @foreach($students as $index => $student)
                                <tr class="hover:bg-gray-50 cursor-pointer" data-student-id="{{ $student->id }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" class="custom-checkbox-input student-checkbox">
                                            <span class="sr-only">Select student</span>
                                        </label>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ $student->user->profile_image ?? 'https://readdy.ai/api/search-image?query=portrait%2520of%2520a%2520teenage%2520student%2520smiling%252C%2520school%2520uniform%252C%2520classroom%2520background%252C%2520high%2520quality%252C%2520photorealistic&width=200&height=200&seq=student' . ($index + 1) . '&orientation=squarish' }}" alt="Student">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ \Illuminate\Support\Str::words($student->user->name, 2, '') }}</div>
                                                <div class="text-sm text-gray-500">{{ $student->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $student->user->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $student->class }} {{ $student->section }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2 max-w-[100px]">
                                                <div class="bg-primary h-2.5 rounded-full" style="width: {{ $student->performance ?? 85 }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-900">{{ $student->performance ?? 85 }}%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $student->attendance ?? 92 }}%</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">+91 {{ $student->user->mobile_no ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ($student->status ?? 'Active') == 'Active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $student->status ?? 'Active' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <button class="text-gray-500 hover:text-primary" title="Edit">
                                                <div class="w-6 h-6 flex items-center justify-center">
                                                    <i class="ri-edit-line"></i>
                                                </div>
                                            </button>
                                            <button class="text-gray-500 hover:text-primary" title="Message">
                                                <div class="w-6 h-6 flex items-center justify-center">
                                                    <i class="ri-message-2-line"></i>
                                                </div>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700" title="More">
                                                <div class="w-6 h-6 flex items-center justify-center">
                                                    <i class="ri-more-2-line"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="px-6 py-3 flex items-center justify-between border-t border-gray-200">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="{{ $students->previousPageUrl() }}" class="ajax-pagination-link relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 !rounded-button whitespace-nowrap">Previous</a>
                        <a href="{{ $students->nextPageUrl() }}" class="ajax-pagination-link ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 !rounded-button whitespace-nowrap">Next</a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">{{ $students->firstItem() }}</span> to <span class="font-medium">{{ $students->lastItem() }}</span> of <span class="font-medium">{{ $students->total() }}</span> students
                            </p>
                        </div>
                        <div id="pagination-links" class="pagination">
                            {{ $students->links('vendor.pagination.custom-ajax') }}
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <!-- <div class="px-6 py-3 flex items-center justify-between border-t border-gray-200">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 !rounded-button whitespace-nowrap">
                            Previous
                        </button>
                        <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 !rounded-button whitespace-nowrap">
                            Next
                        </button>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">7</span> of <span class="font-medium">128</span> students
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <div class="w-5 h-5 flex items-center justify-center">
                                        <i class="ri-arrow-left-s-line"></i>
                                    </div>
                                </button>
                                <button aria-current="page" class="z-10 bg-primary text-white relative inline-flex items-center px-4 py-2 border border-primary text-sm font-medium">
                                    1
                                </button>
                                <button class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </button>
                                <button class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </button>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                    ...
                                </span>
                                <button class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                    18
                                </button>
                                <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <div class="w-5 h-5 flex items-center justify-center">
                                        <i class="ri-arrow-right-s-line"></i>
                                    </div>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div> -->
            </div>

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

        // 

        $(document).on('click', '.ajax-pagination-link', function (e) {
        e.preventDefault(); // Prevent page reload
        const url = $(this).attr('href');
        if (!url) return;

        // Show loading state (optional)
        $('#students-table-body').html('<tr><td colspan="9" class="text-center py-4">Loading...</td></tr>');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (response) {
                // Update table body
                const tbody = $('#students-table-body');
                tbody.empty();
                response.students.forEach((student, index) => {
                    const status = student.status || 'Active';
                    const statusClass = status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';
                    const row = `
                        <tr class="hover:bg-gray-50 cursor-pointer" data-student-id="${student.id}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <label class="custom-checkbox">
                                    <input type="checkbox" class="custom-checkbox-input student-checkbox">
                                    <span class="sr-only">Select student</span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover" src="${student.user.profile_image || 'https://readdy.ai/api/search-image?query=portrait%2520of%2520a%2520teenage%2520student%2520smiling%252C%2520school%2520uniform%252C%2520classroom%2520background%252C%2520high%2520quality%252C%2520photorealistic&width=200&height=200&seq=student' + (index + 1) + '&orientation=squarish'}" alt="Student">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">${student.user.name.split(' ').slice(0, 2).join(' ')}</div>
                                        <div class="text-sm text-gray-500">${student.user.email}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">${student.user.id}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">${student.class} ${student.section}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2 max-w-[100px]">
                                        <div class="bg-primary h-2.5 rounded-full" style="width: ${student.performance || 85}%"></div>
                                    </div>
                                    <span class="text-sm text-gray-900">${student.performance || 85}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">${student.attendance || 92}%</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">+91 ${student.user.mobile_no || 'N/A'}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                                    ${status}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <button class="text-gray-500 hover:text-primary" title="Edit">
                                        <div class="w-6 h-6 flex items-center justify-center">
                                            <i class="ri-edit-line"></i>
                                        </div>
                                    </button>
                                    <button class="text-gray-500 hover:text-primary" title="Message">
                                        <div class="w-6 h-6 flex items-center justify-center">
                                            <i class="ri-message-2-line"></i>
                                        </div>
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700" title="More">
                                        <div class="w-6 h-6 flex items-center justify-center">
                                            <i class="ri-more-2-line"></i>
                                        </div>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    tbody.append(row);
                });

                // Update pagination links
                $('#pagination-links').html(response.links);
            },
            error: function (xhr) {
                console.error('Error fetching paginated data:', xhr);
                $('#students-table-body').html('<tr><td colspan="9" class="text-center py-4">Failed to load students. Please try again.</td></tr>');
            }
        });
    });
    </script>


@endsection