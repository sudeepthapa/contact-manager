@extends('layouts.app')

@section('name', 'Contacts')


@section('content')
    <div class="card p-3 mt-3">
        <h4>All Contacts</h4>
        <div class="card p-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Nickname</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nickname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone_number }}</td>
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
                </tbody>
            </table>

        </div>
    </div>
@endsection