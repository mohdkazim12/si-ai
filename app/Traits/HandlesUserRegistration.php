<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait HandlesUserRegistration
{
    public function registerUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_no' => $data['mobile_no'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
?>