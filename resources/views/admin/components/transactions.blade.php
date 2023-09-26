@extends('admin.index')

@section('content')
@include("admin.layouts.progress")

<div class="container-fluid flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">@lang('admin._transactions')</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>@lang('admin._pay_id')</th>
                        <th>@lang('admin._total')</th>
                        <th>@lang('admin._pay_method')</th>
                        <th>@lang('admin._name')</th>
                        <th>@lang('admin._email')</th>
                        <th>@lang('admin._number')</th>
                        <th>@lang('admin._status')</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($transactions as $transaction)
                    <tr>
                        <td><strong>{{$transaction->id}}</strong></td>
                        <td>{{$transaction->pay_id}}</td>
                        <td>
                            {{$transaction->total}}
                            @if($transaction->currency == 1)
                            @lang('admin._gel')
                            @elseif($transaction->currency == 2)
                            @lang('admin._usd')
                            @elseif($transaction->currency == 3)
                            @lang('admin._euro')
                            @endif
                        </td>
                        <td>
                            @if($transaction->pay_method == 1)
                            TBC
                            @elseif($transaction->pay_method == 2)
                            PAYZE
                            @elseif($transaction->pay_method == 3)
                            STRIPE
                            @endif
                        </td>
                        <td>{{$transaction->name}}</td>
                        <td>{{$transaction->email}}</td>
                        <td>{{$transaction->number}}</td>
                        <td>
                            <span class="badge bg-label-primary me-1">
                                @if($transaction->transaction_status == 0)
                                @lang('admin._created')
                                @elseif($transaction->transaction_status == 1)
                                @lang('admin._success')
                                @elseif($transaction->transaction_status == -1)
                                @lang('admin._refounded')
                                @elseif($transaction->transaction_status == -2)
                                @lang('admin._filed')
                                @endif
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop