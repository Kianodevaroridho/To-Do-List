@extends('layouts.admin')

@section('title', 'Tasks')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Daftar Tugas Anda</h4>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Task
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        {{-- Lebar kolom disesuaikan untuk Due Date --}}
                        <th style="width: 25%;">Judul</th>
                        <th style="width: 15%;">Due Date</th> {{-- <== KOLOM BARU --}}
                        <th style="width: 10%;">Priority</th>
                        <th style="width: 20%;">Category</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        
                        {{-- KOLOM DUE DATE BARU DENGAN LOGIKA OVERDUE --}}
                        <td>
                            @if ($task->due_date)
                                @php
                                    // Menggunakan Carbon untuk memproses tanggal
                                    $dueDate = \Carbon\Carbon::parse($task->due_date);
                                @endphp
                                
                                {{-- Cek jika sudah lewat tanggal DAN task belum selesai --}}
                                @if ($dueDate->isPast() && !$task->is_done)
                                    <span class="badge badge-danger">OVERDUE</span> 
                                    <br>
                                    <small>{{ $dueDate->format('d M Y') }}</small>
                                {{-- Jika belum lewat atau sudah selesai --}}
                                @else
                                    <span class="badge badge-success">{{ $dueDate->format('d M Y') }}</span>
                                @endif
                            @else
                                <span class="badge badge-secondary">Tidak Ada</span>
                            @endif
                        </td>
                        
                        {{-- Kolom Priority (Menambahkan badge opsional) --}}
                        <td>
                            @if ($task->priority)
                                @if ($task->priority->level == 1)
                                    <span class="badge badge-danger">{{ $task->priority->name }}</span>
                                @elseif ($task->priority->level == 2)
                                    <span class="badge badge-warning">{{ $task->priority->name }}</span>
                                @else
                                    <span class="badge badge-secondary">{{ $task->priority->name }}</span>
                                @endif
                            @else
                                -
                            @endif
                        </td>
                        
                        {{-- Kolom Category --}}
                        <td>
                            @foreach($task->categories as $cat)
                                <span class="badge badge-info mr-1 mb-1">{{ $cat->name }}</span>
                            @endforeach
                        </td>
                        
                        {{-- Kolom Status --}}
                        <td>
                            @if ($task->is_done)
                                <span class="badge badge-success">Selesai</span>
                            @else
                                <span class="badge badge-warning">Belum</span>
                            @endif
                        </td>
                        
                        {{-- Kolom Aksi --}}
                        <td>
                            <div class="d-flex flex-nowrap">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info mr-1">Edit</a>
                                
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus task ini?')">Hapus</button>
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