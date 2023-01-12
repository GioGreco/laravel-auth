@extends('layouts.admin')

@section('content')
    <a class="btn btn-dark" href="{{route('admin.projects.index')}}">BACK</a>
    <h1>{{ $project->title }}</h1>
    {{-- @if($project->language)
        <small>Language: {{$project->$language->name}}</small>
    @endif --}}
    {{-- @if ($project->category)
        <small>Category: {{$project->category->name}}</small>
    @endif --}}
    <p>{!! $project->description !!}</p>
    <img src="{{ asset('storage/' . $project->project_image) }}">
@endsection
