@extends('layouts.main')

@section('title', 'Detail Lowongan - ' . $job->title)

@section('content')

<!-- Hero Banner Orange Cokelat Identitas UTS -->
<div class="hero-banner mb-4 text-center text-white py-5 rounded-3 shadow-sm">
    <div class="container">
        <!-- Logo PT MIESTAR / job11.png -->
        <div class="mb-3">
            <img src="{{ asset('assets/images/job11.png') }}" alt="Logo PT MIESTAR" style="max-height: 90px; width: auto;" class="img-fluid bg-white p-2 rounded-circle shadow-sm">
        </div>
        <h1 class="display-4 fw-bold mb-2">PORTAL LOWONGAN KERJA PT MIESTAR</h1>
        <p class="lead fs-4 mb-2">Sistem Informasi Karir Terintegrasi</p>
        <hr class="w-25 mx-auto border-light my-3">
        <div class="badge bg-light text-brand-brown fs-5 px-4 py-2 mb-2 shadow-sm fw-bold">Feliskha Dwi Anindi</div>
        <div class="d-block text-white-50 fs-6">NIM: 251011700445 | Kelas: 03SIFE004 | Prodi Sistem Informasi</div>
    </div>
</div>

<div class="container pb-5">

    <!-- Notifikasi Sukses Lamaran -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm fs-5 p-4 mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2 fs-4"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary btn-lg mb-4 shadow-sm fs-5">
        <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar
    </a>

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden bg-white">
        <div class="row g-0">
            <div class="col-md-4 bg-white d-flex align-items-center justify-content-center p-4 border-end">
                <img src="{{ asset('assets/images/' . ($job->image ?? 'job1.png')) }}" 
                     class="img-fluid rounded-3" 
                     alt="{{ $job->title }}" 
                     style="max-height: 280px; object-fit: contain;">
            </div>
            <div class="col-md-8">
                <div class="card-body p-4 p-md-5">
                    <span class="badge bg-warning text-dark fs-6 px-3 py-2 mb-2 fw-bold">{{ $job->type }}</span>
                    <h1 class="fw-bold text-brand-orange mb-1 display-6">{{ $job->title }}</h1>
                    
                    <!-- Keterangan Gender di Halaman Detail -->
                    <p class="text-secondary fs-5 fw-semibold mb-3">
                        <i class="bi bi-gender-ambiguous me-1 text-brand-orange fs-4"></i>
                        Kualifikasi: {{ $job->title == 'Waiters' ? 'Perempuan / Laki-laki' : 'Laki-laki / Perempuan' }}
                    </p>

                    <h4 class="text-secondary mb-4"><i class="bi bi-building me-2 text-brand-brown"></i>{{ $job->company }}</h4>
                    
                    <div class="row mb-4 bg-light p-4 rounded-3 g-3 fs-5 border">
                        <div class="col-sm-6">
                            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                            <strong>Lokasi:</strong> {{ $job->location }}
                        </div>
                        <div class="col-sm-6">
                            <i class="bi bi-cash-stack text-success me-2"></i>
                            <strong>Gaji:</strong> {{ $job->salary }}
                        </div>
                        <div class="col-sm-6">
                            <i class="bi bi-calendar-event text-warning me-2"></i>
                            <strong>Tanggal Posting:</strong> {{ date('d M Y', strtotime($job->posted_date)) }}
                        </div>
                    </div>

                    <h4 class="fw-bold">Deskripsi Pekerjaan</h4>
                    <p class="text-secondary fs-5 mb-4 leading-relaxed">{{ $job->description }}</p>

                    <h4 class="fw-bold">Persyaratan / Requirements</h4>
                    <p class="text-secondary fs-5 mb-4 leading-relaxed">{{ $job->requirements }}</p>

                    <!-- Tombol Lamar Pemicu Modal -->
                    <button class="btn btn-brand-orange btn-lg px-5 py-3 shadow fs-4 rounded-3" data-bs-toggle="modal" data-bs-target="#modalLamar">
                        <i class="bi bi-send-fill me-2"></i> Lamar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FORM LAMARAN KERJA -->
<div class="modal fade" id="modalLamar" tabindex="-1" aria-labelledby="modalLamarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-brand-orange text-white py-3">
                <h4 class="modal-title fw-bold" id="modalLamarLabel">
                    <i class="bi bi-briefcase-fill me-2"></i> Form Lamaran: {{ $job->title }}
                </h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
                @csrf
                <div class="modal-body p-4 p-md-5 fs-5">
                    <p class="text-secondary mb-4">Isi formulir di bawah ini untuk mengirimkan berkas lamaran Anda ke <strong>{{ $job->company }}</strong>.</p>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_pelamar" class="form-control form-control-lg fs-5" placeholder="Contoh: Feliskha Dwi Anindi" required>
                    </div>

                    <!-- Input Pilihan Jenis Kelamin -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-select form-select-lg fs-5" required>
                            <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control form-control-lg fs-5" placeholder="nama@email.com" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">No. WhatsApp / HP <span class="text-danger">*</span></label>
                        <input type="text" name="no_hp" class="form-control form-control-lg fs-5" placeholder="081234567890" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Catatan Singkat / Link Portofolio</label>
                        <textarea name="catatan" class="form-control form-control-lg fs-5" rows="4" placeholder="Tuliskan pengalaman singkat atau cantumkan link LinkedIn / GitHub Anda..."></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-secondary btn-lg px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-brand-orange btn-lg px-5">
                        <i class="bi bi-paperplane-fill me-2"></i> Kirim Lamaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection