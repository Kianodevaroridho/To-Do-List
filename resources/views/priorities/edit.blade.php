@extends('layouts.admin')

@section('title', 'Edit Priority')

@section('content')
<div class="container-fluid">

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Priority</h3>
        </div>

        <form method="POST" action="{{ route('priorities.update', $priority) }}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Priority</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $priority->name }}" required>
                </div>

                <div class="form-group">
                    <label>Level</label>
                    <input type="number" name="level" class="form-control"
                           value="{{ $priority->level }}" required>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-warning">Update</button>
                <a href="{{ route('priorities.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </div>

</div>
@endsection
