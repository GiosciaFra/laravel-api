@extends('layouts/app')

@section('content')
<div class="container py-5">
    <h1>{{$type->id}}. {{$type->name}}</h1>



    <p class="mt-3"> {{$type->type}}</p>

    <div>
        <a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-primary">Edit</a>

        <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this type?')">Delete</button>
        </form>
    </div>


</div>

@endsection