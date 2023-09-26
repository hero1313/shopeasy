<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/auth/css/main.css">
</head>

<body>

    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100" style="width:max-content;max-width:700px; margin:auto;padding:150px 50px;">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <span class="login100-form-title">
                        გაიარეთ ვერიფიკაცია
                    </span>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            ვერიფიკაციის შეტყობინების გაგზავნა
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

                    <div class="mb-4 text-sm text-gray-600 alert-text">
                        {{ __('სანამ განმეორებით გააგზავნით შეტყობინებას გთხოვთ გადაამოწმოთ ელ-ფოსტა და გადახვიდეთ გამოგზავნილ სავერიფიკაციო ბმულზე') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 alert-text">
                        {{ __('ვერიფიკაციის ბმული გაიგზავნა თქვენს პროფილის პარამეტრებში თქვენს მიერ განსაზღვრულ ელ.ფოსტის მისამართზე. თუ თქვენ არ ფლობთ შესაბამის ელ-ფოსტას გთხოვთ დაუკავშირდეთ ადმინისტრაციას') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script src="assets/auth/js/main.js"></script>

</body>

</html>
