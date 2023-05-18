@extends('layouts.admin.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->cat_name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td><img src="{{ $item->image ?? null }}" /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
