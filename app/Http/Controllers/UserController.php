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

class UserController extends Controller
{

    public function getUsers(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); // default 10 per page

        $query = User::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $users = $query->paginate($perPage);

        return response()->json($users);
    }

    public function allUsers(Request $request)
    {
        $query = User::query();
        $users = $query->orderBy('id', 'desc')->paginate(6);
        
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
