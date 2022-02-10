@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('theme2/assets/profile.css') }}" />
@endsection

@section('content')
    @if (session('success'))
     <div class="alert alert-success">
        <button class="close" data-dismiss="alert"></button> {{ session('success') }}
     </div>
    @endif

    <div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $user->middlename }}  {{ $user->firstname }} {{ $user->lastname }}</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <ul class="nav nav-tabs bar_tabs">
                        <li class="active">
                            <a href="{{ url('users/profile/'. $user->id ) }}">{{ __('messages.profile_tab_info') }}</a>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::user()->id  == $user->id)
                        <li class="">
                            <a href="{{ url('users/' . $user->id . '/edit') }}">{{ __('messages.profile_tab_user') }}</a>
                        </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->id  == $user->id)
                        <li class="">
                            <a href="{{ url('users/' . $user->id . '/company/edit') }}">{{ __('messages.profile_tab_org') }}</a>
                        </li>
                        @endif
                        <li class="">
                            <a href="{{ url('users/' . $user->id . '/password/edit') }}">{{ __('messages.profile_tab_password') }}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="">
                                    <div class="profile-info">
                                        <br>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-map-marker"></i> {{ $user->formattedRegion() }}</li>
                                            <li><i class="fa fa-check-square-o"></i> {{ $user->formatPosition() }}</li>
                                        </ul>
                                    </div>
                                    <!--end span8-->
                                </div>
                                <!--end row-fluid-->
                            </div>
                            <div class="span12">
                                <div class="profile-classic row-fluid">
                                    <ul class="unstyled span12">
                                        <li><span>{{ __('messages.user_lastname') }}:</span> {{ $user->lastname }}</li>
                                        <li><span>{{ __('messages.user_firstname') }}:</span> {{ $user->firstname }}</li>
                                        <li><span>{{ __('messages.user_middlename') }}:</span> {{ $user->middlename }}</li>
                                        <li><span>{{ __('messages.user_passport') }}:</span> {{ $user->passport }}</li>
                                        <li><span>{{ __('messages.user_birth_date') }}:</span> {{ $user->birth_date }}</li>
                                        <li><span>{{ __('messages.user_adress') }}:</span> {{ $user->address }}</li>
                                        <li><span>{{ __('messages.user_inn') }}:</span> {{ $user->inn }}</li>
                                        <li><span>{{ __('messages.user_formattedPhone') }}:</span> {{ $user->formattedPhone() }}</li>
                                        <li><span>{{ __('messages.user_org') }}:</span> {{ $user->formattedRegion() }}</li>
                                        <li><span>{{ __('messages.user_formatPosition') }}:</span> {{ $user->formatPosition() }}</li>
                                        <li><span>{{ __('messages.user_received_date') }}:</span> {{ $user->received_date }}</li>
                                        <li><span>{{ __('messages.user_reg_num') }}:</span> {{ $user->reg_num }}</li>
                                        <li><span>{{ __('messages.user_getExperience') }}:</span> ≈ {{ $user->getExperience() }} йил </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
