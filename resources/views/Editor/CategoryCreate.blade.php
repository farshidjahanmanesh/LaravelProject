@extends('layouts.layout')

@section('mainSection')
    <div>
        <div style="margin-bottom: 25px">
            <form action="{{ Route('Editor.CategoryCreatePostMethod') }}" method="POST">
                @csrf
                <label style="display: block">ایجاد یک دسته بندی جدید</label>
                <input type="text" name="CatName"/>
                <input type="submit" class="btn btn-success" value="ثبت">
            </form>
        </div>
        <table class="table">
            <h3>
                دسته بندی های موجود
            </h3>
            <thead>
                <tr>
                    <td>شماره</td>
                    <td>نام دسته بندی</td>

                </tr>
            </thead>
            @php
                $i = 1;
            @endphp
            <tbody>
                @foreach ($cat as $category)
                    <tr>
                        <td>
                            {{ $i }}
                        </td>
                        <td>
                            {{ $category->catName }}
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
