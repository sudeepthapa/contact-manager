@extends('layouts.app')

@section('title','Create-Contact')


@section('content')
    <div class="card p-4 mt-3">
    <form action="{{route('contacts.store')}}" method="POST">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nickname</label>
                        <input type="text" name="nickname" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" name="phone_number" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                </div>
            </div>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
    </div>
@endsection