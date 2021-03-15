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
    <div><input type="text" name="email" style="width: 250px;margin-bottom: 10px;direction: ltr;"></div>
    <div><input type="password" name="password" style="width: 250px;margin-bottom: 10px;direction: ltr;"></div>
    <div><input type="submit" value="ورود" style="width: 100px"></div>



</form>
@endsection
