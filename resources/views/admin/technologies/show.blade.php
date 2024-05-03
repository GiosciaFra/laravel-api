@extends('layouts/app')

@section('content')
<div class="container py-5">
    <h1>{{$technology->id}}. {{$technology->title}}</h1>

    <div>
        <a href="{{route('admin.technologies.edit', $technology->id)}}" class="btn btn-primary">Edit</a>

        <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this technology?')">Delete</button>
        </form>
    </div>


</div>

@endsection