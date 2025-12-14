@extends('layouts.admin')

@section('title', 'Tambah Priority')

@section('content')
<div class="container-fluid">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Priority</h3>
        </div>

        <form method="POST" action="{{ route('priorities.store') }}">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Priority</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <input type="number" name="level" class="form-control" required>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('priorities.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </div>

</div>
@endsection
