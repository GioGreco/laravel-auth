@extends('layouts.app')

@section('content')
    <a class="btn btn-dark" href="{{route('admin.projects.index')}}">BACK</a>
    <h1>{{ $project->title }}</h1>
    <p>{{ $project->description }}</p>
    <img src="{{ asset('storage/' . $project->project_image) }}">
@endsection
