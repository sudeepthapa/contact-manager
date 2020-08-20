@extends('layouts.app')

@section('title','Create-Contact')


@section('content')
    <div class="card p-4 mt-3">
    <form action="{{route('contacts.update', $contact->id)}}" method="POST">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                    <input type="text" name="name" value="{{ $contact->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nickname</label>
                        <input type="text" name="nickname" value="{{ $contact->nickname }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" name="phone_number" value="{{ $contact->phone_number }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{ $contact->address }}" class="form-control">
                    </div>
                </div>
            </div>
            <button class="btn btn-info" type="submit">Update</button>
        </form>
    </div>
@endsection