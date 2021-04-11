@extends('layouts.layout')

@section('mainSection')
    <div class="col-12">
        <form action="{{ route('ArticleManagement.createArticle') }}" method="POST" enctype="multipart/form-data"
            style="font-size: 16px">
            @csrf
            <div class="row">
                <label>عنوان مقاله</label>
                <input style="width: 250px;display: block" type="text" name="title" />
            </div>

            <div class="row">
                <label>تصویر مقاله</label>
                <input style="width: 200px;display: block" type="file" name="picture" />
            </div>

            <div class="row">
                <label>مطلب</label>
                <textarea style="display: block;width: 500px;height: 400px;" type="text" name="text"></textarea>
            </div>
            <div>
                <input class="btn btn-success" style="width: 100px;margin-top:30px;" type="submit" value="ثبت">
            </div>
        </form>
    </div>

@endsection
