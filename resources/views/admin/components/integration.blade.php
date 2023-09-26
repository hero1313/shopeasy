@extends('admin.index')
@section('content')
@include("admin.layouts.progress")
<div class="container-fluid flex-grow-1 container-p-y">

    <form action="{{route('integration.update')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12 col-12 mb-md-0 mb-4">

                <div class="card container-fluid">
                    <div class="row">
                        <h5 class="card-header">@lang('admin._integration')</h5>
                        <div class="card-body payment-card pb-1 col-md-6">
                            <!-- Connections -->
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="../image/office.jpg" alt="slack" class="me-3 contain" height="30" />
                                </div>
                                <div class="flex-grow-1 row">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <h6 class="mb-0">@lang('admin._sms_office')</h6>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input float-end office-checkbox" name="sms_office" type="checkbox" value="1" role="switch" {{ Auth::user()->sms_office === 1 ? "checked" : "" }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-body payment-card pt-1 col-md-6">
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <img src="../image/messenger.png" alt="slack" class="me-3 contain" height="30" />
                            </div>
                            <div class="flex-grow-1 row">
                                <div class="col-9 mb-sm-0 mb-2">
                                    <h6 class="mb-0">Messenger</h6>
                                    <small class="text-muted">Messenger Chat Plugin</small>
                                </div>
                                <div class="col-3 text-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input float-end messenger-checkbox" name="messenger" type="checkbox" value="1" role="switch" {{ Auth::user()->messenger === 1 ? "checked" : "" }} />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <div class="card-body payment-card pt-1 col-md-6">
                            <!-- Connections -->
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0">
                                    <img src="../image/analytics.png" alt="slack" class="me-3 contain" height="30" />
                                </div>
                                <div class="flex-grow-1 row">
                                    <div class="col-9 mb-sm-0 mb-2">
                                        <h6 class="mb-0">@lang('admin._google_analitycs')</h6>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input float-end analytics-checkbox" name="analytics" type="checkbox" value="1" role="switch" {{ Auth::user()->analytics == 1 ? "checked" : "" }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card mt-4 payments-card office-card ">
                            <h5 class="card-header">@lang('admin._sms_office')</h5>
                            <img src="../image/office.jpg" alt="slack" class="me-3 cards-img contain" height="30" />
                            <div class="card-body payment-card pt-0">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">@lang('admin._sms_name')</label>
                                    <input type="text" name='sms_name' class="form-control mt-2" value="{{Auth::user()->sms_name}}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">@lang('admin._sms_token')</label>
                                    <input type="text" name='sms_token' class="form-control mt-2" value="{{Auth::user()->sms_token}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-md-6">
                    <div class="card mt-4 payments-card messenger-card ">
                        <h5 class="card-header">Messenger</h5>
                        <img src="../image/messenger.png" alt="slack" class="me-3 cards-img contain" height="30" />
                        <div class="card-body payment-card pt-0">
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">Messenger Plugin Script</label>
                                <textarea type="text" rows="5" name='messenger_script' class="form-control mt-2">
                                {{Auth::user()->messenger_script}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <div class="col-12 col-md-6">
                        <div class="card mt-4 payments-card analytics-card ">
                            <h5 class="card-header">@lang('admin._google_analitycs')</h5>
                            <img src="../image/analytics.png" alt="slack" class="me-3 cards-img contain" height="30" />
                            <div class="card-body payment-card pt-0">
                                <div class="form-group mt-3">
                                    <label for="exampleInputEmail1">@lang('admin._analitytics_script')</label>
                                    <textarea type="text" rows="5" name='analytics_script' class="form-control mt-2">
                                    {{Auth::user()->analytics_script}}
                                    </textarea>
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
    $('.office-checkbox').change(function() {
        $('.office-card').toggle();
    });
    if (($('.office-checkbox').prop("checked") == true)) {
        $('.office-card').css("display", "block");
    }

    $('.messenger-checkbox').change(function() {
        $('.messenger-card').toggle();
    });
    if (($('.messenger-checkbox').prop("checked") == true)) {
        $('.messenger-card').css("display", "block");
    }

    $('.analytics-checkbox').change(function() {
        $('.analytics-card').toggle();
    });
    if (($('.analytics-checkbox').prop("checked") == true)) {
        $('.analytics-card').css("display", "block");
    }
</script>


@stop