@extends('layouts.html')

@section('content')

<div class="content-body mg-t-20 mg-b-20">
    @include('common.messages')

	<div class="mail-body-content">
		@include('partials.profile.navbar')
		<div class="row row-xs">
            @include('partials.profile.sidebar')

			<div class="col-md-9 mg-b-15">
				<div class="card-body pd-sm-40 pd-md-30 pd-xl-y-35 pd-xl-x-40">
					<div class="tab-content-style">
						<div id="paneProfile" class="tab-pane active show">
							<div class="form-settings">
								<form action="{{ route('user-profile.update', $user->id) }}" method="post" class="row row-sm">
                                    @csrf

                                    @method('PUT')

									<div class="form-group col-sm-4">
                                        <label class="form-label">Исм</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname', $user->firstname) }}" required1 autocomplete="off">
                                    </div>
									<div class="form-group col-sm-4 ">
                                        <label class="form-label">Фамилия</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $user->lastname) }}" required1 autocomplete="off">
                                    </div>
									<div class="form-group col-sm-4 ">
                                        <label class="form-label">Отасининг исми</label>
                                        <input type="text" name="middlename" id="middlename" class="form-control" value="{{ old('middlename', $user->middlename) }}" required1 autocomplete="off">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label class="form-label">Паспорт с/р</label>
                                        <input type="text" name="passport" id="passport" class="form-control" value="{{ old('passport', $user->passport) }}" required1 autocomplete="off" data-inputmask="'mask': 'AA9999999'">
                                    </div>
									<div class="form-group col-sm-6">
                                        <label class="form-label">Амал қилиш муддати</label>
                                        <input type="text" name="passport_expire" id="passport_expire" class="form-control date-field" value="{{ old('passport_expire_formatted', $user->passport_expire_formatted) }}" required1 autocomplete="off">
                                    </div>
									<div class="form-group col-sm-12">
                                        <label class="form-label">Манзил</label>
                                        <input type="text" name="passport_address" id="passport_address" class="form-control" value="{{ old('passport_address', $user->passport_address) }}" required1 autocomplete="off">
                                    </div>
									<div class="form-group col-sm-3">
                                        <label class="form-label">ЖШ ШИР</label>
                                        <input type="text" name="pinfl" id="pinfl" class="form-control" value="{{ old('pinfl', $user->pinfl) }}" required1 autocomplete="off" maxlength="14" data-inputmask="'mask': '99999999999999'">
                                    </div>
									<div class="form-group col-sm-3">
                                        <label class="form-label">СТИР</label>
                                        <input type="text" id="stir" name="stir" class="form-control" value="{{ old('stir', $user->stir) }}" required1 autocomplete="off" maxlength="9" data-inputmask="'mask': '999999999'">
                                    </div>
									<div class="form-group col-sm-3">
										<label class="form-label">Телефон</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text">+998</span></div>
											<input type="text" id="phone" name="phone" maxlength="9" data-inputmask="'mask': '999999999'" value="{{ old('phone', $user->phone) }}" placeholder="ХХХХХХХХХ" required1 class="form-control" autocomplete="off" maxlength="9">
										</div>
									</div>
                                    <div class="form-group col-sm-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" name="email" class="form-control email-field" value="{{ old('email', $user->email) }}" placeholder="Введите E-mail" required1 autocomplete="off" data-inputmask="'alias': 'email'">
                                    </div>

									<div class="col-md-12">
										<hr class="op-0">
                                        <button type="submit" class="btn btn-sm btn-outline-success">Киритиш</button>
                                        <button type="reset" class="btn btn-sm btn-outline-light mg-l-2">Ўзгартиришларни бекор қилиш</button>
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

@endsection
