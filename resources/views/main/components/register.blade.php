<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/auth/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="assets/auth/images/img-01.png" alt="IMG">
                </div>
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        Admin Panel
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="name" id="name" placeholder="@lang('main.Name')" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="number" name="number" id="number" placeholder="@lang('main.phone')" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" id="email" placeholder="@lang('main.email')" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="password" name="password" id="password" placeholder="@lang('main.password')" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('main.repeat_password')" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="text" name="shop_name" id="shop_name" placeholder="@lang('main.shop_name')" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <!-- <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> -->

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="text-center p-t-136">
                        <a class="txt2" href="https://shopeasy.ge">
                            login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="assets/auth/js/main.js"></script>

</body>

</html>


<form method="POST" action="{{ route('register') }}" class="create-form register-form">
                            @csrf
                            <!-- <h1 class="heading">@lang('main.p_modal')</h1> -->
                            <div class="row">
                                <div class="form-group mt-2 col-6">
                                    <label for="exampleInputEmail1">@lang('main.Name')</label>
                                    <input class="form-control mt-1" type="text" name="name" id="name" :value="old('name')" required autofocus autocomplete="name">
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <label for="exampleInputEmail1">@lang('main.phone')</label>
                                    <input class="form-control mt-1" type="number" name="number" id="number" required>
                                </div>
                                <div class="form-group mt-2 col-12">
                                    <label for="exampleInputEmail1">@lang('main.email')</label>
                                    <input class="form-control mt-1" type="text" name="email" id="email" :value="old('email')" required type="email" required>
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <label for="exampleInputEmail1">@lang('main.password')</label>
                                    <input class="form-control mt-1" type="password" name="password" id="password" required autocomplete="new-password" required>
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <label for="exampleInputEmail1">@lang('main.repeat_password')</label>
                                    <input class="form-control mt-1" type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="form-group mt-2 col-12">
                                    <label for="exampleInputEmail1">@lang('main.shop_name')</label>
                                    <input class="form-control mt-1" type="text" name="shop_name" id="shop_name" required>
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <label for="exampleInputEmail1">@lang('main.captcha')</label>
                                    <input class="form-control mt-1" type="text" id="captcha" name="captcha" required>
                                </div>
                                <div class="form-group mt-2 col-6">
                                    <div class="captcha flex">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-second">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#fff" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="inputBox mt-3">
                                <input type="checkbox" id="vehicle3" class="mr-3" required name="terms">
                                <label for="vehicle3" class="agre">@lang('main.agree') <a target="_blank" href="/terms" class="terms">@lang('main.terms')</a></label><br>
                            </div>
                            <div class="center">
                                <button class="btn btn-main mt-4 m-auto" id="submitR_registration" type="button">@lang('main.create')

                            </div>