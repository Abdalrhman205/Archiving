<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2 ">
        <div class="container">
            <div class="login-box  ptb--100 h-100vh d-flex justify-content-center align-items-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-form-head text-center">
                        <h4 class="ps-5">تسجيل دخول </h4>
                    </div>

                    <div class="login-form-body">
                        <div class="form-gp"> 
                            <input placeholder="Email" name="email" :value="old('email')" required autofocus autocomplete="username" type="email" id="exampleInputEmail1">
                            <i class="ti-email"></i>
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-gp">
                            <input placeholder="Password" name="password" required autocomplete="current-password" type="password" id="exampleInputPassword1">
                            <i class="ti-lock"></i>
                            @if ($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input id="remember_me" type="checkbox" class="custom-control-input"
                                        id="customControlAutosizing">
                                    <label class="custom-control-label"
                                        for="customControlAutosizing">{{ __('Remember me') }} </label>
                                </div>
                            </div>
                            <div class="col-6 text-start">
                                @if (Route::has('password.request'))
                                    <a class="underline text-white"
                                        href="{{ route('password.request') }}">
                                        {{ __('?Forgot your password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">{{ __('Log in') }} </button>
                        </div>
                        <a href="{{ route('register') }}" class="pe-3 fs-5 text-white">انشاء حساب</a> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    @include('layout.scripts')
</body>

</html>
