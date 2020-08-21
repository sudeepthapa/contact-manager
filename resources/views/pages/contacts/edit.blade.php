@extends('layouts.app')

@section('title','Create-Contact')


@section('content')
    <div class="card p-4 mt-3">

    <form action="{{route('contacts.update', $contact->id)}}" method="POST">

        @include('partials.error')
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                    <input type="text" name="name" {{old('name')}} value="{{old('name') ?? $contact->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nickname</label>
                        <input type="text" name="nickname" value="{{old('nickname') ??  $contact->nickname }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" name="phone_number" value="{{old('phone_number') ??  $contact->phone_number }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{old('email') ??  $contact->email }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{old('address') ?? $contact->address }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" value="{{old('status') ??  $contact->status }}" class="form-control">
                            <option value="">--Select--</option>
                            <option value={{1}} {{ $contact->status==1 ? 'selected':''}} >Active</option>
                            <option value={{0}} {{ $contact->status==0 ? 'selected':''}}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-info" type="submit">Update</button>
        </form>
    </div>
@endsection