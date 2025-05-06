<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\SchoolHelper;
use App\Traits\HandlesUserRegistration;

class UserController extends Controller
{
    use HandlesUserRegistration;
    public function getUsers(Request $request)
    {
        $apiType = 'get_user_details';
        $rolesArr = SchoolHelper::roles(); // Example: ['Student' => 'student', 'Teacher' => 'teacher']
        $roles = array_flip($rolesArr);
        $getRole = $request->user_type ?? null;
        $role = $getRole ? ($roles[strtolower($getRole)] ?? null) : null;

        $reqDataArr = [
                'search' => $request->input('search'),
                'perPage' => $request->input('per_page', 10),
                'role' => $role,
                'status' => (int)$request->status,
                'user_type' => $request->user_type,
                'apiType' => $apiType
            ];

        $users = $this->getUsersDetails($reqDataArr,$apiType);

        return response()->json($users);

    }

    public function allUsers(Request $request)
    {
        $query = User::query();
        $users = $query->orderBy('id',
         'desc')->paginate(6);
        
        if ($request->ajax()) {
            return response()->json([
                'users' => $users->items(),
                'links' => $users->links('vendor.pagination.custom-ajax')->toHtml(),
                'current_page' => $users->currentPage()
            ]);
        }
        
        return view('dashboard.users', compact('users'));
    }


}
