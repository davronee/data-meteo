<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Profile\PasswordUpdateRequest;

class UserProfilePasswordController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user_profile)
    {
        $user = $user_profile;
        return view("user.profile.password", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user_profile
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordUpdateRequest $request, User $user_profile)
    {
        $data = $request->validated();
        $user_profile->password = $data['password'];
        $user_profile->save();

        return redirect()->back()->with('status', trans('messages.saved_successfully'));
    }
}
