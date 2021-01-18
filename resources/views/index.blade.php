@extends('master')
@section('title') Posts Listing @endsection
@section('content')

<style>
    svg.w-5.h-5{
        width: 25px !important;
    }
    span.relative.z-0.inline-flex.shadow-sm.rounded-md{
        float: right !important;
    }
</style>

<div class="row">
    <div class="col-xl-6">
        <div id="result"></div>
    </div>

    <div class="col-xl-6 text-right">
        <a href="javascript:void(0);" data-target="#addPostModal" data-toggle="modal" class="btn btn-success"> Add New </a>
    </div>
</div>

<table class="table table-striped mt-4">
    <thead>
        <th> Post Id </th>
        <th> Title </th>
        <th> Description </th>
        <th> Action </th>
    </thead>

    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td> {{$post->id}} </td>
                <td> {{$post->title}} </td>
                <td> {{$post->description}} </td>
                <td>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-description="{{$post->description}}" data-action="view" class="btn btn-info btn-sm"> View </a>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addPostModal" data-id="{{$post->id}}" data-title="{{$post->title}}" data-description="{{$post->description}}" data-action="edit" class="btn btn-success btn-sm"> Edit </a>
                    <a href="javascript:void(0);" onclick="deletePost({{$post->id}})" class="btn btn-danger btn-sm"> Delete </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Create post modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addPostModalLabel"> Create Post </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> × </span>
            </button>
        </div>

        <div class="modal-body">
            <form method="POST" id="postForm">
                {{-- @csrf --}}
                <input type="hidden" id="id_hidden" name="id" />
                <div class="form-group">
                    <label for="title"> Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title"> Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="submit" id="createBtn" class="btn btn-primary"> Save </button>
        </div>

        <div class="result"></div>

        </div>
    </div>
</div>

{!! $posts->links() !!}

@endsection