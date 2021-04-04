@extends('layouts.layout')

@section('mainSection')
@if (isset($errorLogin))
<div style="color:red">
{{ $errorLogin }}
</div>
@endif
<h2>ثبت نام</h2>
<form action="{{ Route('register') }}" method="POST">
    @csrf
    <div style="margin-top: 10px"><input type="text" name="email" style="width: 250px;margin-bottom: 10px;direction: ltr;" placeholder="email"></div>
    <div style="margin-top: 10px"><input type="text" name="familyName" style="width: 250px;margin-bottom: 10px;direction: ltr;" placeholder="familyName"></div>
    <div style="margin-top: 10px"><input type="password" name="password" style="width: 250px;margin-bottom: 10px;direction: ltr;" placeholder="password"></div>
    <div style="margin-top: 10px"><input type="password" name="confirmPassword" style="width: 250px;margin-bottom: 10px;direction: ltr;" placeholder="reset Password"></div>
    <div style="margin-top: 10px"><input type="submit" value="ورود" style="width: 100px"></div>



</form>
@endsection
