@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    
    {{-- Menggunakan Card untuk membingkai dan memberi latar putih --}}
    <div class="card shadow mb-4 p-4">
        
        {{-- Judul Dashboard yang Mencolok --}}
        <h1 class="display-3 text-dark font-weight-bold mb-3 border-bottom pb-2">
            Dashboard
        </h1>
        
        {{-- Kalimat Sambutan yang Ditingkatkan Estetikanya --}}
        <p class="h4 text-primary mt-4">
            Selamat datang di aplikasi To-Do List.
        </p>

        {{-- Paragraf tambahan yang lebih halus --}}
        <p class="text-secondary mt-3">
            Gunakan antarmuka ini untuk mengelola semua tugas dan prioritas Anda.
        </p>
        
    </div>

</div>
@endsection