@extends('admin.index')
@section('content')
@include("admin.layouts.progress")
<div class="container-fluid flex-grow-1 container-p-y">

    <form action="{{route('additional.update')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row add">
            <div class="col-md-12 col-12 mb-md-0 mb-4 row">
                <div class="col-md-6">
                    <div class="card ">
                        <h5 class="card-header">@lang('admin._add_info_order')</h5>
                        <div class="card-body payment-card">
                            <div class="d-flex mb-3">
                                <!-- <div class="flex-shrink-0">
                                <img src="../image/payze.png" alt="slack" class="me-3" height="30" />
                            </div> -->
                                <div class="flex-grow-1 row">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <p>@lang('admin._add_info_order_text')</p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input float-end payze-checkbox" name="additional_info" value="1" type="checkbox" role="switch" {{ Auth::user()->additional_info == 1 ? "checked" : "" }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Connections -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 tips">
                    <div class="card ">
                        <h5 class="card-header">@lang('admin._tip_option')</h5>
                        <div class="card-body payment-card">
                            <div class="d-flex mb-3">
                                <!-- <div class="flex-shrink-0">
                                <img src="../image/payze.png" alt="slack" class="me-3" height="30" />
                            </div> -->
                                <div class="flex-grow-1 row">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <p>@lang('admin._tip_option_text')</p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input float-end payze-checkbox" name="tip" value="1" type="checkbox" role="switch" {{ Auth::user()->tip == 1 ? "checked" : "" }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-4  ">
                        <h5 class="card-header">@lang('admin._delivery_date')</h5>
                        <div class="card-body payment-card">
                            <div class="d-flex mb-3">
                                <!-- <div class="flex-shrink-0">
                                <img src="../image/payze.png" alt="slack" class="me-3" height="30" />
                            </div> -->
                                <div class="flex-grow-1 row">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <p>@lang('admin._delivery_date_text')</p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input float-end payze-checkbox" name="delivery_date" value="1" type="checkbox" role="switch" {{ Auth::user()->delivery_date == 1 ? "checked" : "" }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mt-4  ">
                        <h5 class="card-header pb-0">@lang('admin._promo_code')</h5>
                        <div class="card-body payment-card pt-0">
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">@lang('admin._code')</label>
                                <input type="text" name='promo_code' class="form-control mt-2" placeholder="promo123" value="{{Auth::user()->promo_code}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">@lang('admin._discount_percentage')</label>
                                <input type="text" name='promo_percentage' class="form-control mt-2" placeholder="10" maxlength="2" min="0" value="{{Auth::user()->promo_percentage}}">
                            </div>
                            <div class="form-check form-switch mt-3">
                                <label for="exampleInputEmail1">@lang('admin._active')</label>
                                <input class="form-check-input  payze-checkbox" name="promo" value="1" type="checkbox" role="switch" {{ Auth::user()->promo == 1 ? "checked" : "" }} />
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary my-3 max-content">@lang('admin._save')</button>
                </div>
            </div>
        </div>

    </form>
</div>



@stop