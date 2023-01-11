@extends('layouts.app')

@section('content')

    <section id="createForm" class="d-flex justify-content-center align-items-center">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex flex-column justify-content-around align-items-center text-black create_container mt-4">
            @csrf

            <h1>Create new Project</h1>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-field d-flex flex-column align-items-center">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <input type="submit" value="CREATE" class="btn btn-primary mt-3">
        </form>
    </section>
@endsection
