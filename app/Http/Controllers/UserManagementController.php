<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = User::all();
        $roles = UserRole::all();
        return view('front-office.admin.user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $this->userService->store($request);
        return redirect()->route('user-management');
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('user-management');
    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        return redirect()->route("user-management");
    }
}
