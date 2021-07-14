<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>خبرگزاری نوین </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/img/favicon.png') }}" />
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/slippry.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <!-- GOOGLE FONTS -->
    <link
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
        rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Marck+Script&subset=cyrillic,latin-ext" rel="stylesheet">
</head>

<body>


    <!-- *****************************************************************
** Header ************************************************************
****************************************************************** -->

    <header>

        <!-- MENU DESKTOP -->
        <nav class="menu-desktop menu-sticky">
            <div class="masterpb-container">
                <ul class="masterpb-menu col-xs-12">
                    <li><a href="/" class="active">صفحه اصلی </a>

                    </li>
                    @foreach ($categories as $cat)
                        <li>
                            <a href="{{ route('categoryRoute', ['id' => $cat->id]) }}">{{ $cat->catName }} </a>

                        </li>
                    @endforeach

                    @auth
                        <li><a href="{{ route('logout') }}">خروج</a></li>

                        @if (Auth::user()->role == 'BaseAdmin')
                            <li>
                                <a href="{{ Route('BaseAdmin') }}">صفحه ادمین</a>
                            </li>
                            <li>
                                <a href="{{ Route('SendEmail') }}">ارسال ایمیل برای کاربران</a>
                            </li>

                        @elseif(Auth::user()->role == 'سر دبیر')
                            <li>
                                <a href="{{ Route('Editor.CheckPosts') }}">بررسی مقالات</a>
                            </li>
                            <li>
                                <a href="{{ Route('Editor.CategoryCreate') }}">دسته بندی ها (مدیریت)</a>
                            </li>
                        @elseif (str_starts_with(Auth::user()->role, "سر دبیر"))
                            <li>
                                <a href="{{ Route('EditorSpecial.CheckPosts') }}">بررسی مقالات</a>
                            </li>

                        @else
                            <li>
                                <a href="{{ Route('ArticleManagement') }}">پنل کاربری</a>
                            </li>
                        @endif

                    @endauth
                    @guest
                        <li><a href="{{ route('login') }}">لاگین</a></li>
                        <li><a href="{{ route('register') }}">ثبت نام</a></li>
                    @endguest

                    <li><a href="about-us.html">درباره ما</a></li>
                    <li><a href="contact.html">تماس با ما</a></li>
                </ul>


            </div><!-- masterpb-container -->
        </nav>


        <!-- MENU MOBILE -->




        <!-- LOGO & SEARCH  -->
        <div class="box-logo">

            <!-- LOGO -->
            <div class="masterpb-container">
                <div class="logo-container col-xs-6">
                    <a href="index.html"><img src="/img/nawennews-logodesign.jpg" height="220" alt="logo"
                            style="margin-right: 20%"></a>
                </div>

                {{-- <!-- SEARCH --> --}}
                <div class="masterpb-search col-xs-4" style="margin-right: 50px">
                    <form action="{{ Route('Search') }}" method="get">
                        <div class="form-group-search">
                            <input name="SearchName" type="جستجو کردن" class="search-field" style="width: 300px">
                            <button class="search-btn"><i class="icon-search4"></i></button>
                        </div>
                    </form>
                </div>

            </div> <!-- #masterpb-container -->
        </div> <!-- #box-logo -->

    </header><!-- #HEADER -->


    <!-- *****************************************************************
