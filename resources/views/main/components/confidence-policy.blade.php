@extends('main.index')
<title>{{$company->shop_name}}</title>
<link rel="icon" href="/image/{{$company->image}}">
@section('content')
 <div class="terms-div container">
    <p class="terms-title">@lang('main.confidence_policy')</p>  
    {!! $company->confidence_policy !!}    
 </div>
 <style>
    body{
        overflow-y: auto !important;
    }
 </style>
@endsection