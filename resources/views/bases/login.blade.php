@extends('layouts.layout')

@section('mainSection')
@if (isset($errorLogin))
<div style="color:red">
{{ $errorLogin }}
</div>
@endif
<h2>صفحه ورود</h2>
<form action="{{ Route('login') }}" method="POST">
    @csrf
    <div style="margin-top: 10px"><input type="text" name="email" style="width: 250px;margin-bottom: 10px;direction: ltr;"></div>
    <div style="margin-top: 10px"><input type="password" name="password" style="width: 250px;margin-bottom: 10px;direction: ltr;"></div>
    <div style="margin-top: 10px"><input type="submit" value="ورود" style="width: 100px"></div>



</form>
@endsection
