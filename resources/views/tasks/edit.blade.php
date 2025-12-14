@extends('layouts.admin')

@section('title', 'Edit Task')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Edit Task: {{ $task->title }}</h4>
        </div>
        <div class="card-body">
            
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- 1. Input Judul --}}
                <div class="form-group">
                    <label for="title">Judul Task</label>
                    <input name="title" id="title" 
                           value="{{ old('title', $task->title) }}" 
                           class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 2. Input Deskripsi --}}
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" 
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <hr>
                
                {{-- 3. Input Tanggal Jatuh Tempo (DUE DATE BARU) --}}
                <div class="form-group">
                    <label for="due_date">Tanggal Jatuh Tempo (Opsional)</label>
                    <input type="date" name="due_date" id="due_date" 
                           value="{{ old('due_date', $task->due_date) }}" 
                           class="form-control @error('due_date') is-invalid @enderror">
                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 4. Input Prioritas --}}
                <div class="form-group">
                    <label for="priority_id">Prioritas</label>
                    <select name="priority_id" id="priority_id" 
                            class="form-control @error('priority_id') is-invalid @enderror" required>
                        @foreach($priorities as $priority)
                        <option value="{{ $priority->id }}" 
                            {{ old('priority_id', $task->priority_id) == $priority->id ? 'selected' : '' }}>
                            {{ $priority->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('priority_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- 5. Input Kategori --}}
                <div class="form-group">
                    <label>Kategori</label><br>
                    @php
                        // Menggunakan old() untuk persistensi setelah error validasi
                        $oldCategories = old('categories');
                        $selectedCategories = $oldCategories ? $oldCategories : $task->categories->pluck('id')->toArray();
                    @endphp
                    @foreach($categories as $category)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="categories[]" id="cat-{{ $category->id }}" value="{{ $category->id }}"
                               {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                        <label class="form-check-label" for="cat-{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                    @endforeach
                    @error('categories')
                        <div class="text-danger mt-1">Pilih setidaknya satu kategori (Opsional).</div>
                    @enderror
                </div>
                
                <hr>

                {{-- 6. Input Status Selesai --}}
                <div class="form-group">
                    <label>Status Task</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_done" id="is_done" value="1"
                               {{ old('is_done', $task->is_done) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_done">
                            Tandai Sebagai Selesai
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Batal</a>
            </form>

        </div>
    </div>
</div>
@endsection