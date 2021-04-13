@extends('layouts.layout')

@section('mainSection')
<div>
    <form action="{{ Route('SendEmailPost') }}" method="POST">
        @csrf
        <div>
            <label style="display: block"> عنوان پیغام</label>
            <input type="text" name="subject" style="width: 150px">
        </div>
        <div>
            <label style="display: block"> متن پیغام</label>
            <textarea type="text" name="emailText" style="height: 250px;width: 350px"></textarea>
        </div>
        <div>
            <input type="submit" value="ارسال" class="btn btn-success">
        </div>
    </form>
</div>
@endsection
