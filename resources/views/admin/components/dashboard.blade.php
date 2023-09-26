@extends('admin.index')
@section('content')
@include("admin.layouts.progress")
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 col-lg-8 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">@lang('admin._transaction_last_week')</h5>
                </div>
                <div class="card-body last-week-transaction">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../image/tbc.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">@lang('admin._income')</small>
                                    <h6 class="mb-0">@lang('admin._tbc')</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{$tbc_profit_week}}</h6>
                                    <span class="text-muted">@lang('admin._gel')</span>
                                </div>
                            </div>
                        </li>
                        {{-- <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../image/stripe.png" style="object-fit: contain;" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">@lang('admin._income')</small>
                                    <h6 class="mb-0">@lang('admin._stripe')</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{$stripe_profit_week}}</h6>
                                    <span class="text-muted">@lang('admin._gel')</span>
                                </div>
                            </div>
                        </li> --}}
                        <!-- <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../image/paypal.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Income</small>
                                    <h6 class="mb-0">PAYPAL</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">0.00</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../image/ipay.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">Income</small>
                                    <h6 class="mb-0">IPAY</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">0.00</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li> -->
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../image/payze.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">@lang('admin._income')</small>
                                    <h6 class="mb-0">@lang('admin._payze')</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{$payze_profit_week}}</h6>
                                    <span class="text-muted">@lang('admin._gel')</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">@lang('admin._congrat')</h5>
                                    <p class="mb-4">
                                        @lang('admin._you_have') <span class="fw-bold">0%</span>
                                        @lang('admin._more_sale')
                                    </p>

                                    <a href="../admin/orders" class="btn btn-sm btn-outline-primary">@lang('admin._orders')</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">@lang('admin._pr_today')</span>
                            <h3 class="card-title mb-2">{{$profit_today}} ₾</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> 0%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">@lang('admin._pr_week')</span>
                            <h3 class="card-title mb-2">{{$profit_week}} ₾</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> 0%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">@lang('admin._pr_week')</span>
                            <h3 class="card-title mb-2">{{$profit_month}} ₾</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> 0%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-semibold d-block mb-1">@lang('admin._pr_year')</span>
                            <h3 class="card-title mb-2">{{$profit_years}} ₾</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> 0%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(window).on('load', function() {
        $('#add_payze_modal').modal('show');
        $('#add_product_modal').modal('show');
    });
    $(".prod-close").click(function() {
        $('#add_product_modal').modal('toggle');
    });
</script>
<div class="content-backdrop fade"></div>
@if($products->count() == 0)
<div class="modal " id="welcome_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body center">
                <h2>მოგესალმებით! 🎉</h2>
                <h5>თქვენ წარმატებით შექმენით ონლაინ მაღაზია, იმისთივს რომ შეძლოთ პროდუქტის სრულფასოვნად გაყიდვა გთხოვთ დააჭიროთ შემდეგს და მიჰყვეთ ინსტრუქციას</h5>
                <a href="/admin/products"> <button class="btn btn-primary">შემდეგი</button></a>
            </div>
        </div>
    </div>
</div>

<script>
    $(window).on('load', function() {
        $('#welcome_modal').modal('show');
    });
</script>
@endif
@stop