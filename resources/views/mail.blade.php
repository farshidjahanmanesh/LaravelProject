<html>
    <body style="text-align: center">
        <h1>سلام بر شما کاربر گرامی</h1>
        <div>
            <img style="width:100%;height:200px" src="{{ $message->embed(public_path() . '/img/khabarname.png') }}" alt="" />

            <p>
                {{
                    $body
                 }}
            </p>
            <p style="color:red">
                این پیغام بصورت اتوماتیک برای شما ارسال شده است. از ریپلای زدن به آن خودداری فرمایید
            </p>
        </div>
    </body>
</html>
