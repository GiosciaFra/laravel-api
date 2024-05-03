@extends('layouts/app')

@section('content')

<div class="container py-5">
    <h1>ADD NEW TYPE</h1>

    <form action="{{route('admin.types.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type's description</label>
            <textarea type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type">{{old('type')}}</textarea>
            @error('type')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
</div>


@endsection