<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- password confirmation area start -->
    <div class="password-reset-area login-s2">
        <div class="container">
            <div class="password-reset-box login-box ptb--100 h-100vh d-flex justify-content-center align-items-center">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="login-form-head text-center">
                        <h4 class="">تأكيد كلمة المرور</h4>
                        <p class="">هذه منطقة آمنة في التطبيق. يرجى تأكيد كلمة المرور قبل المتابعة.</p>
                    </div>
                    <!-- Password -->
                    <div class="login-form-body">
                        <div class="form-gp">
                            <input placeholder="Password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password">
                            <i class="ti-lock"></i>
                            <div class="text-danger mt-2">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="submit-btn-area mt-4 flex justify-end">
                            <button id="form_submit" type="submit">{{ __('Confirm') }}<i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- password confirmation area end -->
    @include('layout.scripts')
</body>

</html>
