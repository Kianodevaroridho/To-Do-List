@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('todos.store') }}">
    @csrf

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
