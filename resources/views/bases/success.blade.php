@extends('layouts.layout')

@section('mainSection')
    <div>
        @if($email_valid)
            <h2>
                کاربر گرامی ، ثبت نام شما در بخش خبری سایت با موفقیت انجام شد
            </h2>
        @endif
        @if(!$email_valid)
                <h2>
                    کاربر گرامی، شما قبلا در سایت ثبت نام کرده اید
                </h2>
        @endif


    </div>
@endsection
