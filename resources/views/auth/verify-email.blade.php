<!DOCTYPE html>
<html lang="en">
@include('layout.head')

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- email verification area start -->
    <div class="password-reset-area login-s2">
        <div class="container">
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
            <div class="password-reset-box login-box ptb--100 h-100vh d-flex justify-content-center align-items-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="login-form-head text-center">
                        <p class="">شكرًا لتسجيلك! قبل البدء، يرجى التحقق من عنوان بريدك الإلكتروني من خلال النقر
                            على الرابط الذي أرسلناه إليك. إذا لم تستلم البريد الإلكتروني، سنرسل لك رابطًا آخر بكل سرور.
                        </p>
                    </div>
                    <!-- Password -->
                    <div class="login-form-body">
                        <div class="submit-btn-area mt-4 flex justify-end">
                            <button id="form_submit" type="submit">{{ __('Resend Verification Email') }}</button>
                        </div>
                        <div class="logout mt-4 flex justify-end">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                    
                                <button type="submit" class="bg-danger text-white">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- email verification area end -->
    @include('layout.scripts')
</body>

</html>
