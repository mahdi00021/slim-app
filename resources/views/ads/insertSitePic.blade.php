<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 01/08/2021
 * Time: 17:14
 */
?>

@extends('layouts.app', ['baseurl' => $baseurl])
@section('content')

    <div class="card" style="width: 60%;align-content: center; ">
        <h5 class="card-header text-center">افزودن تصویر برای سایت</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="{{ $baseurl }}/admin/panel/NewSitePic" method="post" style="width: 100%;align-content: center;"
                  enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">انتخاب سایت</label>
                    <select name="site_id" class="form-select" aria-label="Default select example" required>

                        @foreach($data as $row)
                            <option value="{{ $row['id'] }}">{{ $row['site_name_en'] }}</option>

                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">عنوان فارسی عکس</label>
                    <input type="text" name="title_fa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-check-label">عنوان انگلیسی عکس</label>
                    <input type="text" name="title_en" class="form-control" required>

                </div>


                <div class="mb-3">
                    <label>افزودن عکس</label></br>
                    </br>
                    <input type="file" name="image" required/>
                </div>


                <input type="hidden" name="{{$csrf['nameKey']}} " value="{{ $csrf['name1'] }}">
                <input type="hidden" name="{{ $csrf['valueKey'] }}" value="{{ $csrf['value'] }}">

                <button type="submit" class="btn btn-primary">ثبت</button>


            </form>
        </div>
    </div>
@endsection

