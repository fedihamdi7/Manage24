<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <link rel="icon" href="">
    <title>Manage24</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
    </header>
    <section class="user">
        <div class="user_options-container">
            <div class="user_options-text">
                <div class="user_options-unregistered">
                    <h2 class="user_unregistered-title">Don't have an account?</h2>
                    <p class="user_unregistered-text">Create an account.</p>
                    <button class="user_unregistered-signup" id="signup-button">Sign up</button>
                </div>

                <div class="user_options-registered">
                    <h2 class="user_registered-title">Have an account?</h2>
                    <p class="user_registered-text">Log in.</p>
                    <button class="user_registered-login" id="login-button">Login</button>
                </div>
            </div>

            <div class="user_options-forms" id="user_options-forms">
                <div class="user_forms-login">
                    <h2 class="forms_title">Login</h2>
                    <form class="forms_form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset class="forms_fieldset" >
                            <div class="forms_field">
                                <input type="email" placeholder="Email" class="forms_field-input" required autofocus />
                            </div>
                            <div class="forms_field">
                                <input type="password" placeholder="Password" class="forms_field-input" required />
                            </div>
                        </fieldset>
                        <div class="forms_buttons">
                            <button type="button" class="forms_buttons-forgot">Forgot password?</button>
                            <input type="submit" value="Log In" class="forms_buttons-action">
                        </div>
                    </form>
                </div>
                <div class="user_forms-signup">
                    <h2 class="forms_title">Sign Up</h2>
                    <form class="forms_form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="forms_fieldset">
                            <div class="forms_field">
                                <input type="text" placeholder="Full Name" class="forms_field-input" name="name" required />
                            </div>
                            <div class="forms_field">
                                <input type="email" placeholder="Email" class="forms_field-input" name="email" required />
                            </div>
                            <div class="forms_field">
                                <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
                            </div>
                        </fieldset>
                        <div class="forms_buttons">
                            {{-- <input type="submit" value="Sign up" class="forms_buttons-action"> --}}
                            <button type="submit" class="forms_buttons-action">
                                {{ ('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/welcome.js') }}" defer></script>
</body>

</html>
