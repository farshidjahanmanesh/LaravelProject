@extends('layouts.layout')

@section('mainSection')
<form action="{{ route('ArticleManagement.createArticle') }}" method="POST">
    @csrf
    <div>
        <label>عنوان مقاله</label>
        <input type="text" name="title"/>
    </div>

    <div>
        <label>تصویر مقاله</label>
        <input type="file" name="picture"/>
    </div>

    <div>
        <label>مطلب</label>
        <input type="text" name="text"/>
    </div>
    <div>
        <input type="submit" value="ثبت">
    </div>
</form>
@endsection
