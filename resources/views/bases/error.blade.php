@extends('layouts.layout')

@section('mainSection')
<div>
    <h3>شما با ارور مواجه شده اید</h3>
    <p>متن ارور : {{ $error }}</p>
</div>
@endsection
