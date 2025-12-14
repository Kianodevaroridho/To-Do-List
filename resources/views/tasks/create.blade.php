@extends('layouts.admin')

@section('title', 'Tambah Task')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Task Baru</h3>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="card-body">

                {{-- 1. Judul Task --}}
                <div class="form-group">
                    <label for="title">Judul Task</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 2. Deskripsi --}}
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <hr>
                
                {{-- 3. Tanggal Jatuh Tempo (FITUR BARU) --}}
                <div class="form-group">
                    <label for="due_date">Tanggal Jatuh Tempo (Opsional)</label>
                    <input type="date" name="due_date" id="due_date" 
                           class="form-control @error('due_date') is-invalid @enderror"
                           value="{{ old('due_date') }}">
                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 4. Priority --}}
                <div class="form-group">
                    <label for="priority_id">Priority</label>
                    <select name="priority_id" id="priority_id" class="form-control @error('priority_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Priority --</option>
                        @foreach($priorities as $priority)
                            <option value="{{ $priority->id }}" {{ old('priority_id') == $priority->id ? 'selected' : '' }}>
                                {{ $priority->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('priority_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 5. Category --}}
                <div class="form-group">
                    <label>Category</label><br>
                    @foreach($categories as $category)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="categories[]"
                                   value="{{ $category->id }}"
                                   id="cat-{{ $category->id }}"
                                   {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat-{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('categories')
                        <div class="text-danger mt-1">Pilih setidaknya satu kategori (Opsional).</div>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Task
                </button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>

</div>
@endsection