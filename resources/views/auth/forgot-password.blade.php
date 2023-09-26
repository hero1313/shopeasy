<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/auth/css/main.css">
</head>

<body>

    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100" style="width:max-content; margin:auto;padding:150px 120px;">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <span class="login100-form-title">
                        პაროლის აღდგენა
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" id="email" type="email" placeholder="იმეილი" name="email" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            გაგზავნა
                        </button>
                    </div>

                    @if (count($errors) > 0)
                    <div class="alert alert-danger alert-text">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert-text font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script src="assets/auth/js/main.js"></script>

</body>

</html>