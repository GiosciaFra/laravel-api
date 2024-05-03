@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Elenco dei Progetti</h1>

    <ul class="list-group">
        @foreach ($projects as $project)
        <li class="list-group-item">{{ $project->name }} <a href="{{route('admin.projects.show', $project)}}">select</a></li>
        @endforeach
    </ul>

    <a href="{{route('admin.projects.create')}}" class="btn btn-primary mt-5">Add new project</a>

</div>
@endsection