<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 19:02
 */
?>
@extends('layouts.app', ['baseurl' => $baseurl])
@section('content')

    <div style="margin-left: -400px; ">


        </br>

        @if(isset($_SESSION['role']))
            @if($_SESSION['role']=="admin")
                <h2>مدیر</h2>
                <h2>اینجا میز کار شماست</h2>
            @else
                <h2>کاربر عادی</h2>
                </br>
            @endif
        @endif


    </div>
@endsection
