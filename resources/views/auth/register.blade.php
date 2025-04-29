@extends('layouts.app')

@section('content')
<div id="register-section" class="min-h-screen login-bg flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <h1 class="font-['Pacifico'] text-3xl text-primary">EduConnect</h1>
            <p class="text-gray-600 mt-2">Create your learning journey account</p>
        </div>

        <form class="space-y-4" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                            <i class="ri-user-line"></i>
                        </div>
                    </div>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="pl-10 w-full h-12 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary text-sm @error('name') border-red-500 @enderror" placeholder="Your Name" required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Email Field -->
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

            <!-- Mobile Number Field -->
            <div>
                <label for="mobile_no" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                            <i class="ri-phone-line"></i>
                        </div>
                    </div>
                    <input type="number" id="mobile_no" name="mobile_no" value="{{ old('mobile_no') }}" class="pl-10 w-full h-12 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary text-sm @error('mobile_no') border-red-500 @enderror" placeholder="1234567890" required>
                    @error('mobile_no')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
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

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <div class="w-5 h-5 flex items-center justify-center text-gray-400">
                            <i class="ri-lock-line"></i>
                        </div>
                    </div>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="pl-10 pr-10 w-full h-12 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary text-sm" placeholder="••••••••" required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" id="toggle-confirm-password" class="w-5 h-5 flex items-center justify-center text-gray-400 hover:text-gray-600">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-primary text-white py-3 rounded-button font-medium hover:bg-primary/90 transition duration-200 whitespace-nowrap">Create Account</button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-primary hover:underline">Sign In</a></p>
        </div>
    </div>
</div>
@endsection