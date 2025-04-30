@extends('layouts.auth')

@section('content')
<div id="login-section" class="min-h-screen login-bg flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <h1 class="font-['Pacifico'] text-3xl text-primary">EduConnect</h1>
            <p class="text-gray-600 mt-2">Your complete learning journey platform</p>
        </div>

        <!-- Login Tabs -->
        <div class="flex border-b border-gray-200 mb-6">
            <button id="email-tab" class="flex-1 py-3 text-primary border-b-2 border-primary font-medium">Email Login</button>
            <button id="google-tab" class="flex-1 py-3 text-gray-500 font-medium">Continue with Google</button>
        </div>

        <!-- Email Login Form -->
        <form id="email-login-form" class="space-y-4" method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                            <i class="ri-mail-line"></i>
                        </div>
                    </div>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="pl-10 w-full h-12 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary text-sm @error('email') border-red-500 @enderror" placeholder="your@email.com" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <div class="flex justify-between mb-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="#" class="text-sm text-primary hover:text-primary/80">Forgot password?</a>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                            <i class="ri-lock-line"></i>
                        </div>
                    </div>
                    <input type="password" id="password" name="password" class="pl-10 pr-10 w-full h-12 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary text-sm @error('password') border-red-500 @enderror" placeholder="••••••••" required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" id="toggle-password" class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-600">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="custom-checkbox">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>

            <div>
                <button type="submit" class="w-full bg-primary text-white py-3 rounded-button font-medium hover:bg-primary/90 transition duration-200 whitespace-nowrap">Sign In</button>
            </div>
        </form>

        <!-- Google Login Form (Hidden by default, design only) -->
        <div id="google-login-form" class="hidden space-y-4">
            <button class="w-full flex items-center justify-center gap-3 border border-gray-300 py-3 rounded-button font-medium hover:bg-gray-50 transition duration-200 whitespace-nowrap">
                <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-google-fill text-[#4285F4]"></i>
                </div>
                <span>Continue with Google</span>
            </button>
        </div>

        <div class="mt-6 text-center">
            <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-primary hover:underline">Create Account</a></p>
        </div>

        <!-- Role Selection -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <p class="text-sm text-gray-600 mb-3 text-center">Select your role</p>
            <div class="grid grid-cols-3 gap-3">
                <button class="role-btn flex flex-col items-center p-3 border border-gray-200 rounded-lg hover:border-primary hover:bg-primary/5 transition-all" data-role="teacher">
                    <div class="w-8 h-8 flex items-center justify-center text-primary mb-1">
                        <i class="ri-user-3-line ri-lg"></i>
                    </div>
                    <span class="text-sm">Teacher</span>
                </button>
                <button class="role-btn flex flex-col items-center p-3 border border-gray-200 rounded-lg hover:border-primary hover:bg-primary/5 transition-all" data-role="parent">
                    <div class="w-8 h-8 flex items-center justify-center text-primary mb-1">
                        <i class="ri-parent-line ri-lg"></i>
                    </div>
                    <span class="text-sm">Parent</span>
                </button>
                <button class="role-btn flex flex-col items-center p-3 border border-gray-200 rounded-lg hover:border-primary hover:bg-primary/5 transition-all" data-role="student">
                    <div class="w-8 h-8 flex items-center justify-center text-primary mb-1">
                        <i class="ri-graduation-cap-line ri-lg"></i>
                    </div>
                    <span class="text-sm">Student</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection