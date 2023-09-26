@extends('admin.index')

@section('content')
@include("admin.layouts.progress")
<div class="container-fluid flex-grow-1 container-p-y">
  <button type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#exampleModal">
    @lang('admin._add_product')
  </button>
  <hr class="my-4">
  <div class="row mb-5">
    @foreach($products as $product)
    <div class="col-xl-6 col-sm-12 prod-col">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img card-img-left" src="/products-image/{{$product->image}}" alt="Card image" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}} </h5>
              <p class="card-text prod-desc">
                {{$product->description}}
              </p>
              <p class="card-text"><small class="text-muted">{{$product->price}} ₾</small></p>
              <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#edit_{{$product->id}}">
                @lang('admin._edit_product')
              </button>
              <button type="button" class="btn btn-primary btn-delete" data-toggle="modal" data-target="#delete_{{$product->id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@foreach($products as $product)
<div class="modal fade" id="edit_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('admin._edit_product')</h5>
        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/edit-product/{{$product->id}}' method='post' enctype=multipart/form-data>
          @csrf
          @method('PUT')
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._name')</label>
            <input type="text" name='name' value="{{$product->name}}" class="form-control mt-2">
          </div>
          @if(Auth::user()->commission_index == 1)
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._price')</label>
            <input type="number" onfocusout="calculateEditPrice({{$product->id}})" value="{{$product->first_price}}" name='first_price' class="form-control first-edit-price-{{$product->id}} mt-2">
            <small>+ @lang('admin._commission')</small>
          </div>
          <div class="form-group mt-3">
            <input type="hidden" name='price' value="{{$product->price}}" class="form-control total-edit-price-{{$product->id}} mt-2">
          </div>
          <div>
            <label for="exampleInputEmail1" class="totaler-label">@lang('admin._price_total')</label>
            <div class="last-edit-price-{{$product->id}} totaler">{{$product->price}} ₾</div>
            <small>@lang('admin._with_commission')</small>
          </div>
          @else
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._price')</label>
            <input type="number" name='price' value="{{$product->price}}" class="form-control mt-2">
          </div>
          @endif
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._description')</label>
            <textarea type="text" name='description' class="form-control mt-2">
            {{$product->description}}
            </textarea>
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._image')</label>
            <input type="file" name='image' value="{{$product->image}}" class="form-control mt-2">
          </div>
          <br>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name='display' value='1' {{ $product->display == 1 ? "checked" : "" }}>
            <label class="form-check-label" for="flexSwitchCheckDefault">@lang('admin._display')</label>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">@lang('admin._edit')</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('admin._product_delete')</h5>
        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='/admin/delete-product/{{$product->id}}' method='post' enctype=multipart/form-data>
          @csrf
          @method('DELETE')
          <p>@lang('admin._delete_product_text')</p>

          <button type="submit" class="btn btn-primary">@lang('admin._delete')</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('admin._add_product')</h5>
        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='../admin/add-product' method='post' enctype=multipart/form-data>
          @csrf
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._name')</label>
            <input type="text" required name='name' class="form-control mt-2">
          </div>
          @if(Auth::user()->commission_index == 1)
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._get_price')</label>
            <input type="number" required onfocusout="calculateEditPrice(1)" name='first_price' class="form-control first-edit-price-1 mt-2">
            <small>+ @lang('admin._commission')</small>
          </div>
          <div class="form-group mt-3">
            <input type="hidden" name='price' class="form-control total-edit-price-1 mt-2">
          </div>
          <div>
            <label for="exampleInputEmail1" class="totaler-label">@lang('admin._price_total')</label>
            <div class="last-edit-price-1 last-price totaler"></div>
            <small>@lang('admin._with_commission')</small>
          </div>
          @else
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._price')</label>
            <input type="number" name='price' class="form-control mt-2">
          </div>
          @endif
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._description')</label>
            <textarea type="text" name='description' class="form-control mt-2">
            </textarea>
          </div>
          <div class="form-group mt-3">
            <label for="exampleInputEmail1">@lang('admin._image')</label>
            <input type="file" name='image' class="form-control mt-2">
          </div>
          <br>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" checked name='display' value='1'>
            <label class="form-check-label" for="flexSwitchCheckDefault">@lang('admin._display')</label>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">@lang('admin._add')</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if($products->count() != 0 && Auth::user()->payze_iban == null)
<div class="modal " id="add_payze_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body center">
        <form action='../admin/add-iban' method='post' enctype=multipart/form-data>
          @csrf
          <h2>მეორე ეტაპი 2/2 🎉</h2>
          <h5>თქვენ წარმატებით დაამატეთ პირველი პროდუქტი. ონლაინ გადახდების დაერთებისთვის, გთხოვთ მოცემულ ველში შეიყვანოთ საბანკო ანგარიშის ნომერი და დააჭიროთ შენახვას</h5>
          <div class="form-group mt-3">
            <input type="text" name='payze_iban' placeholder="მაგალითად GE81BG0000000123456789" class="form-control mt-2">
          </div>
          <button type="submit" class="btn btn-primary add-btn">
            შენახვა
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endif
@if($products->count() == 0)
<div class="modal " id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body center">
        <h2>პირველი ეტაპი 1/2 </h2>
        <h5>გთხოვთ დააკლიკოთ მითითებულ ღილაკს და დაამატეთ პირველი პროდუქტი</h5>
        <button type="button" class="btn btn-primary add-btn prod-close" data-toggle="modal" data-target="#exampleModal">
          @lang('admin._add_product')
        </button>
      </div>
    </div>
  </div>
</div>
@endif
@if(Auth::user()->commission_index == 1)
<script>
  function calculatePrice() {
    $(".last-price").empty();
    var x = parseInt($('.first-price').val())
    var value = x + x / 100 * 7
    // $(".last-price").append(Math.round(x + x / 100 * 7 + 0.5) + '₾');
    // $('.total-price').val(Math.round(x + x / 100 * 7 + 0.5))
    $(".last-price").append(value.toPrecision(3) + '₾');
    $('.total-price').val(value.toPrecision(3))
  }

  function calculateEditPrice($id) {
    console.log(".last-edit-price-" + $id)
    $(".last-edit-price-" + $id).empty();
    var x = parseInt($('.first-edit-price-' + $id).val())
    var value = x + x / 100 * 7
    // $(".last-price").append(Math.round(x + x / 100 * 7 + 0.5) + '₾');
    // $('.total-price').val(Math.round(x + x / 100 * 7 + 0.5))
    $(".last-edit-price-" + $id).append(value.toPrecision(3) + '₾');
    $('.total-edit-price-' + $id).val(value.toPrecision(3))
  }
</script>
@endif


@if (\Session::has('ibanAdded'))
   <div class="modal " id="iban-added" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body center">
                <h2>გილოცავთ! 🎉</h2>
                <h5>თქვენ წარმატებით დაასრულეთ მთავარი ეტაპი, უკვე შეგიძლიათ დამატებული პროდუქტის გაყიდვა და ონლაინ ტრანზაქციის მიღება, თუ გსურთ რომ თქვენი მაღაზია კიდევ უფრო მრავალფუნქციური გახდეს, შეასრულეთ მისიები. წარმატებებს გისურვებთ.</h5>
                <a href="/admin/products"> <button class="btn btn-primary">დახურვა</button></a>
            </div>
        </div>
    </div>
</div>
@endif


<script>
  $(window).on('load', function() {
    $('#add_payze_modal').modal('show');
    $('#add_product_modal').modal('show');
    $('#iban-added').modal('show');

  });
  $(".prod-close").click(function() {
    $('#add_product_modal').modal('toggle');
  });
</script>
@stop