<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 14:32
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ $baseurl }}/css/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            @if(isset($_SESSION['mobile']) == null )
                <li class="nav-item">
                    <a style="color: white;" class="nav-link" href="{{ $baseurl }}/login">ورود</a>
                </li>

            @elseif(isset($_SESSION['mobile']) != null )
                <li class="nav-item">
                    <a style="color: white;" class="nav-link" href=""> خوش
                        آمدید {{ $_SESSION['firstname'] }} {{ $_SESSION['lastname'] }}</a>
                </li>
                <li class="nav-item">
                    <a style="color: white;" class="nav-link" href="{{ $baseurl }}/logout">خروج</a>
                </li>

                @if($_SESSION['role']=='admin')
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ $baseurl }}/admin/panel/dashboard">میزکار</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ $baseurl }}/admin/panel/NewSite">سایت جدید</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ $baseurl }}/admin/panel/NewPrice">افزودن قیمت</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ $baseurl }}/admin/panel/SitePic">افزودن عکس سایت</a>
                    </li>

                @elseif($_SESSION['role']=='user')
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="{{ $baseurl }}/user/panel/dashboard">میزکار</a>
                    </li>
                @endif

            @endif
        </ul>

    </div>
</nav>
<div>
    <div class="container-md">
        </br>
        <div style="margin-left: 340px;">
            @yield('content')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>

