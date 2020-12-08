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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, UserCreateService $userCreateService)
    {
        $valid_user_data = $request->validated();

        try {
            $userCreateService->createUser($valid_user_data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('home.index')->with('status', trans('messages.user_created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
