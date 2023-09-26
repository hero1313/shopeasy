@extends('admin.index')

@section('content')
@include("admin.layouts.progress")

<div class="container-fluid flex-grow-1 container-p-y">

    <form action="{{route('payment.update')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 col-12 mb-md-0 mb-4">
                <div class="card">
                    <h5 class="card-header">@lang('admin._pay_method')</h5>
                    <div class="card-body payment-card">
                        <p>@lang('admin._pay_method_text')</p>
                        <!-- Connections -->
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <img src="../image/tbc.png" alt="slack" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                                <div class="col-9 mb-sm-0 mb-2">
                                    <h6 class="mb-0">@lang('admin._tbc')</h6>
                                    <small class="text-muted">@lang('admin._api_integration')</small>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input float-end tbc-checkbox" name="tbc" type="checkbox" value="1" role="switch" {{ Auth::user()->tbc === "1" ? "checked" : "" }} />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <img src="../image/payze.png" alt="slack" class="me-3" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                                <div class="col-9 mb-sm-0 mb-2">
                                    <h6 class="mb-0">@lang('admin._payze')</h6>
                                    <small class="text-muted">@lang('admin._api_integration')</small>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input float-end payze-checkbox" name="payze" value="1" type="checkbox" role="switch" {{ Auth::user()->payze === "1" ? "checked" : "" }} />
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <img src="../image/payze2.png" alt="slack" class="me-3 contain" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                                <div class="col-9 mb-sm-0 mb-2">
                                    <h6 class="mb-0">@lang('admin._payze')</h6>
                                    <small class="text-muted">@lang('admin._iban_integration')</small>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input float-end payze-iban-checkbox" name="payze" value="2" type="checkbox" role="switch" {{ Auth::user()->payze == 2 ? "checked" : "" }} />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 payments-card tbc-card ">
                        <div class="card mt-4 ">
                            <h5 class="card-header">@lang('admin._tbc')</h5>
                            <img src="../image/tbc.png" alt="slack" class="me-3 cards-img" height="30" />
                            <div class="card-body payment-card pt-0">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">@lang('admin._api_key')</label>
                                    <input type="text" name='tbc_key' class="form-control mt-2" value="{{Auth::user()->tbc_key}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">@lang('admin._api_secret')</label>
                                    <input type="text" name='tbc_secret' class="form-control mt-2" value="{{Auth::user()->tbc_secret}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 payze-iban-card">
                        <div class="card mt-4 payments-card payze-iban-card ">
                            <h5 class="card-header">@lang('admin._payze_iban')</h5>
                            <img src="../image/payze2.png" alt="slack" class="me-3 cards-img contain" height="30" />
                            <div class="card-body payment-card pt-0">
                                <div class="form-group mt-3">
                                    <small>@lang('admin._payze_text')</small>
                                    <input type="text" name='payze_iban' placeholder="@lang('admin._iban_number')" class="form-control mt-2" value="{{Auth::user()->payze_iban}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 ">
                        <div class="card mt-4 payments-card payze-card ">
                            <h5 class="card-header">@lang('admin._payze')</h5>
                            <img src="../image/payze.png" alt="slack" class="me-3 cards-img" height="30" />
                            <div class="card-body payment-card pt-0">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">@lang('admin._api_key')</label>
                                    <input type="text" name='payze_key' class="form-control mt-2" value="{{Auth::user()->payze_key}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">@lang('admin._api_secret')</label>
                                    <input type="text" name='payze_secret' class="form-control mt-2" value="{{Auth::user()->payze_secret}}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-primary my-3">@lang('admin._save')</button>
            </div>
        </div>

    </form>
</div>

<script>
    $('.tbc-checkbox').change(function() {
        $('.tbc-card').toggle();
    });
    if (($('.tbc-checkbox').prop("checked") == true)) {
        $('.tbc-card').css("display", "block");
    }

    // $('.stripe-checkbox').change(function() {
    //     $('.stripe-card').toggle();
    // });
    // if (($('.stripe-checkbox').prop("checked") == true)) {
    //     $('.stripe-card').css("display", "block");
    // }

    // $('.payze-checkbox').change(function() {
    //     $('.payze-card').toggle();
    //     $('.payze-iban-card').css("display", "none");

    // });
    // if (($('.payze-checkbox').prop("checked") == true)) {
    //     $('.payze-card').css("display", "block");
    // }

    $('.payze-iban-checkbox').change(function() {
        $('.payze-iban-card').toggle();
        $('.payze-card').css("display", "none");

    });
    if (($('.payze-iban-checkbox').prop("checked") == true)) {
        $('.payze-iban-card').css("display", "block");
        $('.payze-checkbox').prop("checked") == false;
    }
</script>


@stop