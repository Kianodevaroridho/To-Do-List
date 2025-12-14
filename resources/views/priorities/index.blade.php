@extends('layouts.admin')

@section('title', 'Priorities')

@section('content')
<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <h4>Daftar Prioritas Task</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('priorities.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Priority
            </a>

            {{-- Menggunakan class Bootstrap untuk styling tabel dan menambah card --}}
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        {{-- Mengatur lebar kolom agar proporsional dan data level terlihat jelas --}}
                        <th style="width: 50%;">Nama</th>
                        <th style="width: 20%;">Level</th>
                        <th style="width: 30%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($priorities as $priority)
                        <tr>
                            <td>
                                {{ $priority->name }}
                                {{-- Opsi: Menampilkan badge untuk visualisasi cepat --}}
                                @if ($priority->level == 1)
                                    <span class="badge badge-danger ml-2">URGENT</span>
                                @elseif ($priority->level == 2)
                                    <span class="badge badge-warning ml-2">High</span>
                                @elseif ($priority->level == 3)
                                    <span class="badge badge-info ml-2">Medium</span>
                                @else
                                    <span class="badge badge-secondary ml-2">Low</span>
                                @endif
                            </td>
                            <td>
                                {{ $priority->level }}
                            </td>
                            <td>
                                {{-- Menggunakan d-flex untuk merapikan tombol aksi --}}
                                <div class="d-flex flex-nowrap">
                                    <a href="{{ route('priorities.edit', $priority) }}" class="btn btn-warning btn-sm mr-1">Edit</a>

                                    <form action="{{ route('priorities.destroy', $priority) }}"
                                          method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus prioritas ini?')">Hapus</button>
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