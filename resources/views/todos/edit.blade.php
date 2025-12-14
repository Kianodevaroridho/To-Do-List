@extends('layouts.admin')

@section('title', 'Edit To-Do')

@section('content')
<div class="container-fluid">
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" class="form-control"
                   value="{{ $todo->title }}" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $todo->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            @foreach($categories as $category)
                <div class="form-check">
                    <input type="checkbox" name="categories[]"
                           value="{{ $category->id }}"
                           class="form-check-input"
                           {{ $todo->categories->contains($category->id) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="is_done" class="form-check-input"
                   {{ $todo->is_done ? 'checked' : '' }}>
            <label class="form-check-label">Selesai</label>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
