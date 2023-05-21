@extends('layouts.admin.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Category</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="hidden" value="{{ $category->id }}" />
                    <label for="catName" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="catName"
                        value="{{ $category->name ?? null }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description*</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Leave a comment here">{{ $category->description ?? null }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img src="{{ $category->image ?? null }}" width="100px" height="100px" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
