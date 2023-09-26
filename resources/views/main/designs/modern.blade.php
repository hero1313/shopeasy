<head>
    @if($company->analytics && $company->analytics_script)
    {!! $company->analytics_script !!}
    @endif
    <link rel="stylesheet" href="assets/shop-css/modern.css">
</head>
<header class="d-flex">
    <div class="burger">
        <div class="line-full"></div>
        <div class="line-half"></div>
    </div>
    @if($company->image != 'logo.png')
    <div class="logo">
        <img src="/image/{{$company->image}}">
    </div>
    @else
    <div class="logo">
        <img src="https://seeklogo.com/images/L/logo-com-hr-logo-5636A4D2D5-seeklogo.com.png">
    </div>
    @endif
    <div class="cart-div" data-toggle="modal" data-target="#cartModal">
        <div class="carts">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-bag" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
            </svg>
        </div>
        <div class="cart-length">
            0
        </div>
    </div>
</header>
<div class="navigation">
    <div class="nav">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x-lg close-nav" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
        <div class="politics">
            <a href="/terms-condition">
                <div>@lang('main.terms_condition')</div>
            </a>
            <a href="/return-policy">
                <div>@lang('main.return_policy')</div>
            </a>
            <a href="/confidence-policy">
                <div>@lang('main.confidence_policy')</div>
            </a>
            <a href="/terms-delivery">
                <div>@lang('main.delivery_policy')</div>
            </a>
        </div>
        <div class="social-icons">
            @if($company->instagram)
            <a href="{{ $company->instagram }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
            </a>
            @endif
            @if($company->facebook)
            <a href="{{ $company->facebook }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
            </a>
            @endif
            @if($company->number)
            <a href="tel:{{ $company->number }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
            </a>
            @endif
            @if($company->email)
            <a href="mailto: {{ $company->email }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#fff" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg>
            </a>
            @endif
        </div>
    </div>
    <div class="cover"></div>
