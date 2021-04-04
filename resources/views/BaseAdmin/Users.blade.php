@extends('layouts.layout')

@section('mainSection')

    <div>
        <table class="table" style="font-size: 17px">
                <tr>
                    <th scope="col">شماره</td>
                    <th scope="col">نام</td>
                    <th scope="col">ایمیل</td>
                    <th scope="col">نقش</td>
                    <th scope="col">تغییر نقش</td>
                </tr>
            @php
            $counter = 1;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (isset($user->role))
                            {{ $user->role }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('userAccess',['id'=>$user->id]) }}" class="btn btn-primary">تغییر نقش</a>
                    </td>
                    @php
                        $counter++;
                    @endphp
                </tr>
            @endforeach
        </table>
    </div>
@endsection
