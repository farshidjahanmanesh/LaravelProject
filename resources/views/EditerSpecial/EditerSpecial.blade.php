@extends('layouts.layout')

@section('mainSection')
    <div class="col-12">
        <table class="table">
            <tr>
                <td>
                    نام مقاله
                </td>
                <td>
                    وضعیت
                </td>
                <td>
                    تاریخ انتشار
                </td>
                <td>
                    برو به مقاله
                </td>
                <td>
                    نمایش در اخبار برگزیده
                </td>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        {{ $post->title }}

                    </td>
                    <td>
                        @if ($post->isActive == 1)
                            <a id="btnChangeState{{ $post->id }}" class="btn btn-danger"
                                onclick="ChangeState({{ $post->id }})">انتقال به وضعیت غیر فعال</a>
                        @else
                            <a id="btnChangeState{{ $post->id }}" class="btn btn-success"
                                onclick="ChangeState({{ $post->id }})">انتقال به وضعیت فعال</a>
                        @endif
                    </td>
                    <td>
                        {{ $post->created_at }}
                    </td>
                    <td>
                        <a href="{{ route('selectPost', ['id' => $post->id]) }}">برو به این مقاله<a />
                    </td>
                    <td>
                        @if ($post->isSelectByEditor == 1)
                            <a  class="btn btn-danger"
                               >انتقال به وضعیت غیر برگزیده</a>
                        @else
                            <a  class="btn btn-success"
                               >انتقال به وضعیت برگزیده</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection


@section('scripts')
    <script>
        function ChangeState(id) {
            var formData = {
                postId: id
            };
            $.ajax({
                type: 'get',
                url: '/changeStatePost',
                data: formData,
                success: function(data) {
                    if (data == 0) {
                        $("#btnChangeState" + id).removeClass("btn-danger").addClass("btn-success");
                        $("#btnChangeState" + id).html("انتقال به وضعیت فعال");


                    } else {
                        $("#btnChangeState" + id).removeClass("btn-success").addClass("btn-danger");
                        $("#btnChangeState" + id).html("انتقال به وضعیت غیر فعال");
                    }
                    console.log(data);
                }
            });
        }


    </script>
@endsection
