@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Edit Kategori: {{ $category->name }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('categories.update', $category) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="name"
                           value="{{ old('name', $category->name) }}"
                           class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Kategori</button>
            </form>
        </div>
    </div>
</div>
@endsection