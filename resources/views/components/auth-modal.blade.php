<div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content-wrapper">

            <!-- 🔹 LOGIN PANEL -->
            <div class="modal-content modal-login">
                <div class="modal-body text-center">
                    <h2 class="modal-title">@lang('services.auth-modal-welcome-login')</h2>

                    <!-- Formular de autentificare -->
                    <form method="POST" action="/login" class="login-form">
                        @csrf
                        <!-- Input pentru email -->
                        <div class="mb-3">
                            <input type="email" class="form-control custom-input" name="email" placeholder="Email" required>
                        </div>

                        <!-- Input pentru parolă -->
                        <div class="mb-3">
                            <input type="password" class="form-control custom-input" name="password" placeholder="@lang('services.auth-modal-password')" required>
                        </div>

                        <!-- Butonul de autentificare -->
                        <button type="submit" class="btn btn-gold w-100">@lang('services.auth-modal-login')</button>

                        <!-- Link pentru recuperarea parolei -->
                        <div class="my-3">
                            <a href="#" class="text-muted small">@lang('services.auth-modal-forgot-password')</a>
                        </div>

                        <!-- Butonul pentru autentificare cu Google -->
                        <button type="button" class="btn btn-light w-100 btn-google">
                            <i class="fab fa-google"></i>@lang('services.auth-modal-login-with-google')
                        </button>
                    </form>

                    <!-- Link pentru înregistrare -->
                    <p class="mt-4">@lang('services.auth-modal-no-account') <a href="#" class="flip-btn text-gold" data-target="register">@lang('services.auth-modal-register')</a></p>
                </div>
            </div>


            <!-- 🔹 REGISTER PANEL -->
            <div class="modal-content modal-register">
                <div class="modal-body text-center">
                    <h2 class="modal-title">@lang('services.auth-modal-create-account') 💎</h2>
                    <form method="POST" action="/register" >
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control custom-input" name="username" placeholder="@lang('services.auth-modal-name')">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control custom-input" name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control custom-input" name="password" placeholder="@lang('services.auth-modal-password')">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control custom-input" name="password_confirmation" placeholder="@lang('services.auth-modal-password-confirmation')">
                        </div>
                        <button type="submit" class="btn btn-gold w-100">@lang('services.auth-modal-register')</button>
                    </form>
                    <p class="mt-4">@lang('services.auth-modal-have-account') <a href="#" class="flip-btn text-gold" data-target="login">@lang('services.auth-modal-login')</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
