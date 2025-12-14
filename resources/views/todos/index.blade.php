@extends('layouts.admin')

@section('title', 'To-Do List')

@section('content')
<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <h4>Daftar To-Do</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah To-Do
            </a>

            {{-- Menggunakan class Bootstrap untuk styling tabel --}}
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        {{-- Mengatur lebar kolom agar proporsional --}}
                        <th style="width: 55%;">Judul</th>
                        <th style="width: 15%;">Status</th>
                        <th style="width: 30%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->title }}</td>
                            <td>
                                @if($todo->is_done)
                                    {{-- Menggunakan badge-success (hijau) untuk Selesai --}}
                                    <span class="badge badge-success">Selesai</span>
                                @else
                                    {{-- Menggunakan badge-warning (kuning) untuk Belum --}}
                                    <span class="badge badge-warning">Belum</span> 
                                @endif
                            </td>
                            <td>
                                {{-- Menggunakan d-flex untuk merapikan tombol aksi --}}
                                <div class="d-flex flex-nowrap">
                                    <a href="{{ route('todos.edit', $todo) }}" class="btn btn-sm btn-warning mr-1">Edit</a>
                                    
                                    <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus To-Do ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection