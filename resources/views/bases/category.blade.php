@extends('layouts.layout')

@section('mainSection')
    <div class="container-post">

        @foreach( $posts as $post)
            <article>
                <h2><a href="#">{{$post->title}}</a></h2>
                <div class="post-image">

                    <img src="/img/post/{{$post->picture}}" alt="post image 3">
                </div>
                <div class="post-text">
                    <span class="date info">{{$post->title}}</span>
                    <p>
                        {{$post->text}}
                    </p>
                </div>
                <div class="post-info">
                    <div class="post-by">تاریخ : {{ $post->created_at }}</div>
                    <div>
                        <a href="{{route('selectPost',['id'=>$post->id])}}" name="id" class="btn btn-primary">ادامه
                            مطلب</a>
                            <p>

                                دسته بندی :
                                <a href="{{route('categoryRoute',['id'=>$post->category->id])}}">{{ $post->category->catName }}</a>
                            </p>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </article>
    @endforeach
    <!-- ARTICLE 1 -->


    </div><!-- POST-CONTAINER -->


@endsection
