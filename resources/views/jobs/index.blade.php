@extends('layouts.main')

@section('title', 'Portal Lowongan Kerja PT MIESTAR')

@section('content')

<!-- Hero Section Identitas UTS (Tema Orange Cokelat) -->
<div class="hero-banner mb-4">
    <div class="container text-center text-white py-5 rounded-3 shadow-sm">
        <!-- Logo PT MIESTAR / job11.png -->
        <div class="mb-3">
            <img src="{{ asset('assets/images/job11.png') }}" alt="Logo PT MIESTAR" style="max-height: 100px; width: auto;" class="img-fluid bg-white p-2 rounded-circle shadow-sm">
        </div>
        <h1 class="display-4 fw-bold mb-2">PORTAL LOWONGAN KERJA PT MIESTAR</h1>
        <p class="lead fs-4 mb-3">Sistem Informasi Karir Terintegrasi</p>
        <hr class="w-25 mx-auto border-light my-3">
        <div class="badge bg-light text-brand-brown fs-5 px-4 py-2 mb-2 shadow-sm fw-bold">Feliskha Dwi Anindi</div>
        <div class="d-block text-white-50 fs-6">NIM: 251011700445 | Kelas: 03SIFE004 | Prodi Sistem Informasi</div>
    </div>
</div>

<!-- Main Content / Job Cards -->
<div class="container pb-5">
    
    <!-- Baris Search & Indicator -->
    <div class="row align-items-center mb-4 g-3">
        <div class="col-md-7 col-lg-8">
            <form action="{{ route('jobs.index') }}" method="GET">
                <div class="input-group input-group-lg shadow-sm">
                    <span class="bg-white border-end-0 input-group-text"><i class="bi bi-search text-brand-orange"></i></span>
                    <input type="text" name="search" class="border-start-0 form-control fs-5" placeholder="Cari posisi pekerjaan, perusahaan, atau lokasi..." value="{{ $search ?? '' }}">
                    <button class="btn btn-brand-orange px-4 fs-5" type="submit">Cari</button>
                    @if($search)
                        <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary fs-5">Reset</a>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-md-5 col-lg-4 text-md-end">
            <span class="badge bg-brand-brown fs-5 px-4 py-3 shadow-sm rounded-3">
                <i class="bi bi-briefcase me-2"></i> {{ $jobs->total() }} Posisi Tersedia
            </span>
        </div>
    </div>

    <!-- Job Cards Grid (Layout 2-2-1) -->
    <div class="row g-4 mb-4 justify-content-center">
        @forelse($jobs as $job)
        <div class="col-md-6">
            <div class="border-0 shadow-sm card h-100 rounded-4 overflow-hidden p-3 bg-white">
                
                <!-- Container Gambar Lowongan -->
                <div class="job-card-image-container rounded-3" style="height: 230px; display: flex; align-items: center; justify-content: center; background-color: #fdfaf7;">
                    <img src="{{ asset('assets/images/' . ($job->image ?? 'job1.png')) }}" alt="{{ $job->title }}" style="max-height: 190px; width: auto; object-fit: contain;">
                </div>

                <div class="p-4 card-body d-flex flex-column">
                    <span class="mb-2 badge bg-warning text-dark align-self-start fs-6 px-3 py-2 fw-bold">{{ $job->type }}</span>
                    
                    <!-- Judul Lowongan -->
                    <h3 class="mb-1 card-title fw-bold text-brand-orange">{{ $job->title }}</h3>
                    
                    <!-- Teks Kualifikasi Gender -->
                    <p class="text-secondary fs-6 fw-semibold mb-3">
                        <i class="bi bi-gender-ambiguous me-1 text-brand-orange fs-5"></i>
                        {{ $job->title == 'Waiters' ? 'Perempuan / Laki-laki' : 'Laki-laki / Perempuan' }}
                    </p>

                    <p class="mb-2 card-text text-secondary fs-5"><i class="bi bi-building me-2 text-brand-brown"></i>{{ $job->company }}</p>
                    <p class="mb-2 card-text text-secondary fs-5"><i class="bi bi-geo-alt me-2 text-brand-brown"></i>{{ $job->location }}</p>
                    <p class="mb-4 fw-bold text-success fs-4">{{ $job->salary }}</p>
                    
                    <a href="{{ route('jobs.show', $job->id) }}" class="mt-auto btn btn-brand-orange btn-lg w-100 shadow-sm fs-5 py-2">
                        Lihat Detail <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="pb-3 px-4 border-0 card-footer bg-white text-muted fs-6">
                    <i class="bi bi-clock me-1"></i>Diposting: {{ date('d M Y', strtotime($job->posted_date)) }}
                </div>
            </div>
        </div>
        @empty
        <div class="py-5 text-center col-12">
            <div class="mb-3 text-muted fs-1"><i class="bi bi-search"></i></div>
            <h4 class="text-secondary">Lowongan tidak ditemukan</h4>
            <p class="text-muted">Coba kata kunci pencarian yang lain.</p>
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-brand-orange mt-2 fs-5">Lihat Semua Lowongan</a>
        </div>
        @endforelse
    </div>

    <!-- Tombol Navigasi Halaman / Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $jobs->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection