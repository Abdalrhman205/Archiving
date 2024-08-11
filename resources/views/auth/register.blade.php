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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-form-head text-center">
                        <h4 class="ps-5"> انشاء حساب </h4>
                    </div>

                    <div class="login-form-body">
                        <div class="form-gp">
                            <input placeholder="Full name" id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
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
                        <div class="form-gp">
                            <input placeholder="Confirm Password" id="password_confirmation" class="block mt-1 w-full"
                            type="password" name="password_confirmation" required autocomplete="new-password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            
                            <div class="col-6 text-start">
                                <a class="underline text-white" href="{{ route('login') }}">
                                    {{ __('?Already registered') }}
                                </a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">{{ __('Register') }}<i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    @include('layout.scripts')
</body>

</html>
