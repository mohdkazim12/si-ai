<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('per_page', 7); // Default to 7 per page
        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%")
                             ->orWhere('student_id', 'like', "%{$search}%")
                             ->orWhere('class', 'like', "%{$search}%");
            })
            ->paginate($perPage);
            
        return response()->json($users);
    }
}