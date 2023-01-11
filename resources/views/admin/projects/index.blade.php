@extends('layouts.admin')

@section('content')
    <h1>Projects</h1>
    <a class="btn btn-success" href="{{route('admin.projects.create')}}">Crea nuovo progetto</a>
    @if(session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <ul>
        @foreach ($projects as $project)
            <li>
                <a class="btn btn-primary text-white btn-sm" href="{{route('admin.projects.show', $project->slug)}}" title="View Project">{{$project->title}}</a> | <a class="btn btn-warning" href="{{route('admin.projects.edit', $project->slug)}}" title="View Project">EDIT</a> |
                <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$project->title}}">DELETE</button>
                </form>
            </li>
        @endforeach
    </ul>

    @include('partials.admin.modal-delete')
@endsection
