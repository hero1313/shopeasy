@extends('admin.merchants-index')

@section('content')
<div class="container-fluid filter-card flex-grow-1 container-p-y">
    <form action="/merchants" method="get">
        <div class="card p-4 ">
            <div class="row">
                <div class="col-12 col-md-4">
                    <select class="form-select" name="call_filter" aria-label="Default select example">
                        <option value="">ყველა</option>
                        <option value="1">დარეკილი</option>
                        <option value="-1">არაა დარეკილი</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <select class="form-select" name="activity_filter" aria-label="Default select example">
                        <option value="">ყველა</option>
                        <option value="0">უცნობი</option>
                        <option value="1">აგრძელებს</option>
                        <option value="2">სატესტო</option>
                        <option value="-1">არ აგრძელებს</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <button class="btn btn-primary w-100">გაფილტვრა</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">@lang('admin._transactions')</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>მაღაზიია</th>
                        <th>სახელი</th>
                        <th>ნომერი</th>
                        <th>ვერიფიკაცია</th>
                        <th>ფეიზი</th>
                        <th>ბოლო ავტორიზაცია</th>
                        <th>დარეკვის სტატუსი</th>
                        <th>აქტიურობის სტატუსი</th>
                        <th>რედაქტირება</th>
                        <th>წაშლა</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="https://{{$user->shop_name}}.shopeasy.ge" target="_blank">{{$user->shop_name}}.shopeasy.ge</a></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->number}}</td>
                        <td>{{$user->email_verified_at}}</td>
                        <td>{{$user->payze_iban}}</td>
                        <td>{{$user->last_login_time}}</td>
                        <td>
                            @if($user->call_status == 1)
                            <div class="btn btn-success">დარეკილი</div>
                            @elseif($user->call_status == -1)
                            <div class="btn btn-danger">დაურეკავი</div>
                            @endif
                        </td>
                        <td>
                            @if($user->activity_status == -1)
                            <div class="btn btn-danger">აღარ აგრძელებს</div>
                            @elseif($user->activity_status == 1)
                            <div class="btn btn-success">აგრძელებს</div>
                            @elseif($user->activity_status == 0)
                            <div class="btn btn-info">უცნობია</div>
                            @elseif($user->activity_status == 2)
                            <div class="btn btn-info">სატესტო</div>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_{{$user->id}}">რედაქტირება</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{$user->id}}">წაშლა</button>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@foreach($users as $user)
<div class="modal fade" id="edit_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">მერჩანტის რედაქტირება</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='edit-merchants/{{$user->id}}' method='post' enctype=multipart/form-data>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <label for="exampleFormControlInput1" class="form-label">დარეკვის სტატუსი</label>
                            <select class="form-select" name="call_status" aria-label="Default select example">
                                @if($user->call_status == 1)
                                <option value="1">დარეკილი</option>
                                @else
                                <option value="-1">არაა დარეკილი</option>
                                @endif
                                <option value="1">დარეკილი</option>
                                <option value="-1">არაა დარეკილი</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="exampleFormControlInput1" class="form-label">აქტიურობის სტატუსი</label>
                            <select class="form-select" name="activity_status" aria-label="Default select example">
                                @if($user->activity_status == null)
                                <option value="-1">არ აგრძელებს</option>
                                @elseif($user->activity_status == 1)
                                <option value="1">აგრძელებს</option>
                                @elseif($user->activity_status == 0)
                                <option value="0">უცნობი</option>
                                @elseif($user->activity_status == 2)
                                <option value="2">სატესტო</option>
                                @endif
                                <option value="0">უცნობი</option>
                                <option value="1">აგრძელებს</option>
                                <option value="2">სატესტო</option>
                                <option value="-1">არ აგრძელებს</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary">რედაქტირება</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">მერჩანტის წაშლა</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='/delete-merchants/{{$user->id}}' method='post' enctype=multipart/form-data>
                    @csrf
                    @method('DELETE')
                    <p>დარწმუნებული ხართ რომ გინდათ წაშლა</p>

                    <button type="submit" class="btn btn-primary">@lang('admin._delete')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@stop