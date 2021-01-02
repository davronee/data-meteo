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
								<form action="{{ route('user_profile.password.update', $user->id) }}" method="post" class="row row-sm">
                                    @csrf

                                    @method('PUT')

									<div class="form-group col-sm-12">
                                        <label class="form-label">Парол</label>
                                        <input type="password" name="password" id="password" class="form-control" minlength="3" required autocomplete="off">
                                    </div>
									<div class="form-group col-sm-12">
                                        <label class="form-label">Паролни тасдиклаш</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" minlength="3" required autocomplete="off">
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
