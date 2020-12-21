<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Requests\Profile\UpdateRequest;

class UserProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user_profile)
    {
        $user = $user_profile;
        return view("user.profile.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user_profile)
    {
        $data = $request->validated();
        $user_profile->fill($data);
        $user_profile->save();

        return redirect()->back()->with('status', trans('messages.saved_successfully'));
    }
}
