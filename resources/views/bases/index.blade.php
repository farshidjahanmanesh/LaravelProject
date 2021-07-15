@extends('layouts.layout')

@section('mainSection')
    <div class="container-post">

        @foreach ($posts as $post)
            <article>
                <h2><a href="#">{{ $post->title }}</a></h2>
                <div class="post-image">
                    <img src="img/post/{{ $post->picture }}" alt="post image 3">
                </div>
                <div class="post-text">
                    <span class="date info">{{ $post->title }}</span>
                    <p>
                        {{ $post->text }}
                    </p>
                </div>

                <div class="post-info">
                    <p style="color: red">
                        تعداد لایک ها :
                        <span id="count">
                            {{ count($post->Likes) }}
                        </span>

                    </p>
                    @auth
                        <div style="font-size:18px">
                            <a onclick="like({{ $post->id }})" style="cursor: pointer">
                                <img src="https://img.icons8.com/clouds/100/000000/facebook-like.png"/>
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

    <!-- NAVIGATION -->
    <div class="navigation">
        @if ($pageNumber >= 1)
            <a href="{{ route('index', ['pageNumber' => $pageNumber - 1]) }}" class="prev"><i
                    class="icon-arrow-right8"></i>
                صفحه قبلی</a>
        @endif

        @if ($pageNumber < $pageCount - 1)
            <a href="{{ route('index', ['pageNumber' => $pageNumber + 1]) }}" class="next">صفحه بعدی <i
                    class="icon-arrow-left8"></i></a>
        @endif

        <div class="clearfix"></div>
    </div>
@endsection
