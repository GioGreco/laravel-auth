@extends('layouts.admin')

@section('content')
    @if(session()->has('message'))
        <div class="custom-alert alert alert-success mb-3 mt-3">
            <div class="alert-inner d-flex align-items-center">
                <div class="icon-change me-4"><i class="fa-solid fa-trash"></i></div>
                {{ session()->get('message') }}
            </div>
        </div>
    @endif

    <section class="index-table">
        <div class="table-inner d-flex flex-column align-items-center">
            <div class="items-wrapper d-flex flex-wrap w-100">
            @foreach($projects as $project)
                    <div class="item d-flex flex-column justify-content-between align-items-center">
                        <div class="id-title d-flex justify-content-between align-items-center">
                            <div>
                                <small># :</small> <span class="fs-2">{{$project->id}}</span>
                            </div>
                            <div>
                                <a href="{{route('admin.projects.show', $project->slug)}}" title="View Project" class="fs-4">
                                    {{$project->title}}
                                </a>
                            </div>
                        </div>
                        <div class="project-preview-pic">

                            @if($project->project_image)
                            <img src="{{ asset('storage/' . $project->project_image) }}" alt="{{$project->title}}">
                            @else
                            <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt="placeholder project image">
                            @endif
                            <div class="glitched-layover"></div>
                            <a href="{{route('admin.projects.show', $project->slug)}}" class="d-block pic-layover"></a>
                        </div>
                        <div>{{Str::limit($project->description,100)}}</div>
                        <div class="item-bottom d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div><a class="edit-btn d-flex justify-content-center align-items-center" href="{{route('admin.projects.edit', $project->slug)}}" title="Edit Project"><i class="fa-solid fa-pen"></i></a></div>
                                <div>
                                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button ms-3" data-item-title="{{$project->title}}"><i class="fa-solid fa-trash-can"></i></button>
                                 </form>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <i class="fa-solid fa-folder-open me-2"></i>
                                    {{$project->category ? $project->category->name : 'Senza categoria'}}
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
        </div>
    </section>

    @include('partials.admin.modal-delete')
@endsection
