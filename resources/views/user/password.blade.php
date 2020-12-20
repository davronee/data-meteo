@extends('layouts.app')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ __('messages.profile_tab_password') }}</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="">

                    <ul class="nav nav-tabs bar_tabs">
                        <li class="">
                            <a href="{{ url('users/profile/'. $user->id ) }}">{{ __('messages.profile_tab_info') }}</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->id  == $user->id)
                        <li>
                            <a href="{{ url('users/' . $user->id . '/edit') }}">{{ __('messages.profile_tab_user') }}</a>
                        </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->id  == $user->id)
                        <li class="">
                            <a href="{{ url('users/' . $user->id . '/company/edit') }}">{{ __('messages.profile_tab_org') }}</a>
                        </li>
                        @endif
                        <li class="active">
                            <a href="{{ url('users/' . $user->id . '/password/edit') }}">{{ __('messages.profile_tab_password') }}</a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div id="tab_2-2" class="tab-pane active fade in">
                          <div style="height: auto;" id="accordion3-3" class="accordion collapse in">

                              @if($errors->any())
                                  <div class="alert alert-danger span8">
                                      <button class="close" data-dismiss="alert"></button>
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                                  <div class="clearfix"></div>
                              @endif

                              @if (session('error'))
                               <div class="alert alert-danger">
                                  <button class="close" data-dismiss="alert"></button> {{ session('error') }}
                               </div>
                              @endif

                              @if (session('success'))
                               <div class="alert alert-success">
                                  <button class="close" data-dismiss="alert"></button> {{ session('success') }}
                               </div>
                              @endif

                              <form action="{{ url("users/change-password") }}" data-parsley-validate class="form-horizontal form-label-left" method="post">

                                  <div class="row">
                                    @csrf

                                    <!-- Эслатма -->
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <p class="alert alert-info" style="margin-top: 10px;">
                                            {{ __('messages.alert_cache') }}
                                        </p>
                                    </div>

                                    @if($user->id == $auth_user->id || strlen($auth_user->region_id) == 7)
                                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                          <input type="password" name="old_password" class="m-wrap span8 form-control" required="required" placeholder="{{ __('messages.password_current') }}">
                                      </div>
                                    @endif

                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <input type="password" name="password" class="m-wrap span8 form-control" required="required" placeholder="{{ __('messages.password_new') }}">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <input type="password" name="password2" class="m-wrap span8 form-control" required="required" placeholder="{{ __('messages.password_repeat') }}">
                                    </div>

                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    <div class="submit-btn col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn green">{{ __('messages.save') }}</button>
                                        <a href="{{ url('users/profile') }}" class="btn btn-default">{{ __('messages.cancel_button') }}</a>
                                    </div>
                                  </div>
                              </form>

                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
