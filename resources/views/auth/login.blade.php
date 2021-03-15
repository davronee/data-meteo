@extends('layouts.html')

@section('content')
<div class="signin-panel">
    <div class="signin-sidebar">
        <div class="signin-sidebar-body">
            <div class="text-center">
                <a href="#" class="text-success">
                    <span><img src="{{ asset('template/assets/img/gidrometeo.svg') }}" alt=""></span>
                </a>
                <div class="divider-text">Кабинет пользователя</div>
            </div>
            <div class="signin-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label>Логин</label>
                        <input type="text" class="form-control" placeholder="Введите свой логин" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="d-flex justify-content-between">
                            <span>Пароль</span>
                        </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Введите свой пароль">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group d-flex mg-b-0">
                        <button type="submit" class="btn btn-facebook btn-uppercase btn-block"><i class="fas fa-sign-out-alt"></i> Войти</button>
                    </div>
                </form>
            </div>
            <p class="mg-t-auto mg-b-0 tx-sm tx-color-03 tx-center">Центр гидрометеорологической службы Республики Узбекистан</p>
        </div><!-- signin-sidebar-body -->
    </div><!-- signin-sidebar -->
</div><!-- signin-panel -->
@endsection
