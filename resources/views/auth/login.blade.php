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
            <div class="login-box ptb--100 h-100vh d-flex justify-content-center align-items-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-form-head text-center">
                        <h4 class="ps-5">تسجيل دخول </h4>
                    </div>

                    <div class="login-form-body">
                        <div class="form-gp"> 
                            <input placeholder="Email" name="email" :value="old('email')" required autofocus autocomplete="username" type="email" id="exampleInputEmail1">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <input placeholder="Password" name="password" required autocomplete="current-password"  type="password" id="exampleInputPassword1">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
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
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('password.request') }}">
                                        {{ __('?Forgot your password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">{{ __('Log in') }} <i class="ti-arrow-right"></i></button>
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
