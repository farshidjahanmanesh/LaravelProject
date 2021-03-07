@extends('layouts.layout')

@section('mainSection')

    <div class="content post-with-left-sidebar col-xs-12">

        <div class="container-post">

            <!-- ARTICLE 1 -->
            <article>
                <h2><a href="#">{{$post->title}}</a></h2>
                <div class="post-image">
                    <img src="{{asset('img/post/'.$post->picture)}}" alt="post image 1">
                </div>
                <div class="box-data-info">
                    <span class="date info">{{$post->title}}</span>
                </div>
                <div class="post-text">
                    <p class="text">{{$post->text}}</p>

                    <p>نویسنده : {{$user->name}}</p>
                    <p>تاریخ انتشار : {{$post->created_at}}</p>
                    <div class="social-post">
                        <a href="#"><i class="icon-facebook5"></i></a>
                        <a href="#"><i class="icon-twitter4"></i></a>
                        <a href="#"><i class="icon-google-plus"></i></a>
                        <a href="#"><i class="icon-vimeo4"></i></a>
                        <a href="#"><i class="icon-linkedin2"></i></a>
                    </div>

                </div>

            </article>


            <!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->

            <!-- COMMENTS -->
            <div class="comments">
                <h2>{{count($comments)}} دیدگاه</h2>
                @foreach($comments as $comment)
                    <div class="comments-list">
                        <div class="main-comment">
                            <div class="comment-image-author">
                                <img src="{{asset('/img/all-img/img-profile-1.jpg')}}">
                            </div>
                            <div class="comment-info">
                                <div class="comment-name-date"><span
                                        class="comment-name">{{$comment->name}} </span><span
                                        class="comment-date">{{$comment->created_at}}</span>
                                    <div class="clearfix"></div>
                                </div>
                                <span class="comment-description">
                                    {{$comment->text}}
                                    <i class="icon-arrow-right2"></i></span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach


            </div>


            <!-- COMMENT FORM -->
            <div class="comment-form">
                <h2>لورم ایپسوم متن ساختگی</h2>
                <span class="field-name">نام شما (ضروری)</span>
                <input id="name" type="text" class="name" required>
                <span class="field-name">ایمیل شما (ضروری)</span>
                <input id="email" type="email" class="email" required>
                <span class="field-name">پیام شما</span>
                <textarea id="text" class="message" required></textarea>
                <span id="messageError" style="color: red;display: block"></span>
                <button type="button" onclick="getMessage()">ارسال نظر</button>

            </div>


        </div><!-- POST-CONTAINER -->


    </div>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }
        function getMessage() {
            if(isEmptyOrSpaces($('#name').val())||
                isEmptyOrSpaces($('#email').val())||
                isEmptyOrSpaces($('#text').val())){
                $('#messageError').html("لطفا تمامی فیلد ها را پر کنید");
                return;
            }
            var formData = {
                name: $('#name').val(),
                email : $('#email').val(),
                text : $('#text').val(),
                postId : {{$post->id}}
            };


            $.ajax({
                type: 'get',
                url: '/setComments',
                data: formData,
                success: function (data) {
                }
            });
        }
    </script>
@endsection
