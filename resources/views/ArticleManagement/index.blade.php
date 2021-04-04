@extends('layouts.layout')

@section('mainSection')
    <div>
        <div>
            <a href="{{ route('ArticleManagement.Create') }}" class="btn btn-success">ایجاد مقاله جدید</a>
        </div>
        <table class="table" style="font-size: 17px">
            <tr>
                <th scope="col">شماره</td>
                <th scope="col">عنوان</td>
                <th scope="col">وضعیت</td>
                <th scope="col">حذف</td>
                <th scope="col">اعمال تغییرات</td>
            </tr>
            @php
                $counter = 1;
            @endphp
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $counter }}</td>

                    <td>{{ $post->title }}</td>
                    <td>
                        @if ($post->isActive)
                            <span>فعال</span>
                        @else
                            <span>غیر فعال</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ Route('ArticleManagement.Delete',['id'=>$post->id]) }}">حذف پست</a>
                    </td>
                    @php
                        $counter++;
                    @endphp
                </tr>
            @endforeach
        </table>
    </div>
@endsection
