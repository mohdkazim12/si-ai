<div class="hidden md:flex md:flex-col md:w-64 bg-white shadow-sm">
            <div class="p-4 flex items-center">
                <span class="font-['Pacifico'] text-primary text-2xl">EduConnect</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                        <i class="ri-user-line text-primary ri-lg"></i>
                    </div>
                    <div>
                        <p class="font-medium">{{Str::words(auth()->user()->name)}}</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full">Teacher</span>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto custom-scrollbar">
                <a href="https://readdy.ai/home/b8e20487-1c5f-4382-bb15-ebd7a3c4d48a/c7194a38-0291-4ef5-acc3-195b70ab57d1" data-readdy="true" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-dashboard-line"></i>
                    </div>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-primary bg-primary/10 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-user-line"></i>
                    </div>
                    Students
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-calendar-line"></i>
                    </div>
                    Attendance
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-book-open-line"></i>
                    </div>
                    Assignments
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-bar-chart-line"></i>
                    </div>
                    Grades
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-message-2-line"></i>
                    </div>
                    Messages
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-calendar-event-line"></i>
                    </div>
                    Events
                </a>
                <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-settings-line"></i>
                    </div>
                    Settings
                </a>
            </nav>
            <div class="p-4 border-t">
                <a href="{{route('logout')}}" class="flex items-center px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">
                    <div class="w-6 h-6 mr-3 flex items-center justify-center">
                        <i class="ri-logout-box-line"></i>
                    </div>
                    Logout
                </a>
            </div>
        </div>