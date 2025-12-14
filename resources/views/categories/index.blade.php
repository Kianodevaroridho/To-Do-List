@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <h4>Daftar Kategori Task</h4>
        </div>
        <div class="card-body">
            
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
            
            {{-- Menampilkan notifikasi success dengan alert Bootstrap --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Menggunakan class Bootstrap untuk styling tabel --}}
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        {{-- Mengatur lebar kolom agar Judul dapat ruang besar --}}
                        <th style="width: 70%;">Nama</th>
                        <th style="width: 30%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            {{-- Menggunakan d-flex untuk merapikan tombol aksi --}}
                            <div class="d-flex flex-nowrap">
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="btn btn-warning btn-sm mr-1">Edit</a>

                                <form action="{{ route('categories.destroy', $category) }}"
                                      method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
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