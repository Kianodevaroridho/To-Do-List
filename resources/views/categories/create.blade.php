@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
