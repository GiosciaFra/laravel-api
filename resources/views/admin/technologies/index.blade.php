@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Technologies</h1>

    <ul class="list-group">
        @foreach ($technologies as $technology)
        <li class="list-group-item">{{ $technology->title }} <a href="{{route('admin.technologies.show', $technology->id)}}">select</a></li>
        @endforeach
    </ul>

    <a href="{{route('admin.technologies.create')}}" class="btn btn-primary mt-5">Add new type</a>

</div>
@endsection