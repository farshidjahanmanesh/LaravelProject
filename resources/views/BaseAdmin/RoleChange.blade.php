@extends('layouts.layout')

@section('mainSection')
<form action="{{ Route('EditAccess') }}" method="POST">
    @csrf
<h2>تخصیص نقش به کاربر {{ $userData->name }}</h2>
@php
    $id=0;
@endphp
<input type="hidden" name="id" value="{{ $userData->id }}"/>
@foreach ($categories as $category)
<div>
    <lable>{{$category->catName  }}</lable>
    <?php
    if($category->catName!=$userData->role)
    {
    ?>
    <input name="roleId" type="radio" value="{{ $category->catName }}"/>
    <?php
    }
    ?>

    <?php
    if($category->catName==$userData->role)
    {
    ?>
    <input name="roleId" type="radio" value="{{ $category->catName }}" checked="checked"/>
    <?php
    }
    ?>
    @php
        $id++;
    @endphp
</div>

@endforeach

@foreach ($tempRoles as $temp)
<div>
    <lable>{{$temp  }}</lable>
    <?php
    if($temp!=$userData->role)
    {
    ?>
    <input name="roleId" type="radio" value="{{ $temp }}"/>

    <?php
    }
    ?>


    <?php
    if($temp==$userData->role)
    {
    ?>
    <input name="roleId" type="radio" value="{{ $temp }}" checked="checked"/>
    <?php
    }
    ?>


    @php
    $id++;
@endphp
</div>

@endforeach
<div >
    <input style="width: 200px" class="btn btn-success " type="submit" value="ثبت">
</div>
</form>
@endsection
