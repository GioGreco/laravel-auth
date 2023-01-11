@extends('layouts.app')

@section('content')
    <section id="EditForm" class="d-flex justify-content-center align-items-center">
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" class="d-flex flex-column justify-content-around align-items-center text-black create_container mt-4">
            @csrf
            @method('PUT')

            <h1>Edit Project : {{$project->title}}</h1>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror" value="{{old('title', $project->title)}}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{old('description', $project->description)}}</textarea>
            </div>

            <input type="submit" value="EDIT" class="btn btn-primary mt-3">
            <input type="reset" value="RESET" class="btn btn-warning mt-3">

        </form>
    </section>
@endsection
