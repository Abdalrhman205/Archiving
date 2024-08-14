<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- password reset area start -->
    <div class="password-reset-area  login-s2 ">
        <div class="container">
            <div class="password-reset-box login-box ptb--100 h-100vh d-flex justify-content-center align-items-center">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="login-form-head text-center">
                        <h4 class="">إعادة تعيين كلمة المرور</h4>
                        <p class="">نسيت كلمة المرور؟ لا مشكلة. فقط أخبرنا بعنوان بريدك الإلكتروني وسوف نرسل لك رابط إعادة تعيين كلمة المرور.</p>
                    </div>
                    <!-- Email Address -->
                    <div class="login-form-body">
                        <div class="form-gp">
                            <input placeholder="Email" name="email" :value="old('email')" required autofocus type="email" id="email">
                            <i class="ti-email"></i>
                            <div class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">{{ __('Email Password Reset Link') }}<i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- password reset area end -->
    @include('layout.scripts')
</body>

</html>
