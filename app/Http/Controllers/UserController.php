<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\Station;
use App\Models\Position;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Services\UserCreateService;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\User\CreateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(15);
        return view('admin.modules.user.index', compact('users'));
    }

    public function create()
    {
        /**
         * TODO:
         * 1) roles and permissions validation load them by ajax
         * 2) generate and fill automatically email field ajax
         *
         */
        $roles = Role::whereNotIn('name', ['superadmin'])->pluck('name', 'id')->toArray();
        $permissions = Permission::all()->pluck('name', 'id')->toArray();
        $regions = Region::orderBy('regionid', 'asc')->pluck('nameUz', 'regionid')->toArray();
        $positions = Position::orderBy('id', 'asc')->pluck('name', 'code')->toArray();
        $stations = Station::orderBy('id', 'asc')->pluck('name', 'id')->toArray();

        return view('admin.modules.user.create', compact('roles', 'permissions', 'regions', 'positions', 'stations'));
    }

    public function store(CreateRequest $request, UserCreateService $userCreateService)
    {
        $valid_user_data = $request->validated();

        try {
            $userCreateService->createUser($valid_user_data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('user.index')->with('status', trans('messages.user_created'));
    }

    public function edit(User $user)
    {
        $roles = Role::whereNotIn('name', ['superadmin'])->pluck('name', 'id')->toArray();
        $permissions = Permission::all()->pluck('name', 'id')->toArray();
        $regions = Region::orderBy('regionid', 'asc')->pluck('nameUz', 'regionid')->toArray();
        $positions = Position::orderBy('id', 'asc')->pluck('name', 'code')->toArray();
        $stations = Station::orderBy('id', 'asc')->pluck('name', 'id')->toArray();

        return view('admin.modules.user.edit', compact('roles', 'permissions', 'regions', 'positions', 'stations', 'user'));
    }

    public function update(EditRequest $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
