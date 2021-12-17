<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('oneid_template/admin/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('oneid_template/admin/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('oneid_template/admin/images/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('oneid_template/admin/images/favicon.ico')}}">
    <link rel="manifest" href="{{asset('oneid_template/admin/images/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('oneid_template/admin/images/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <title>Тизимга кириш |</title>
    <link rel="stylesheet" href="{{asset('oneid_template/admin/css/style.css')}}">
</head>

<body>
<div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0" style="background: none !important;">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <!--  <div class="brand-logo text-right">
                            <img src="{{asset('oneid_template/admin/images/logo.svg')}}" alt="logo">
                        </div> -->
                        <h6 class="font-weight-light">Тизимга кириш</h6>
                        <h4>OneID - ягона идентификация тизими</h4>
                        <h6 class="font-weight-light">орқали амалга оширилади.</h6>
                        <br>
                        <h6 class="font-weight">Диққат! <span class="font-weight-light"> Тизимга OneID - ягона идентификация тизими орқали киришни амалга ошириш Сизнинг ягона идентификация тизими томонидан ушбу порталга ўзингизга тегишли бўлган шахсий маълумотларни узатилишига розилик беришингизни англатади.</span></h6>
                        <hr>
                        <div class="form-check">
                            <label class="">
                                <input v-model="isChecked" class="checkbox" type="checkbox">
                                <small>Порталдан фойдаланиш шартларига розиман.</small>
                                <i class="input-helper"></i></label>
                        </div>
                        <form class="pt-3">
                            <div class="mt-3">
                                <a v-if="isChecked" href="{{route('oneidlogin')}}" class="btn  btn-block btn-lg font-weight-medium btn-linkedin"><i class="mdi mdi-logout"></i> ТИЗИМГА КИРИШ</a>
                                <a v-else-if="!isChecked" href="{{route('oneidlogin')}}" class="btn  btn-block btn-lg font-weight-medium btn-linkedin disabled"><i class="mdi mdi-logout"></i> ТИЗИМГА КИРИШ</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                <small class="text-muted text-center text-sm-center d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.hydromet.uz/" target="_blank">ЦЕНТР ГИДРОМЕТЕОРОЛОГИЧЕСКОЙ
                                        СЛУЖБЫ РЕСПУБЛИКИ УЗБЕКИСТАН (УЗГИДРОМЕТ)</a>.</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<script type="text/javascript" src="{{asset('oneid_template/js/axios.min.js')}}"></script>
<script type="text/javascript" src="{{asset('oneid_template/js/vue.js')}}"></script>

<script>
    let app = new Vue({
        el:'#app',
        data:{
            isChecked:false,

        }
    })
</script>
</body>

</html>
