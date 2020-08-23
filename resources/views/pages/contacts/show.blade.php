@extends('layouts.app')

@section('title')
    {{ $contact->name }}
@endsection
@section('content')
<div class="card p-3 mt-3">
    @include('partials.flashMessages')
        <div class="list-group">
            <li class="list-item">Name: {{ $contact->name }} </li>
            <li class="list-item">Address: {{$contact->address }} </li>
            <li class="list-item">Email: {{ $contact->email }} </li>
        </div>
    </div>
@endsection