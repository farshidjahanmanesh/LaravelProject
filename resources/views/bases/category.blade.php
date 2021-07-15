@extends('layouts.layout')

@section('mainSection')
    <div class="container-post">

        @foreach ($posts as $post)
            <article>
                <h2><a href="#">{{ $post->title }}</a></h2>
                <div class="post-image">

                    <img src="/img/post/{{ $post->picture }}" alt="post image 3">
                </div>
                <div class="post-text">
                    <span class="date info">{{ $post->title }}</span>
                    <p>
                        {{ $post->text }}
                    </p>
                </div>

                <div class="post-info">
                    @auth
                        <div style="font-size:18px">
                            <a href="{{ Route('like', ['id' => $post->id]) }}">
                                <img src="https://img.icons8.com/clouds/100/000000/facebook-like.png" />
                            </a>
                        </div>
                    @endauth
                    @guest
                        <div>
                            برای امکان لایک کردن مقالات، باید وارد شوید
                        </div>
                    @endguest
                </div>

                <div class="post-info">
                    <div class="post-by">تاریخ : {{ $post->created_at }}</div>
                    <div>
                        <a href="{{ route('selectPost', ['id' => $post->id]) }}" name="id" class="btn btn-primary">ادامه
                            مطلب</a>
                        <p>

                            دسته بندی :
                            <a
                                href="{{ route('categoryRoute', ['id' => $post->category->id]) }}">{{ $post->category->catName }}</a>
                        </p>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </article>
        @endforeach
        <!-- ARTICLE 1 -->


    </div><!-- POST-CONTAINER -->


@endsection
