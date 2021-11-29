<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 17:44
 */
?>
@extends('layouts.app', ['baseurl' => $baseurl])
@section('content')

    <div class="card" style="width: 60%;align-content: center; ">
        <h5 class="card-header text-center">ورود</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="{{ $baseurl }}/login" method="post" style="width: 100%; ">

                <div class="mb-3">
                    <label class="form-label">شماره موبایل را وارد کنید</label>
                    <input type="text" name="mobile" class="form-control" required>
                </div>
                <input type="hidden" name="{{$csrf['nameKey']}} " value="{{ $csrf['name1'] }}">
                <input type="hidden" name="{{ $csrf['valueKey'] }}" value="{{ $csrf['value'] }}">
                <button type="submit" class="btn btn-primary">ورود</button>
            </form>
        </div>
    </div>
@endsection