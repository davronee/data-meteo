@extends('layouts.app')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ __('messages.profile_tab_org') }}</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="">
                    <ul class="nav nav-tabs bar_tabs">
                        <li class="">
                            <a href="{{ url('users/profile/'. $user_id ) }}">{{ __('messages.profile_tab_info') }}</a>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::user()->id  == $user_id)
                            <li class="">
                                <a href="{{ url('users/' . $user_id . '/edit') }}">{{ __('messages.profile_tab_user') }}</a>
                            </li>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->id  == $user_id)
                            <li class="active">
                                <a href="{{ url('users/' . $user_id . '/company/edit') }}">{{ __('messages.profile_tab_org') }}</a>
                            </li>
                        @endif
                        <li class="">
                            <a href="{{ url('users/' . $user_id . '/password/edit') }}">{{ __('messages.profile_tab_password') }}</a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_user" aria-labelledby="home-tab">

                          <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="x_panel">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <button class="close" data-dismiss="alert"></button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert"></button> {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <button class="close" data-dismiss="alert"></button> {{ session('error') }}
                                    </div>
                                @endif

                                <div class="x_title">
                                  <ul class="nav navbar-right panel_toolbox hidden-phone">
                                    <div class="col-md-3 col-sm-3 pull-right input-group inn-checker-wrapper">
                                          <input type="text" class="form-control" id="inn_input" data-mask="999999999" placeholder="{{ __('messages.org_inn') }}">
                                          <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" id="inn_checker">{{ __('messages.sidebar_search') }}</button>
                                          </span>
                                        </div>
                                  </ul>
                                  <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <form data-parsley-validate class="form-horizontal form-label-left input_mask" action="{{ url('/users/company-edit') }}" method="post" id="company_form">
                                        @csrf

                                        <!-- Вилоят -->
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" id="region" readonly="" name="region" value="{{ old('region', object_value($company, 'region')) }}" required="required" placeholder="{{ __('messages.org_region') }}">
                                        </div>
                                        <!-- Туман/шаҳар -->
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" id="district" readonly="" name="district" value="{{ old('district', object_value($company, 'district')) }}" required="required" placeholder="{{ __('messages.org_area') }}">
                                        </div>
                                        <!-- Манзили -->
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" id="address" readonly="" name="address" value="{{ old('address', object_value($company, 'address')) }}" required="required" placeholder="{{ __('messages.org_addres') }}">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="ln_solid"></div>

                                        <!-- Телефон -->
                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" id="phone"  name="phone" value="{{ old('phone', object_value($company, 'phone')) }}" required="required" placeholder="{{ __('messages.org_phone') }}" data-inputmask="'mask' : '+999 (99) 999-9999'">
                                        </div>

                                        <!-- Факс -->
                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" id="fax"  name="fax" value="{{ old('fax', object_value($company, 'fax')) }}" required="required" placeholder="{{ __('messages.org_fax') }}" data-inputmask="'mask' : '+999 (99) 999-9999'">
                                        </div>

                                        <!-- E-mail -->
                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                            <input type="email" class="form-control col-md-7 col-xs-12" id="email" name="email" value="{{ old('email', object_value($company, 'email')) }}" placeholder="{{ __('messages.org_email') }}">
                                        </div>

                                        <!-- ИНН -->
                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                            <input type="inn" class="form-control" id="inn" readonly="" name="inn" value="{{ old('inn', object_value($company, 'inn')) }}" required="required" placeholder="{{ __('messages.org_inn') }}">
                                        </div>


                                        <!-- Раҳбар исм-шарифи -->
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" data-toggle="tooltip" title="{{ __('messages.org_owner') }}" id="owner" name="owner" value="{{ old('owner', object_value($company, 'owner')) }}" required="required" placeholder="{{ __('messages.org_owner') }}">
                                        </div>

                                        <input type="hidden" name="user_id" value="{{ $user_id }}">

                                        <div class="clearfix"></div>
                                        <div class="ln_solid"></div>

                                        <div class="form-group pull-right">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <a href="{{ url('users/profile') }}" class="btn btn-default">{{ __('messages.cancel_button') }}</a>
                                                <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>
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
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

@endsection