</div>
<form id='main_form' method="post">
    @csrf
    <div class="shop-main-page">
        <!--wellcome section -->
        <section class="section-brand">
            @if($company->slide != 'slider.png')
            <img src="/image/{{$company->slide}}">
            @else
                <img src="https://img.freepik.com/free-vector/online-shopping-store-with-mobile-shopping-cart-mail-clouds-realistic-style-vector-illustration_548887-136.jpg?w=1380&t=st=1687809472~exp=1687810072~hmac=35f9950282cfcb85002fd3f8077d64501fbcd71e0a1894b597ba8f7319f35353">
            @endif
            <h1 class="hedline">
                {{$company->headline}}
            </h1>
            {{-- <h6 class="shop-description">
                {{$company->description}}
            </h6> --}}
            <div class="buttons d-flex mt-5">
                <div class="btn btn-main btn-start">
                    @lang('public._order_now') <span class="btn-arrow"> > </span>
                </div>
            </div>
        </section>
        <!-- product section -->
        <section class='product-section p-5'>
            <div class="d-flex search">
                <button class="btn btn-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
                <p class='results'>
                    {{$products->count()}} @lang('public._product')
                </p>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-12 col-md-4 col-lg-3 mt-4 product-col" data-toggle="modal" data-target="#modal_{{$product->id}}">
                    <div class="d-flex products-item">
                        <img src="products-image/{{$product->image}}">
                        <div>
                            <h4>{{$product->name}}</h4>
                            <h6>{{$product->price}} ₾</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- info section -->
        <section class='info-section info-main'>
            <div class="order-info center">
                <h2>
                    შეკვეთის დეტალები
                </h2>
                <div class="form-group ">
                    <input type="text" name='name' placeholder=" @lang('public._what_name') " id="name"  class="form-control">
                </div>
                <div class="form-group ">
                    <input placeholder=" @lang('public._what_email') " type="text" name='email' id="email"  class="form-control">
                </div>
                <div class="form-group ">
                    <input placeholder=" @lang('public._what_number') " type="text" name='number' id="number"  class="form-control">
                </div>
                <div class="center">
                    <button type='button' class='btn btn-main next-btn info-btn mt-5'>@lang('public._next')</button>
                </div>
            </div>
        </section>
        <!-- additional info -->
        @if($company->promo || $company->tip || $company->additional_info)
        <section class='info-section additional-section info-add'>
            <div class="order-info center">
                <h2>
                    დამატებითი ინფორმაცია
                </h2>
                @if($company->tip)
                <div class="form-group ">
                    <input type="number" placeholder="@lang('public._much_tip')" name='tip' class="form-control">
                </div>
                @endif
                @if($company->additional_info)
                <div class="form-group ">
                    <input type="text" placeholder="@lang('public._add_info')" name='additional_info' class="form-control">
                </div>
                @endif
                @if($company->promo && $company->promo_code && $company->promo_percentage)
                <div class="form-group  d-flex">
                    <input type="text" placeholder="@lang('public._promo')" name='promo_code' class="form-control">
                    <div class="activate-div">
                        <button type="button" id="discount" class="btn btn-seccond btn-activ">@lang('public._active')</button>
                    </div>
                </div>
                @endif
                <div class="center">
                    <button type='button' class='btn btn-seccond aditional-next next-btn mt-5'>@lang('public._next')</button>
                </div>
            </div>
        </section>
        @endif
        @if($company->delivery_date)
        <section class='delivery-date delivery-section d-block'>
            <div class="delivery-method-div">
                <h2>@lang('public._day') </h2>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <input type="radio" class="date-radio" id="today" name="delivery_date" value="{{$today->format('d-m-Y')}}">
                            <label class="day-label" for="today">
                                <h5>{{$today->format('l')}}</h4>
                                    <h6>{{$today->format('d-m')}}
                                </h5>
                            </label>
                        </div>
                        <div class="col-6 col-sm">
                            <input type="radio" class="date-radio" id="day_2" name="delivery_date" value="{{$day_2->format('d-m-Y')}}">
                            <label class="day-label" for="day_2">
                                <h5>{{$day_2->format('l')}}</h4>
                                    <h6>{{$day_2->format('d-m')}}
                                </h5>
                            </label>
                        </div>
                        <div class="col-6 col-sm">
                            <input type="radio" class="date-radio" id="day_3" name="delivery_date" value="{{$day_3->format('d-m-Y')}}">
                            <label class="day-label" for="day_3">
                                <h5>{{$day_3->format('l')}}</h4>
                                    <h6>{{$day_3->format('d-m')}}
                                </h5>
                            </label>
                        </div>
                        <div class="col-6 col-sm">
                            <input type="radio" class="date-radio" id="day_4" name="delivery_date" value="{{$day_4->format('d-m-Y')}}">
                            <label class="day-label" for="day_4">
                                <h5>{{$day_4->format('l')}}</h4>
                                    <h6>{{$day_4->format('d-m')}}
                                </h5>
                            </label>
                        </div>
                        <div class="col-6 col-sm">
                            <input type="radio" class="date-radio" id="day_5" name="delivery_date" value="{{$day_5->format('d-m-Y')}}">
                            <label class="day-label" for="day_5">
                                <h5>{{$day_5->format('l')}}</h4>
                                    <h6>{{$day_5->format('d-m')}}
                                </h5>
                            </label>
                        </div>
                        <div class="col-6 col-sm">
                            <input type="radio" class="date-radio" id="day_6" name="delivery_date" value="{{$day_6->format('d-m-Y')}}">
                            <label class="day-label" for="day_6">
                                <h5>{{$day_6->format('l')}}</h4>
                                    <h6>{{$day_6->format('d-m')}}
                                </h5>
                            </label>
                        </div>
                        <div class="col-12 col-sm">
                            <input type="radio" class="date-radio" id="day_7" name="delivery_date" value="{{$day_7->format('d-m-Y')}}">
                            <label class="day-label" for="day_7">
                                <h5>{{$day_7->format('l')}}</h4>
                                    <h6>{{$day_7->format('d-m')}}
                                </h5>
                            </label>
                        </div>

                    </div>
                </div>
                <br>
            </div>
        </section>
        @endif
        <section class='delivery-section delivery-method-section p-5 '>
            <div class="container">
                <h2 class="center">
                    @lang('public._receiving_method')
                </h2>
                <div class="row">
                    <div class="col-12 col-md-6 ">
                        <input class="form-check-input opacity-0 delivery-method-input" type="radio" name="delivery_method" id="delivery">
                        <div class="delivery-method">
                            <label for="delivery" class="delivery-label">
                                <div class="d-flex products-item deliv ">
                                    <img src="https://i.pinimg.com/736x/a7/5e/2f/a75e2f85004206915e5430120f9a65d2.jpg">
                                    <div>
                                        <h4>@lang('public._delivery')</h4>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-check-input opacity-0 delivery-method-input" type="radio" name="delivery_method" id="pickup">
                        <div class="delivery-method">
                            <label for="pickup" class="delivery-label deliv">
                                <div class="d-flex products-item ">
                                    <img src="https://t4.ftcdn.net/jpg/03/38/09/99/360_F_338099978_AI1TZ520242U90ucQDuBs9ZUUFW0GIHH.jpg">
                                    <div>
                                        <h4>@lang('public._pickup')</h4>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class='delivery-section payments p-5 '>
            <div class="container caro">
                <h2 class="center">
                    Chose Payment method
                </h2>
                <div class="row">
                @if($company->tbc == 1 && $company->tbc_secret && $company->tbc_key)
                    <div class="col ">
                        <input class="form-check-input opacity-0" type="radio" name="delivery_method">
                        <div class="delivery-method">
                            <button type='button' id='tbc' class='btn'>
                                <div class="d-flex products-item left">
                                    <img src="image/tbc.png">
                                    <div>
                                        <h4>Tbc Payment</h4>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                @endif

                @if($company->payze_iban && $company->payze == 2)
                    <div class="col ">
                        <input class="form-check-input opacity-0" type="radio" name="delivery_method">
                        <div class="delivery-method">
                            <button type='button' id='payze' class='btn'>
                                <div class="d-flex products-item left ">
                                    <img src="image/payze.png">
                                    <div>
                                        <h4>Payze Payment</h4>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </section>
    </div>
    @foreach($products as $product)
    <div class="modal modal-prods fade" id="modal_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog products-info-modal" role="document">
            <div class="modal-content">
                <div class="mod-img">
                    <img src="products-image/{{$product->image}}">
                </div>
                <div class="modal-desc">
                    <div class="modal-headline d-flex">
                        <h2>
                            {{$product->name}}
                        </h2>
                        <h1 class="d-flex">
                            {{$product->price}} ₾
                        </h1>
                    </div>
                    <h6>
                        {{$product->description}}
                    </h6>
                    <div class="number">
                        <button class="minus">-</button>
                        <input id="quantity_{{$product->id}}" name="quantity" type="text" value="1" />
                        <button class="plus">+</button>
                    </div>
                    <div class="d-flex counter-add">
                        <label for="quantity_{{$product->id}}" id="radio_{{$product->id}}">
                            <div type='button' class='btn btn-seccond add-cart-btn w-100 mt-3 add-cart-{{$product->id}}'>@lang('public._add_cart')</div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered cart-modal" role="document">
            <div class="modal-content cart-content">
                <div class="cart">
                    <!-- <p>@lang('public._shoping_cart')</p> -->
                    <table class="cart-table">
                        <!-- <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">@lang('public._name')</th>
                                <th scope="col">@lang('public._quantity')</th>
                                <th scope="col">@lang('public._price')</th>
                            </tr>
                        </thead> -->
                        <tr>
                            <td class="cart-img"> <img src="/image/{{$company->image}}" alt=""></td>
                            <td class="cart-name">name</td>
                            <td class="cart-quantity">4</td>
                            <td class="cart-price">19$</td>
                            <td class="cart-delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".add-cart-{{$product->id}}").click(function() {
            $quantity = $("#quantity_{{$product->id}}").val()
            $.ajax({
                data: 'quantity=' + $quantity,
                type: 'get',
                url: "cart/add-product/{{$product->id}}",
                success: function(response) {
                    fetchstudent()
                }
            })
        })
    </script>
    @endforeach
    <script src="assets/shop-js/modern.js"></script>
    <script>
        $(".delivery-label").click(function() {
            $(".delivery-label").css('background', 'none')
            $(this).css('background', '#ff6326')

        })
    </script>

</form>