** Section ***********************************************************
****************************************************************** -->

    <section class="masterpb-container content-posts">

        <div class="col-xs-12" style="margin-bottom: 50px;">

            <h2>اخبار برگزیده</h2>
            @if (count($editorSelectedPost) == 0)
                <p>هیچ خبر برگزیده ای وجود ندارد</p>
            @endif
            <div class="row">
                @php
                    $i = 0;
                @endphp
                @foreach ($editorSelectedPost as $post)
                    @if ($i % 2 == 0)
                        <div class="col-xs-3" style="float: right;margin-left: 50px;">
                            <h4><a href="{{ route('selectPost', ['id' => $post->id]) }}">{{ $post->title }}</a>
                            </h4>
                            <img src="/img/post/{{ $post->picture }}" width="200" height="200" />
                        </div>
                    @endif

                    @if ($i % 2 == 1)
                        <div class="col-xs-3">
                            <h4><a href="{{ route('selectPost', ['id' => $post->id]) }}">{{ $post->title }}</a>
                            </h4>
                            <img src="/img/post/{{ $post->picture }}" width="200" height="200" />
                        </div>
                    @endif
                    @php
                        $i++;
                    @endphp
                @endforeach


            </div>

        </div>


        <div class="content page-sidebar-right col-xs-8">
            @yield('mainSection')

        </div>


        <!-- SIDEBAR -->
        <div class="sidebar col-xs-4">


            <!-- ABOUT ME -->
            <div class="widget about-me">
                <div class="ab-image">
                    <img src="/img/nawennews-logodesign.jpg" alt="about me">
                </div>
                <div class="ad-text">
                    <span class="signing">درباره ما </span>
                    <p>
                        خبرگزاری نوین جدید ترین خبر گزاری مرتبط با امور دانشجویان است.
                    </p>
                </div>
            </div>


            <!-- LATEST POSTS -->


            <div class="widget latest-posts">
                <h3>
                    <a class="widget-title" href="#">آخرین ارسال ها</a>
                </h3>
                <div class="posts-container">
                    @foreach ($last_posts as $post)
                        <div class="item">
                            <img src="/img/post/{{ $post->picture }}" alt="post 1" class="post-image"
                                style="height: 100px;width: 85px">
                            <div class="info-post">
                                <h5><a href="{{ route('selectPost', ['id' => $post->id]) }}"> {{ $post->title }}
                                    </a>
                                </h5>
                                <span class="date">{{ $post->created_at }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach



                    <div class="clearfix"></div>
                </div>
            </div>





            <!-- NEWSLETTER -->
            <div class="widget newsletter">
                <h3>
                    <a class="widget-title" href="#">عضویت در خبرنامه</a>
                </h3>
                <div class="newsletter-container">
                    <h4>خبرنامه سایت</h4>
                    <p>ثبت نام و دریافت <br>آخرین اخبار از شرکت ما</p>
                    <form action="{{ route('newsLetter') }}" method="post">
                        @csrf
                        <input name="email" type="email" class="newsletter-email" placeholder="Your email address...">
                        <button type="submit" class="newsletter-btn">Send</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>

        </div> <!-- #SIDEBAR -->

        <div class="clearfix"></div>


    </section>


    <!-- *****************************************************************
** Footer ************************************************************
****************************************************************** -->

    <footer>

        <!-- FOOTER TOP -->
        <div class="footer-top">
            <div class="masterpb-container">
                <div class="logo-footer">
                    <a href="index.html"><img src="img/nawennews-logodesign.jpg" alt="logo" height="100px"></a>
                </div>
                <div class="subtitle-logo">
                    <p class="color-text first">خبرگزاری نوین</p>
                </div>
                <div class="box-social">
                    <div class="conteiner-social">
                        <a href="#"><i class="icon-facebook5"></i></a>
                        <a href="#"><i class="icon-twitter4"></i></a>
                        <a href="#"><i class="icon-google-plus"></i></a>
                        <a href="#"><i class="icon-vimeo4"></i></a>
                        <a href="#"><i class="icon-linkedin2"></i></a>
                        <a href="#"><i class="icon-pinterest3"></i></a>

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>


        <!-- FOOTER BOTTOM -->
        <div class="footer-bottom">
            <div class="masterpb-container">
                <span class="copyright">کلیه حقوق مادی و معنوی برای مجموعه خبر نوین محفوظ می باشد . هر گونه کپی
                    برداری از محتوای آموزشی با ذکر منبع مجاز می باشد.<a href="#"></a> </span>
                <span class="backtotop">TOP <i class="icon-arrow-up7"></i></span>
            </div>
            <div class="clearfix"></div>
        </div>

        </div>

    </footer>


    <!-- *****************************************************************
** Script ************************************************************
****************************************************************** -->

    <script src=" {{ asset('/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('/js/slippry.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>

    @yield('scripts')
    <!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
</body>

</html>
