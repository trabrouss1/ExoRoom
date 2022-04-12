<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        {!! Toastr::message() !!}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

{{-- <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Connexion</title>
    <link rel="stylesheet" href={{ asset("assets/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/plugins/fontawesome/css/fontawesome.min.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/plugins/fontawesome/css/all.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/feathericon.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/plugins/morris/morris.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/style.css") }}>
</head>

<body>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left"> <img class="img-fluid" src={{ asset("assets/img/logo.png") }} alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Connexion</h1>
                            <p class="account-subtitle">By TBA</p>
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email" autocomplete=""
                                        autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Se connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src={{ asset("assets/js/jquery-3.5.1.min.js") }}></script>
    <script src={{ asset("assets/js/popper.min.js") }}></script>
    <script src={{ asset("assets/js/bootstrap.min.js") }}></script>
    <script src={{ asset("assets/plugins/slimscroll/jquery.slimscroll.min.js") }}></script>
    <script src={{ asset("assets/js/script.js") }}></script>
    <div class="sidebar-overlay"></div>

</body>

</html> --}}
