<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Master.PB - Personal Blog HTML Template</title>
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
        {{-- <div class="menu-responsive-container"> --}}
        {{-- <div class="open-menu-responsive">|||</div> --}}
        {{-- <div class="close-menu-responsive">|</div> --}}
        {{-- <div class="menu-responsive"> --}}
        {{-- <ul class="masterpb-menu"> --}}
        {{-- <li><a href="#" class="active">صفحه اصلی <i class="icon-arrow-down8"></i></a> --}}
        {{-- <ul class="submenu"> --}}
        {{-- <li><a href="home-1-column.html">صفحه اصلی یک ستونه</a></li> --}}
        {{-- <li><a href="index.html" class="active">صفحه اصلی یک ستونه + اسلایدر</a></li> --}}
        {{-- <li><a href="home-2-columns-with-sidebar.html">صفحه اصلی دو ستونه + اسلایدر</a></li> --}}
        {{-- <li><a href="home-2-columns.html">صفحه اصلی دو ستونه</a></li> --}}
        {{-- <li><a href="home-3-columns.html">صفحه اصلی سه ستونه</a></li> --}}
        {{-- </ul> --}}
        {{-- </li> --}}
        {{-- <li><a href="#">FEATURES <i class="icon-arrow-down8"></i></a> --}}
        {{-- <ul class="submenu"> --}}
        {{-- <li><a href="page.html">صفحه</a></li> --}}
        {{-- <li><a href="page-with-left-sidebar.html">صفحه + سایدبار راست</a></li> --}}
        {{-- <li><a href="page-with-right-sidebar.html">صفحه + ستون سمت چپ</a></li> --}}
        {{-- <li><a href="post.html">ارسال های کامل عریض</a></li> --}}
        {{-- <li><a href="post-with-left-sidebar.html">ارسال های + سایدبار راست</a></li> --}}
        {{-- <li><a href="post-with-right-sidebar.html">ارسال های + ستون سمت چپ</a></li> --}}
        {{-- <li><a href="no-sticky.html">منوی موضوع</a></li> --}}
        {{-- <li><a href="no-slider.html">اسلایدر</a></li> --}}
        {{-- <li><a href="#">زیرمنو <i class="icon-arrow-left8"></i></a> --}}
        {{-- <ul class="submenu"> --}}
        {{-- <li><a href="#">آیتم 1</a></li> --}}
        {{-- <li><a href="#">آیتم 2</a></li> --}}
        {{-- <li><a href="#">آیتم 3</a></li> --}}
        {{-- <li><a href="#">آیتم 4</a></li> --}}
        {{-- </ul> --}}
        {{-- </li> --}}
        {{-- </ul> --}}
        {{-- </li> --}}
        {{-- <li><a href="#">وبلاگ <i class="icon-arrow-down8"></i></a> --}}
        {{-- <ul class="submenu"> --}}
        {{-- <li><a href="blog-1-column.html">وبلاگ 1 ستون</a></li> --}}
        {{-- <li><a href="blog-1-column-with-sidebar.html">وبلاگ + نوار کناری</a></li> --}}
        {{-- <li><a href="blog-2-columns-with-sidebar.html">وبلاگ 2 ستون + سایدبار</a></li> --}}
        {{-- <li><a href="blog-2-columns.html">وبلاگ 2 ستون</a></li> --}}
        {{-- <li><a href="blog-3-columns.html">وبلاگ 3 ستون</a></li> --}}
        {{-- </ul> --}}
        {{-- </li> --}}
        {{-- <li><a href="about-us.html">درباره ما</a></li> --}}
        {{-- <li><a href="contact.html">تماس با ما</a></li> --}}
        {{-- </ul> --}}
        {{-- </div> --}}
        {{-- </div> <!-- # menu responsive container --> --}}



        <!-- LOGO & SEARCH  -->
        <div class="box-logo">

            <!-- LOGO -->
            <div class="masterpb-container">
                <div class="logo-container col-xs-8">
                    <a href="index.html"><img src="/img/logo.png" alt="logo"></a>
                </div>

                {{-- <!-- SEARCH --> --}}
                {{-- <div class="masterpb-search col-xs-4"> --}}
                {{-- <form> --}}
                {{-- <div class="form-group-search"> --}}
                {{-- <input type="جستجو کردن" class="search-field"> --}}
                {{-- <button type="ارسال" class="search-btn"><i class="icon-search4"></i></button> --}}
                {{-- </div> --}}
                {{-- </form> --}}
                {{-- </div> --}}

            </div> <!-- #masterpb-container -->
        </div> <!-- #box-logo -->

    </header><!-- #HEADER -->


    <!-- *****************************************************************
** Section ***********************************************************
****************************************************************** -->

    <section class="masterpb-container content-posts">

        <div class="col-xs-12" style="margin-bottom: 50px;">

            <h2>اخبار برگزیده</h2>
            @if (count($editorSelectedPost)==0)
                <p>هیچ خبر برگزیده ای وجود ندارد</p>
            @endif
            <div class="row">
                @php
                    $i = 0;
                @endphp
                @foreach ($editorSelectedPost as $post)
                    @if ($i % 2 == 0)
                        <div class="col-xs-3" style="float: right;margin-left: 50px;">
                            <h4><a href="{{ route('selectPost', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
                            <img src="/img/post/{{ $post->picture }}" width="200" height="200" />
                        </div>
                    @endif

                    @if ($i % 2 == 1)
                        <div class="col-xs-3">
                            <h4><a href="{{ route('selectPost', ['id' => $post->id]) }}">{{ $post->title }}</a></h4>
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
                    <img src="/img/all-img/about-me.jpg" alt="about me">
                </div>
                <div class="ad-text">
                    <span class="signing">تبلیغات موضوع </span>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
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




            <!-- ADVERTISING -->
            <div class="widget advertising">
                <div class="advertising-container">
                    <img src="img/350x300.png" alt="banner 350x300">
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
                    <a href="index.html"><img src="img/logo-footer.png" alt="logo"></a>
                </div>
                <div class="subtitle-logo">
                    <p class="color-text first">لورم ایپسوم متن</p>
                    <p class="black-text">لورم ایپسوم متن</p>
                    <p class="color-text">لورم ایپسوم متن</p>
                    <p class="black-text last">لورم ایپسوم متن</p>
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
                <span class="copyright">کلیه حقوق مادی و معنوی برای مجموعه برنامه نویسان محفوظ می باشد . هر گونه کپی
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
