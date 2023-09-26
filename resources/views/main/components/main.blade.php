@extends('main.index')
<title>{{$company->shop_name}}</title>
<link rel="icon" href="/image/{{$company->image}}">
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if($company->design == 'basic')
    @include('main.designs.basic')
@elseif($company->design == 'modern')
    @include('main.designs.modern')
@endif

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            swal("{{ $error }}", "", "error");
        </script>
    @endforeach
@endif
<script>
    $("#tbc").click(function() {
        if( !$('#name').val() && !$('email').val() && !$('#number').val()) {
            $('html, body').animate({
            scrollTop: $('section.info-section').offset().top - 120
            }, -1000);
            swal("გთხოვთ შეავსოთ შეკვეთის დეტალები", "", "info");

        }
        else{
        $('#main_form').attr('action', "create-order?method=1");
        $('#main_form').submit();
        }
    })

    $("#payze").click(function() {
        if( !$('#name').val() && !$('email').val() && !$('#number').val()) {
            $('html, body').animate({
            scrollTop: $('section.info-section').offset().top - 120
            }, -1000);
            swal("გთხოვთ შეავსოთ შეკვეთის დეტალები", "", "info");

        }
        else{
            $('#main_form').attr('action', "create-order?method=2");
            $('#main_form').submit();
        }
        
    })

    $("#discount").click(function() {
        if ($(".code_promo").val() == "{{ $company->promo_code }}") {
            $(".promo-succ").toggle();
            $(".promo-fail").css("display", "none");
            swal("Promo code is valid", "You received a {{$company->promo_percentage}}% discount", "success");
        } else {

            swal("Promo code is invalid", "Try again", "error");

        }
    });

    fetchstudent();

    function fetchstudent() {
        $('tbody').empty()
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "cart/show-product",
            success: function(response) {
                $('.cart-length').empty()
                $('.cart-length').append(response.products.length)
                $.each(response.products, function(key, item) {

                    $('tbody').append(
                        '<tr>\
                            <td class="cart-delete"><button class="btn cart-delete" value="' + item.id + '">\
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">\
                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />\
                            </svg>\
                            </button></td>\
                            <td class="cart-img"> <img src="../products-image/' + item.photo + '" alt=""></td>\
                            <td class="cart-name">' + item.name + '</td>\
                            <td class="cart-quantity">\
                            <div class="number-counter">\
                                    <button value="' + item.id + '" id="minusCart" class="minus btn">-</button>\
                                    <input type="text" value="' + item.quantity + '"/>\
                                    <button value="' + item.id + '" id="plusCart" class="plus btn">+</button>\
                                </div>\
                            </td>\
                            <td class="cart-price">' + item.price + '</td>\
                        </tr>'
                    )
                });
            }
        })
    }
    $(document).on('click', '.cart-delete', function(e) {
        e.preventDefault();
        var prod_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'get',
            url: "/cart/delete-product/" + prod_id,
            success: function(response) {
                fetchstudent()
            }
        })
    })

    $(document).on('click', '#plusCart', function(e) {
        e.preventDefault();
        var prod_id = $(this).val();
        $.ajax({
            type: 'get',
            url: "/cart/plus-product/" + prod_id,
            success: function(response) {
                fetchstudent()
            }
        })
    })

    $(document).on('click', '#minusCart', function(e) {
        e.preventDefault();
        var prod_id = $(this).val();
        $.ajax({
            type: 'get',
            url: "/cart/minus-product/" + prod_id,
            success: function(response) {
                fetchstudent()
            }
        })
    })


    $(document).ready(function() {
        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>

<style>
    .user {
        position: fixed;
        left: 50px;
        top: 45px;
        cursor: pointer;
        padding: 13px !important;
        border-radius: 100% !important;
        display: none;

    }
</style>


@stop