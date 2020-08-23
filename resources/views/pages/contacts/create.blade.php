@extends('layouts.app')

@section('title','Create-Contact')


@section('content')
    <div class="card p-4 mt-3">
    {{-- @include('partials.error') --}}
    <form action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nickname</label>
                        <input type="text" name="nickname" value="{{old('nickname')}}" class="form-control">
                        @error('nickname')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control">
                        @error('phone_number')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{old('email')}}" class="form-control">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{old('address')}}" class="form-control">
                        @error('address')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" value="{{old('status')}}">
                            <option value=''>--Select--</option>
                            <option value={{1}} {{ old('status')==1?'selected':'' }}>Active</option>
                            <option value={{0}} {{ old('status')==0?'selected':'' }}>InActive</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">DOB</label>
                        <input type="date" name="dob" value="{{old('dob')}}" class="form-control">
                        @error('dob')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input type="file" name="avatar" value="{{old('avatar')}}" class="form-control">
                        @error('avatar')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
    </div>
@endsection