@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Elenco dei tipi di progetto</h1>

    <ul class="list-group">
        @foreach ($types as $type)
        <li class="list-group-item">{{ $type->name }} <a href="{{route('admin.types.show', $type->id)}}">select</a></li>
        @endforeach
    </ul>

    <a href="{{route('admin.types.create')}}" class="btn btn-primary mt-5">Add new type</a>

</div>
@endsection