<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('adminLTE/dist/css/bootstrap-theme.css')}}">

        <script src="{{asset('adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    </head>
    <body >
        <div class="row" style="text-align: center;margin-top: 30px">
            <div style="margin: auto">
                <a href="/admin/dashboard" class="btn btn-primary">ورود به پنل ادمین</a>
            </div>
        </div>
    </body>
</html>
