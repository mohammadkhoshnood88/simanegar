<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ثبت نام | کنترل پنل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/bootstrap-theme.css')}}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/rtl.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/AdminLTE.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/skins/_all-skins.min.css')}}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">

    <div class="register-box-body">
        <p class="login-box-msg">ثبت نام کاربر جدید</p>

        @if ($errors->any())
            <div class="alert alert-danger errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register')}}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" placeholder="نام و نام خانوادگی">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="mobile" placeholder="موبایل">
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="رمز عبور">
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="rpassword" placeholder="تکرار رمز عبور">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" id="agree"> من <a href="#">قوانین و شرایط</a> را قبول میکنم.
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat btn-register disabled">ثبت نام</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- یا -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> ثبت نام با
                فیسبوک</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> ثبت نام
                با گوگل</a>
        </div>

        <a href="/login" class="text-center">من قبلا ثبت نام کرده ام</a>
    </div>

</div>

<script src="{{asset('adminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>

<script src="{{asset('adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script>
    $('#agree').change(function () {
        let el = $('.btn-register')
        if (el.hasClass('disabled'))
            $('.btn-register').removeClass('disabled')
        else
            $('.btn-register').addClass('disabled')
    })
</script>

<script>
    $(function () {
        setTimeout(function () {
            $(".errors").fadeOut(800);
        }, 4500)
    })
</script>

</body>
</html>
