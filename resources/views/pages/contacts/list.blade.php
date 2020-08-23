@extends('layouts.app')

@section('name', 'Contacts')


@section('content')
    <div class="card p-3 mt-3">
        <div class="d-flex align-items-center mb-1">
            <h4>All Contacts</h4>
            <div class="ml-auto">
                <a href=" {{ route('contacts.index') }} " class="btn btn-sm ml-auto {{ (request()->is('contacts')) ? 'btn-primary' : 'btn-secondary' }}">
                    All <span class="badge badge-light">{{$all}}</span>
                </a>
            <a href="{{ route('contacts.active')}}" class="btn btn-sm ml-auto {{ (request()->is('contacts/active')) ? 'btn-primary' : 'btn-secondary' }}">
                    Active <span class="badge badge-light">{{$active}}</span>
                </a>
                <a href="{{route('contacts.inactive')}}" class="btn btn-sm ml-auto {{ (request()->is('contacts/inactive')) ? 'btn-primary' : 'btn-secondary' }}">
                    Inactive <span class="badge badge-light">{{$inactive}}</span>
                </a>
            </div>
        </div>

        @include('partials.flashMessages')

        <div class="card p-2">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Nickname</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($contacts)>0)            
                        @foreach ($contacts as $item)
                            <tr>
                                <td>
                                    <div style="width: 100px; height:100px; overflow:hidden; border-radius:50px;">
                                        <img src="{{ asset($item->avatar) }}" alt="" class="img img-fluid">
                                    </div>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nickname }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="d-flex ">
                                    <a href=" {{route('contacts.show', $item->id)}} " class="btn btn-sm btn-info mr-1"><i class="fa fa-eye"></i></a>
                                    <form action="{{route('contacts.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mr-1"><i class="fa fa-trash"></i></button>
                                    </form>
                                    <a href=" {{route('contacts.edit', $item->id)}} " class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                            <tr>
                                <td colspan="7" class="text-center">No records found</td>
                            </tr>
                    @endif

                </tbody>
            </table>

        </div>
    </div>

    <script>

        setTimeout(function(){
            $(".alert").alert('close');
        },5000)

    </script>
@endsection