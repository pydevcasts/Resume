<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <title>Login | Siyamak</title>

</head>

<body>
    <div class="container-login">
        <div class="wrapper" id="app">


            <router-view></router-view>
        </div>
    </div>
</body>

<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/all.js')}}"></script>

</html>