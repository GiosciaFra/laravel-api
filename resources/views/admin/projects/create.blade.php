@extends('layouts/app')

@section('content')

<div class="container py-5">
    <h1>ADD NEW PROJECT</h1>

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
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
            <label for="preview">Insert a preview</label>
            <input type="file" class="form-control" name="preview">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{old('link')}}">
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="type_id">Types</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>


        <div class="mb-4">
            <label class="mb-2" for="">Technologies</label>
            <div class="d-flex gap-4">

                @foreach($technologies as $technology)
                <div class="form-check ">

                    <input type="checkbox" name="technologies[]" value="{{$technology->id}}" class="form-check-input" id="technology-{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>

                    <label for="technology-{{$technology->id}}" class="form-check-label">{{$technology->title}}</label>
                </div>
                @endforeach

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>
</div>


@endsection