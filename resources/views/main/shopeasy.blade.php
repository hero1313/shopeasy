<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopeasy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="landing/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../landing/image/sec-logo.png">

</head>
<!-- Messenger საუბრის დანამატი Code -->
<div id="fb-root"></div>

<!-- Your საუბრის დანამატი code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "114254864944003");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v16.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<body>
    <section class="landing home">
        <div class="landing-first">
            <header>
                <div class="container-main flex">
                    <div class="burger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    <img src="landing/image/logo.png" alt="" class="logo first-logo" />
                    <img src="landing/image/sec-logo.png" alt="" class="logo second-logo" />
                    <nav>
                        <ul class="flex">
                            <li>
                                <div id="home">მთავარი</div>
                            </li>
                            <li>
                                <div id="features">შესაძლებლობები</div>

                            </li>
                            <li>
                                <div id="about">ჩვენ შესახებ</div>

                            </li>
                            <!-- <li>
                                <div id="pricing">ღირებულება</div>

                            </li> -->
                            <li>
                                <div id="contact">კონტაქტი</div>

                            </li>
                        </ul>
                    </nav>
                    <div class="header-button flex">
                        <a href="/admin"><button class="btn btn-main login-button mr-3">შესვლა</button></a>
                        <div class="space"></div>
                        {{-- <div class="dropdown">
                            <button class="btn btn-main " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                eng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Geo</a>
                                <a class="dropdown-item" href="#">Eng</a>
                                <a class="dropdown-item" href="#">Rus</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </header>
            <h2>შექმენით მარტივი ონლაინ მაღაზია</h2>
            <div class="center">
                <a href="/register"><button class="btn btn-main" data-toggle="modal" data-target="#createmodal">შექმნა</button></a>
            </div>
        </div>
        <div class="center screen">
            <img class="pc screen-pc" src="landing/image/screen-pc.PNG" alt="" />
            <img class="pc screen-mobile" src="landing/image/screen-mobile.PNG" alt="" />
        </div>
    </section>
    {{-- <section class="container-main flex partners">
        <h3 class="partners-p">ჩვენთან შექმნილი მაღაზიები:</h3>
        <div class="flex partners-img">
            <a href=""> <img src="landing/image/tbc.png" alt="" /></a>
            <a href=""> <img src="landing/image/tbc.png" alt="" /></a>
            <a href=""> <img src="landing/image/tbc.png" alt="" /></a>
            <a href=""> <img src="landing/image/tbc.png" alt="" /></a>
        </div>
    </section> --}}
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section class="container-main users">
        <div class="users-div row">
            <div class="col-12 col-lg-7">
                <h3>100-ზე მეტი ბიზნესი იყენებს Shopeasy-ს</h3>
                <h5>
                    დააგენერირეთ ვებსაიტი, გაზარდეთ შემოსავალი, გამოიყენეთ ფუნქციონალი, რომელიც დაგეხმარებათ უფრო
                    სწრაფად განვითარებაში.
                </h5>
            </div>
            <div class="col-12 col-lg-5 flex row">
                <div class="feedback col-6">
                    <h1>4.8</h1>
                    <div class="flex stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                    15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                    6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                    0l2.184 4.327
                                    4.898.696c.441.062.612.636.282.95l-3.522
                                    3.356.83 4.73c.078.443-.36.79-.746.592L8
                                    13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                        15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                        6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                        0l2.184 4.327
                                        4.898.696c.441.062.612.636.282.95l-3.522
                                        3.356.83 4.73c.078.443-.36.79-.746.592L8
                                        13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                            15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                            6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                            0l2.184 4.327
                                            4.898.696c.441.062.612.636.282.95l-3.522
                                            3.356.83
                                            4.73c.078.443-.36.79-.746.592L8
                                            13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                                15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                                6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                                0l2.184 4.327
                                                4.898.696c.441.062.612.636.282.95l-3.522
                                                3.356.83
                                                4.73c.078.443-.36.79-.746.592L8
                                                13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                                    15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                                    6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                                    0l2.184 4.327
                                                    4.898.696c.441.062.612.636.282.95l-3.522
                                                    3.356.83
                                                    4.73c.078.443-.36.79-.746.592L8
                                                    13.187l-4.389 2.256z" />
                        </svg>
                    </div>
                    <h6>ხარისხი</h6>
                </div>
                <div class="feedback col-6">
                    <h1>4.9</h1>
                    <div class="flex stars">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                                        15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                                        6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                                        0l2.184 4.327
                                                        4.898.696c.441.062.612.636.282.95l-3.522
                                                        3.356.83
                                                        4.73c.078.443-.36.79-.746.592L8
                                                        13.187l-4.389 2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                                            15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                                            6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                                            0l2.184 4.327
                                                            4.898.696c.441.062.612.636.282.95l-3.522
                                                            3.356.83
                                                            4.73c.078.443-.36.79-.746.592L8
                                                            13.187l-4.389
                                                            2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612
                                                                15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                                                6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                                                0l2.184 4.327
                                                                4.898.696c.441.062.612.636.282.95l-3.522
                                                                3.356.83
                                                                4.73c.078.443-.36.79-.746.592L8
                                                                13.187l-4.389
                                                                2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16
                                                                16">
                            <path d="M3.612
                                                                    15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                                                    6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                                                    0l2.184
                                                                    4.327
                                                                    4.898.696c.441.062.612.636.282.95l-3.522
                                                                    3.356.83
                                                                    4.73c.078.443-.36.79-.746.592L8
                                                                    13.187l-4.389
                                                                    2.256z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0
                                                                    16 16">
                            <path d="M3.612
                                                                        15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173
                                                                        6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927
                                                                        0l2.184
                                                                        4.327
                                                                        4.898.696c.441.062.612.636.282.95l-3.522
                                                                        3.356.83
                                                                        4.73c.078.443-.36.79-.746.592L8
                                                                        13.187l-4.389
                                                                        2.256z" />
                        </svg>
                    </div>
                    <h6>სისწრაფე</h6>
                </div>
            </div>
        </div>
    </section>
    <section class="who-section">
        <div class="who-txt center">
            <h2>დარეგისტრირებული მაღაზიები</h2>
            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
            <swiper-container class="px-5" slides-per-view="4" css-mode="true" loop="true">
                <swiper-slide>
                    <a href="https://anyshop.shopeasy.ge/">
                        <div class="last-shop">
                            <img src="https://anyshop.shopeasy.ge/image/1695367768.png">
                            <h5 class="mt-3">AnyShop</h5>
                        </div>
                    </a>
                </swiper-slide>
                <swiper-slide>
                <a href="https://anyshop.shopeasy.ge/">
                        <div class="last-shop">
                            <img src="https://technohouse.shopeasy.ge/image/1695370916.jpg">
                            <h5 class="mt-3">techno house</h5>
                        </div>
                    </a>
                </swiper-slide>
            </swiper-container>
            <div class="center">
                <button class="btn btn-main">დაიწყე ახლა</button>
            </div>
        </div>
    </section>
    <section class="container-main features">
        <div class="row features-item">
            <div class="col-12 col-lg-6">
                <img src="landing/image/payment.jpg" alt="" />
            </div>
            <div class="col-12 col-lg-6 fatures-txt">
                <div class="feature-title flex">
                    <div class="line"></div>
                    <h5>ონლაინ გადახდები</h5>
                </div>
                <h2>ონლაინ გადახდის მეთოდების ფართო არჩევანი</h2>
                <h6>
                    Shopeasy გთავაზობთ ონლაინ გადახდების არჩევანს, როგორიცაა: payze, stripe. აღსანიშნავია, რომ ფუნქციის
                    გააქტიურება შესაძლებელია payze-ის მეშვეობით ყოველგვარი api-ს გარეშე iban-ის (ანგარიშის ნომრის)
                    საშუალებით. </h6>
                <a href="/register"><button class="btn btn-second" data-toggle="modal" data-target="#createmodal">რეგისტრაცია</button></a>
            </div>
        </div>
        <div class="row features-item feat-revers">
            <div class="col-12 order-md-1 col-lg-6 ">
                <img src="landing/image/delivery.jpg" alt="" />
            </div>
            <div class="col-12 col-lg-6 order-md-12 fatures-txt">
                <div class="feature-title flex">
                    <div class="line"></div>
                    <h5>მიტანის სერვისი</h5>
                </div>
                <h2>სრულყოფილი მიწოდების სერვისი</h2>
                <h6>
                    ჩვენი მეგობარი კომპანია Deliveron დაგეხმარებათ პროდუქტის მიწოდებაში. თქვენ შეგიძლიათ აირჩიოთ
                    სასურველი კურიერი, მათ შორის glovo, wolt და თვალყური ადევნოთ მიწოდების პროცესს ლაივ რეჟიმში. </h6>
                <a href="/admin">
                    <button class="btn btn-second" data-toggle="modal" data-target="#createmodal">შესვლა</button>
                </a>
            </div>
        </div>

        <div class="row features-item">
            <div class="col-12 col-lg-6">
                <img src="landing/image/managment.jpg" alt="" />
            </div>
            <div class="col-12 col-lg-6 fatures-txt">
                <div class="feature-title flex">
                    <div class="line"></div>
                    <h5>შეკვეთის მართვა</h5>
                </div>
                <h2>აკონტროლეთ შეკვეთები მარტივად ჩვენი დახმარებით</h2>
                <h6>
                    მართეთ შეკვეთები მარტივად shopeasy-ით. თვალყური ადევნეთ ფინანსურ მოგებას და მომხმარებელთა
                    ურთიერთქმედებას ვებსაიტზე.
                </h6>
                <a href="/register"><button class="btn btn-second" data-toggle="modal" data-target="#createmodal">მაღაზიის შექმნა</button></a>
            </div>
        </div>
    </section>
    <section class="container-main flex partners">
        <h3 class="partners-p">პარტნიორები:</h3>
        <div class="flex partners-img">
            <img src="landing/image/tbc.png" alt="" />
            <img src="landing/image/payze.png" alt="" />
            <img src="landing/image/stripe.png" alt="" />
            <img src="landing/image/glovo.png" alt="" />
            <!-- <img src="landing/image/gita.png" alt="" /> -->
        </div>
    </section>

    <section class="who-section mb-0 contact">
        <div class="who-txt center">
            <h2>კონტაქტი</h2>
            <h6>+995 599 53 93 00</h6>
            <h6>shopeasy.compliance@gmail.com</h6>
            <div class="flex soc-icons">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="mr-2 bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                </a>
                <div class="space"></div>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="ml-2 bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </a>
            </div>

        </div>
        <div class="who-img">
            <img class="first" src="landing/image/who-first.png" alt="" />
            <img class="second" src="landing/image/who-seccond.png" alt="" />
        </div>
    </section>

    <!-- <footer>
        <section class="container-main">
            <div class="contact">
                <div class="row">
                    <a class="col-12 col-md-3" href="">
                        @lang('main.terms_condition')
                    </a>
                    <a class="col-12 col-md-3" href="">
                        @lang('main.return_policy')
                    </a>
                    <a class="col-12 col-md-3" href="">
                        @lang('main.privacy_policy')
                    </a>
                    <a class="col-12 col-md-3" href="">
                        @lang('main.delivery_policy')
                    </a>
                </div>
            </div>
        </section>
    </footer> -->

    <div class="navigation-cover">
        <div class="navigation p-3">
            <div class="x-navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg>
            </div>
            <ul>
                <li>მთავარი</li>
                <li>შესაძლებლობები</li>
                <li>ჩვენ შესახებ</li>
                <!-- <li>ღირებულება</li> -->
                <li>კონტაქტი</li>
            </ul>
            <div class="nav-log">
                <a href="/admin"> <button class="btn btn-main">შესვლა</button>
                </a>
                <button class="btn btn-second" data-toggle="modal" data-target="#createmodal">მაღაზიის
                    გენერირება</button>
            </div>
        </div>
        <div class="cover">
        </div>
    </div>

    <!-- Modal -->
    <!-- <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body create">
                    <div class="contact m-0 p-0" style="border: none; box-shadow:none;">
                        <div class="center mb-4">
                            <img src="landing/image/logo.png" alt="" class="logo first-logo" />
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="create-form register-form">
                            @csrf
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
                    </div>

                    </form>

                    </section>
                </div>
            </div>
        </div>
    </div> -->
    <div class="loader">
        <div class="loader-cover"> </div>
        <div class="loader-line"></div>
    </div>

    <script>
        // swiper element
        const swiperEl = document.querySelector('swiper-container');

        // swiper parameters
        const swiperParams = {
            slidesPerView: 1,
            breakpoints: {
                340: {
                    slidesPerView: 1,
                },
                440: {
                    slidesPerView: 2,
                },
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 5,
                },
            },
            on: {
                init() {
                    // ...
                },
            },
        };

        // now we need to assign all parameters to Swiper element
        Object.assign(swiperEl, swiperParams);

        // and now initialize it
        swiperEl.initialize();
    </script>

    <script>
        $('.btn-refresh').click(function() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/refresh_captcha') }}",
                success: function(data) {
                    $('.captcha span').html(data);
                }
            })
        })

        $('#submitR_registration').click(function() {
            $('.loader').delay("fast").css('display', 'block')
            $('.register-form').delay(4000).submit();
        })


        $(".burger").click(function() {
            $(".navigation-cover").fadeToggle(500);
        });
        $(".cover").click(function() {
            $(".navigation-cover").fadeToggle(500);
        });
        $(".x-navigation").click(function() {
            $(".navigation-cover").fadeToggle(500);
        });

        function yourFunction() {
            // do whatever you like here
            $(".screen-pc").toggle();
            $(".screen-mobile").toggle();

            setTimeout(yourFunction, 5000);
        }

        if ($(window).width() < 1200) {} else {
            yourFunction();
        }

        $("#home").click(function() {
            $('html, body').animate({
                scrollTop: $(".home").offset().top
            }, 300);
        });
        $("#features").click(function() {
            $('html, body').animate({
                scrollTop: $(".features").offset().top
            }, 300);
        });
        $("#about").click(function() {
            $('html, body').animate({
                scrollTop: $(".about").offset().top
            }, 300);
        });
        $("#pricing").click(function() {
            $('html, body').animate({
                scrollTop: $(".pricing").offset().top
            }, 300);
        });
        $("#contact").click(function() {
            $('html, body').animate({
                scrollTop: $(".contact").offset().top
            }, 300);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

<style>
    .last-shop {
        height: 220px;
        border-radius: 20px;
        padding: 50px;
        background-color: #fff;
        cursor: pointer;
        box-shadow: 5px 5px 5px 0px rgba(227, 227, 227, 0.72);
        text-align: center;
    }

    swiper-slide {
        padding: 20px;
    }
    .last-shop img{
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>

</html>