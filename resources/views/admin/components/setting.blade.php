@extends('admin.index')

@section('content')
@include("admin.layouts.progress")

<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="fw-bold  mb-4"><span class="text-muted fw-light">@lang('admin._company_setting') </span></h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <form id="formAccountSettings" enctype='multipart/form-data' action="/admin/setting" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <div>
                                <img src="/image/{{Auth::user()->image}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                <button class="btn btn-primary save-img w-100 mt-2">@lang('admin._save')</button>
                            </div>
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">@lang('admin._upload_logo')</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" name="image" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary img-reset account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">@lang('admin._reset')</span>
                                </button>
                                <p class="text-muted mb-0">@lang('admin._allowed') JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">@lang('admin._first_name')</label>
                                <input class="form-control" type="text" id="firstName" name="name" value="{{Auth::user()->name}}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">@lang('admin._last_name')</label>
                                <input class="form-control" type="text" name="lastname" id="lastName" value="{{Auth::user()->lastname}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">@lang('admin._email')</label>
                                <input class="form-control" type="text" id="email" name="email" value="{{Auth::user()->email}}" placeholder="john.doe@example.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">@lang('admin._phone_number')</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" id="phoneNumber" name="number" class="form-control" value="{{Auth::user()->number}}" placeholder="599 123 456" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">@lang('admin._address')</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="zipCode" class="form-label">@lang('admin._zip_code')</label>
                                <input type="text" class="form-control" id="zipCode" name="zipcode" value="{{Auth::user()->zipcode}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="country">@lang('admin._country')</label>
                                <select id="country" name="country" class="select2 form-select">
                                    <option value="{{Auth::user()->country}}">{{Auth::user()->country}}</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Canada">Canada</option>
                                    <option value="China">China</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Korea">Korea, Republic of</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Russia">Russian Federation</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="language" class="form-label">@lang('admin._language')</label>
                                <select id="language" name="language" class="select2 form-select">
                                    <option value="{{Auth::user()->language}}">
                                        @if(Auth::user()->language == 'ge')
                                        Georgian
                                        @elseif(Auth::user()->language == 'en')
                                        English
                                        @elseif(Auth::user()->language == 'de')
                                        Germany
                                        @endif
                                    </option>
                                    <option value="en">English</option>
                                    <option value="ge">Georgia</option>
                                    <option value="de">German</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="facebook" class="form-label">@lang('admin._facebook_link')</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{Auth::user()->facebook}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="instagram" class="form-label">@lang('admin._instagram_link')</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{Auth::user()->instagram}}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="currency" class="form-label">@lang('admin._curency')</label>
                                <select id="currency" name="currency" class="select2 form-select">
                                    <option value="{{Auth::user()->currency}}">
                                        @if(Auth::user()->currency == 1)
                                        GEL
                                        @elseif(Auth::user()->currency == 2)
                                        USd
                                        @elseif(Auth::user()->currency == 3)
                                        EUR
                                        @endif
                                    </option>
                                    <option value="1">GEL</option>
                                    <option value="2">USD</option>
                                    <option value="3">EUR</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="currency" class="form-label">@lang('admin._commission')</label>
                                <select id="currency" name="commission_index" class="select2 form-select">
                                    @if(Auth::user()->commission_index == 1)
                                    <option value="1">@lang('admin._commission_plus')</option>
                                    <option value="2">@lang('admin._commission_minus')</option>
                                    @elseif(Auth::user()->commission_index == 2)
                                    <option value="2">@lang('admin._commission_minus')</option>
                                    <option value="1">@lang('admin._commission_plus')</option>
                                    @endif
                                </select>
                            </div>

                            

                            <textarea rows="6" type="text" class="form-control" id="description" name="description">
                                {{Auth::user()->description}}
                            </textarea>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">@lang('admin._save')</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(".account-file-input").change(function(event) {
        var x = URL.createObjectURL(event.target.files[0]);
        $(".rounded").attr("src", x);
        $(".save-img").css("display", "block");
    })
    $(".img-reset").click(function(event) {
        $("#upload").val('')
        console.log($("#upload").val())
        $(".rounded").attr("src", "/image/{{Auth::user()->image}}");
    })

    // var Element = document.getElementsByClassName('account-file-input');
    // var x = URL.createObjectURL(Element[Element.length - 1].files[0]);
    // $(".rounded").last().attr("src", x);
</script>
@stop