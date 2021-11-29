<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 18:46
 */
?>

@extends('layouts.app', ['baseurl' => $baseurl])
@section('content')

    <div class="card" style="width: 60%;align-content: center; ">
        <h5 class="card-header text-center">بررسی کد</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="{{ $baseurl }}/verify/smsVerifyCode" method="post" style="width: 100%; ">
                <div class="mb-3">
                    <label class="form-label">لطفا کد پیامک شده را وارد کنید</label>
                    <input type="text" name="code" class="form-control" aria-describedby="emailHelp" required>

                </div>
                <input type="hidden" name="{{$csrf['nameKey']}} " value="{{ $csrf['name1'] }}">
                <input type="hidden" name="{{ $csrf['valueKey'] }}" value="{{ $csrf['value'] }}">
                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
@endsection
