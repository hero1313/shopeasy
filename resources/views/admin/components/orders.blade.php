@extends('admin.index')
@section('content')
@include("admin.layouts.progress")
<div class="container-fluid flex-grow-1 container-p-y">

    <div class="card">
        <h5 class="card-header">@lang('admin._orders')</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>@lang('admin._pay_id')</th>
                        <th>@lang('admin._products')</th>
                        <th>@lang('admin._total')</th>
                        <th>@lang('admin._pay_method')</th>
                        <th>@lang('admin._name')</th>
                        <th>@lang('admin._email')</th>
                        <th>@lang('admin._number')</th>
                        <th>@lang('admin._status')</th>
                        <th>@lang('admin._action')</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($orders as $order)
                    <tr>
                        <td><strong>{{$order->id}}</strong></td>
                        <td>{{$order->pay_id}}</td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#order-detail-{{$order->id}}">@lang('admin._detail')</button></td>
                        <td>
                            {{$order->total}}
                            @if($order->currency == 1)
                            @lang('admin._gel')
                            @elseif($order->currency == 2)
                            @lang('admin._usd')
                            @elseif($order->currency == 3)
                            @lang('admin._euro')
                            @endif
                        </td>
                        <td>
                            @if($order->pay_method == 1)
                            TBC
                            @elseif($order->pay_method == 2)
                            PAYZE
                            @elseif($order->pay_method == 3)
                            STRIPE
                            @endif
                        </td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->number}}</td>
                        <td>
                            <span class="badge bg-label-primary me-1">

                                @if($order->transaction_status == 1)
                                @lang('admin._success')
                                @endif
                            </span>
                        </td>
                        <td>
                            @if($order->transaction_status == 1 && $order->created_at > $timeUp)
                            <a href="/refound/{{$order->id}}"><button class="btn btn-primary">@lang('admin._refound')</button></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@foreach($orders as $order)

<div class="modal fade bd-example-modal-lg" id="order-detail-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin._order') #{{$order->id}}</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="width:100%">
                    <tr class="head-tr">
                        <th>@lang('admin._product_id')</th>
                        <th>@lang('admin._name')</th>
                        <th>@lang('admin._image')</th>
                        <th>@lang('admin._price')</th>
                        <th class="quanty">@lang('admin._quantity')</th>
                    </tr>

                    @php
                    $products = DB::table('carts')
                    ->where('session_token', '=', $order->session_token)
                    ->get();
                    @endphp

                    @foreach($products as $product)
                    <tr class="detail-tr">
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="/products-image/{{$product->photo}}" alt="Italian Trulli"></td>
                        <td>{{$product->price}} ₾</td>
                        <td>
                            <h6>{{$product->quantity}}</h6>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>

@endforeach

@stop