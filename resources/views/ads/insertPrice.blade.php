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
        <h5 class="card-header text-center">افزودن قیمت </h5>
        <div class="card-body" style="align-content: center; ">
            <form action="{{ $baseurl }}/admin/panel/NewPrice" method="post" style="width: 100%;align-content: center;">

                <div class="mb-3">
                    <label class="form-label">انتخاب سایت</label>
                    <select name="site_id" class="form-select" aria-label="Default select example" required>

                        @foreach($data as $row)
                            <option value="{{ $row['id'] }}" >{{ $row['site_name_en'] }}</option>

                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">عنوان فارسی</label>
                    <input type="text" name="title_fa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">عنوان انگلیسی</label>
                    <input type="text" name="title_en" class="form-control" required>
                </div>


                <div class="mb-3">
                    <label class="form-check-label">توضیحات</label>
                    <textarea name="description" class="form-control"></textarea>

                </div>

                <div class="mb-3">
                    <label class="form-check-label">ابعاد بنر</label>
                    <input type="text" name="dimensions" class="form-control" required>

                </div>

                <div class="mb-3">
                    <label class="form-check-label">هزینه</label>
                    <input type="text" name="price" class="form-control" required>

                </div>

                <div class="mb-3">
                    <label class="form-check-label">مکان تبلیغ</label>
                    <input type="text" name="place_ads" class="form-control" required>

                </div>


                <input type="hidden" name="{{$csrf['nameKey']}} " value="{{ $csrf['name1'] }}">
                <input type="hidden" name="{{ $csrf['valueKey'] }}" value="{{ $csrf['value'] }}">

                <button type="submit" class="btn btn-primary">ثبت</button>


            </form>
        </div>
    </div>
@endsection

