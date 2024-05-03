@extends('layouts/app')

@section('content')

<div class="container py-5">
    <h1>EDIT NEW TECHNOLOGY</h1>

    <form action="{{route('admin.technologies.update', $technology->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Technology's name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mt-3">
            <label for="color" class="form-label">Select color:</label>
            <input type="color" id="color" name="color" value="{{ $technology->color ?? 'rgb(255, 255, 255)' }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>



    </form>
</div>



@endsection