@extends('layouts.admin.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Category</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="catName" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="catName" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Leave a comment here"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
