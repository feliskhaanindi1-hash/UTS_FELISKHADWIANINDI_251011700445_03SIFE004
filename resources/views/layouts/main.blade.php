<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT MIESTAR - Job Portal')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        /* Palette Warna Orange Cokelat PT MIESTAR */
        :root {
            --brand-orange: #d9531e;        
            --brand-orange-hover: #b83d0f;  
            --brand-brown: #5c3218;         
            --brand-brown-light: #7a4321;   
            --brand-bg-light: #fff8f3;      
        }

        body {
            background-color: #fcf8f5 !important;
        }

        .bg-brand-orange {
            background-color: var(--brand-orange) !important;
        }

        .bg-brand-brown {
            background-color: var(--brand-brown) !important;
        }

        .text-brand-orange {
            color: var(--brand-orange) !important;
        }

        .text-brand-brown {
            color: var(--brand-brown) !important;
        }

        /* Tombol Orange Cokelat */
        .btn-brand-orange {
            background-color: var(--brand-orange);
            color: #ffffff;
            border: none;
        }
        .btn-brand-orange:hover {
            background-color: var(--brand-orange-hover);
            color: #ffffff;
        }

        .btn-brand-brown {
            background-color: var(--brand-brown);
            color: #ffffff;
            border: none;
        }
        .btn-brand-brown:hover {
            background-color: #42230f;
            color: #ffffff;
        }

        .btn-outline-brand-orange {
            color: var(--brand-orange);
            border-color: var(--brand-orange);
        }
        .btn-outline-brand-orange:hover {
            background-color: var(--brand-orange);
            color: #ffffff;
        }

        /* Nav Tabs Modal Status Lamaran */
        .nav-tabs-custom .nav-link {
            color: #6c757d;
            font-weight: 600;
            border: none;
            border-bottom: 3px solid transparent;
            font-size: 1.1rem;
        }
        .nav-tabs-custom .nav-link.active {
            color: var(--brand-orange) !important;
            border-bottom: 3px solid var(--brand-orange) !important;
            background: none !important;
        }

        /* Filter Pills Status */
        .status-pill {
            border-radius: 50rem;
            padding: 0.4rem 1.2rem;
            font-size: 0.95rem;
            font-weight: 500;
            border: 1px solid #dee2e6;
            color: #495057;
            background-color: #ffffff;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }
        .status-pill:hover {
            background-color: #f8f9fa;
            border-color: var(--brand-orange);
            color: var(--brand-orange);
        }
        .status-pill.active {
            background-color: var(--brand-orange) !important;
            color: #ffffff !important;
            border-color: var(--brand-orange) !important;
        }

        /* Banner Gradasi Orange Cokelat */
        .hero-banner {
            background: linear-gradient(135deg, var(--brand-orange) 0%, var(--brand-brown) 100%);
        }

        .job-card-image-container img {
            transition: transform 0.2s ease-in-out;
        }
        .job-card-image-container img:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR DENGAN MENU STATUS LAMARAN -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-brand-orange shadow-sm sticky-top py-3">
        <div class="container">
            <!-- Brand Logo & Nama Perusahaan -->
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="{{ route('jobs.index') }}">
                <img src="{{ asset('assets/images/job11.png') }}" alt="Logo" width="45" height="45" class="d-inline-block align-text-top me-2 bg-white rounded-circle p-1 shadow-sm">
                PT MIESTAR
            </a>

            <!-- Toggle Button Mobile -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navigasi Presisi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 fw-semibold fs-5">
                    <li class="nav-item px-1">
                        <a class="nav-link active text-white" href="{{ route('jobs.index') }}">
                            <i class="bi bi-house-door-fill me-1"></i> Beranda
                        </a>
                    </li>
                    <!-- Menu Status Lamaran -->
                    <li class="nav-item px-1">
                   <!-- Modal Status Lamaran Saya (Aman 100% Tanpa Fitur Update/CRUD) -->
<div class="modal fade" id="modalStatusLamaran" tabindex="-1" aria-labelledby="modalStatusLamaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow">
            
            <!-- Modal Header -->
            <div class="modal-header text-white" style="background-color: #d35400;">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="modalStatusLamaranLabel">
                    <i class="bi bi-briefcase"></i> Status Lamaran Saya
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                
                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs mb-3 border-bottom" id="statusTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-semibold" style="color: #d35400; border-color: #d35400 #d35400 #fff;" id="proses-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab">
                            Proses Seleksi ({{ session('user_applications') ? count(session('user_applications')) : 1 }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-muted" id="hasil-tab" data-bs-toggle="tab" data-bs-target="#hasil" type="button" role="tab">
                            Hasil Seleksi (0)
                        </button>
                    </li>
                </ul>

                <!-- Filter Badges -->
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge rounded-pill text-white px-3 py-2" style="background-color: #d35400;">Semua</span>
                    <span class="badge rounded-pill border text-secondary px-3 py-2 bg-light">Direview</span>
                    <span class="badge rounded-pill border text-secondary px-3 py-2 bg-light">Terseleksi</span>
                    <span class="badge rounded-pill border text-secondary px-3 py-2 bg-light">Diundang Wawancara</span>
                    <span class="badge rounded-pill border text-secondary px-3 py-2 bg-light">Wawancara Terjadwal</span>
                </div>

                <div class="text-muted small mb-3">
                    <i class="bi bi-info-circle text-warning me-1"></i> Lihat arti dari setiap status lamaranmu <a href="#" class="text-danger text-decoration-underline">disini</a>.
                </div>

                <!-- Content Tab -->
                <div class="tab-content" id="statusTabContent">
                    <div class="tab-pane fade show active" id="proses" role="tabpanel">
                        
                        @if(session()->has('user_applications') && count(session('user_applications')) > 0)
                            @foreach(session('user_applications') as $app)
                                <!-- Item Card Lamaran (Dinamis dari Session) -->
                                <div class="card border rounded-3 p-3 mb-3 shadow-sm bg-white">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                        
                                        <!-- Left Side: Icon & Detail Info -->
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-light p-2 rounded-3 border d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                                <i class="bi bi-person-workspace fa-2x text-dark"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1" style="color: #d35400;">{{ $app['job_title'] ?? 'Restaurant Manager' }}</h6>
                                                <div class="text-muted small">
                                                    <i class="bi bi-building me-1"></i> {{ $app['company'] ?? 'PT MIESTAR' }} 
                                                    <span class="mx-1">|</span> 
                                                    <i class="bi bi-person me-1"></i> Pelamar: <strong>{{ $app['nama_pelamar'] ?? 'Feliskha Dwi Anindi' }}</strong>
                                                </div>
                                                <div class="text-muted small mt-1">
                                                    <i class="bi bi-clock me-1"></i> Dikirim: {{ $app['applied_at'] ?? '23 Oct 2026 12:03' }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Side: Badge Status Statis (Tanpa Tombol Ubah) -->
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-warning text-dark px-3 py-2 rounded-2 fw-bold d-flex align-items-center gap-1">
                                                <i class="bi bi-hourglass-split"></i> {{ $app['status'] ?? 'Direview' }}
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Default Tampilan Statis -->
                            <div class="card border rounded-3 p-3 mb-3 shadow-sm bg-white">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-light p-2 rounded-3 border d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                            <i class="bi bi-person-workspace fs-3 text-dark"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1" style="color: #d35400;">Restaurant Manager</h6>
                                            <div class="text-muted small">
                                                <i class="bi bi-building me-1"></i> PT MIESTAR 
                                                <span class="mx-1">|</span> 
                                                <i class="bi bi-person me-1"></i> Pelamar: <strong>Feliskha Dwi Anindi</strong>
                                            </div>
                                            <div class="text-muted small mt-1">
                                                <i class="bi bi-clock me-1"></i> Dikirim: 23 Oct 2026 12:03
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status Badge Statis Aman -->
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-warning text-dark px-3 py-2 rounded-2 fw-bold d-flex align-items-center gap-1">
                                            <i class="bi bi-hourglass-split"></i> Direview
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="tab-pane fade" id="hasil" role="tabpanel">
                        <div class="text-center py-4 text-muted">
                            <i class="bi bi-folder2-open fs-1 mb-2 text-secondary"></i>
                            <p class="mb-0">Belum ada hasil seleksi yang selesai.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn text-white fw-semibold px-4" style="background-color: #4a2311;" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>
                    <li class="nav-item px-1">
                        <a class="nav-link text-white-50" href="#" data-bs-toggle="modal" data-bs-target="#modalTentang">
                            <i class="bi bi-building me-1"></i> Tentang MIESTAR
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link text-white-50" href="#" data-bs-toggle="modal" data-bs-target="#modalKategori">
                            <i class="bi bi-grid-fill me-1"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="nav-link text-white-50" href="#" data-bs-toggle="modal" data-bs-target="#modalKontak">
                            <i class="bi bi-telephone-fill me-1"></i> Kontak
                        </a>
                    </li>
                </ul>

                <!-- Badge Mahasiswa (Identitas UTS) -->
                <span class="badge bg-light text-brand-brown fs-6 px-3 py-2 shadow-sm rounded-pill fw-bold">
                    <i class="bi bi-person-badge-fill me-1 text-brand-orange"></i> Feliskha Dwi Anindi
                </span>
            </div>
        </div>
    </nav>

    <!-- CONTENT UTAMA -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white text-center text-muted py-4 border-top mt-auto fs-6">
        <div class="container">
            &copy; 2026 <strong>PT MIESTAR</strong>. Developed by <strong class="text-brand-orange">Feliskha Dwi Anindi</strong> (NIM: 251011700445) - UNPAM.
        </div>
    </footer>

    @php
        $myApplications = session()->get('user_applications', []);
    @endphp

    <!-- MODAL MENU TAMBAHAN: STATUS LAMARAN (OTOMATIS PINDAH REALTIME) -->
    <div class="modal fade" id="modalStatusLamaran" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                
                <!-- Header Modal -->
                <div class="modal-header bg-brand-orange text-white py-3">
                    <h4 class="modal-title fw-bold">
                        <i class="bi bi-briefcase-fill me-2"></i> Status Lamaran Saya
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0">
                    
                    <!-- Nav Tabs: Proses Seleksi vs Hasil Seleksi -->
                    <ul class="nav nav-tabs nav-justified nav-tabs-custom border-bottom" id="lamaranTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active py-3" id="proses-tab" data-bs-toggle="tab" data-bs-target="#proses-content" type="button" role="tab">
                                Proses Seleksi (<span id="count-proses">{{ count($myApplications) }}</span>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link py-3" id="hasil-tab" data-bs-toggle="tab" data-bs-target="#hasil-content" type="button" role="tab">
                                Hasil Seleksi (<span id="count-hasil">0</span>)
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content p-4" id="lamaranTabContent">
                        
                        <!-- TAB 1: PROSES SELEKSI -->
                        <div class="tab-pane fade show active" id="proses-content" role="tabpanel">
                            
                            <!-- Filter Buttons -->
                            <div class="d-flex flex-nowrap overflow-auto gap-2 pb-3 mb-2">
                                <button type="button" class="status-pill active filter-btn-proses" onclick="filterProses('semua', this)">Semua</button>
                                <button type="button" class="status-pill filter-btn-proses" onclick="filterProses('Direview', this)">Direview</button>
                                <button type="button" class="status-pill filter-btn-proses" onclick="filterProses('Terseleksi', this)">Terseleksi</button>
                                <button type="button" class="status-pill filter-btn-proses" onclick="filterProses('Diundang Wawancara', this)">Diundang Wawancara</button>
                                <button type="button" class="status-pill filter-btn-proses" onclick="filterProses('Wawancara Terjadwal', this)">Wawancara Terjadwal</button>
                            </div>

                            <p class="text-muted small mb-3">
                                <i class="bi bi-info-circle me-1 text-brand-orange"></i>
                                Lihat arti dari setiap status lamaranmu <a href="#" class="text-brand-orange fw-bold">disini</a>.
                            </p>

                            <!-- Container Card Proses -->
                            <div class="d-flex flex-column gap-3" id="container-proses">
                                @if(count($myApplications) > 0)
                                    @foreach($myApplications as $app)
                                        <div class="card border rounded-3 p-3 shadow-sm item-lamaran" data-status="Direview" id="app-card-{{ $app['id'] }}">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('assets/images/' . $app['image']) }}" alt="{{ $app['job_title'] }}" style="width: 55px; height: 55px; object-fit: contain;" class="me-3 p-1 bg-light rounded border">
                                                    <div>
                                                        <h5 class="fw-bold text-brand-orange mb-1 title-job">{{ $app['job_title'] }}</h5>
                                                        <div class="text-muted small"><i class="bi bi-building me-1"></i> {{ $app['company'] }} | <i class="bi bi-person me-1"></i> Pelamar: {{ $app['nama_pelamar'] }}</div>
                                                        <div class="text-muted small"><i class="bi bi-clock me-1"></i> Dikirim: {{ $app['applied_at'] }}</div>
                                                    </div>
                                                </div>
                                                <div class="text-end action-area">
                                                    <!-- Dropdown Ubah Status Realtime -->
                                                    <div class="mb-1">
                                                        <select class="form-select form-select-sm fw-bold border-warning text-dark bg-warning" onchange="changeAppStatus('{{ $app['id'] }}', this)">
                                                            <option value="Direview" selected>⏳ Direview</option>
                                                            <option value="Terseleksi">🎯 Terseleksi</option>
                                                            <option value="Diundang Wawancara">✉️ Diundang Wawancara</option>
                                                            <option value="Wawancara Terjadwal">📅 Wawancara Terjadwal</option>
                                                            <option value="Diterima">🎉 Diterima (Pindah ke Hasil)</option>
                                                            <option value="Ditolak">❌ Ditolak (Pindah ke Hasil)</option>
                                                        </select>
                                                    </div>
                                                    <span class="badge bg-light text-dark border small">Ubah Status Simulasi</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Empty State Proses -->
                            <div class="text-center py-4 my-2 {{ count($myApplications) > 0 ? 'd-none' : '' }}" id="empty-proses">
                                <div class="mb-3">
                                    <div class="bg-light d-inline-flex p-3 rounded-circle text-brand-orange shadow-sm fs-1">
                                        <i class="bi bi-briefcase-fill"></i>
                                    </div>
                                </div>
                                <h3 class="fw-bold text-dark mb-2">Belum Ada Lamaran Kerja</h3>
                                <p class="text-muted fs-6 mb-4 max-w-md mx-auto">
                                    Mulai lamar kerja sekarang untuk melihat proses seleksimu di sini.
                                </p>
                                <a href="{{ route('jobs.index') }}" class="btn btn-brand-orange btn-lg px-4 fs-6" data-bs-dismiss="modal">
                                    Cari Lowongan
                                </a>
                            </div>

                        </div>

                        <!-- TAB 2: HASIL SELEKSI -->
                        <div class="tab-pane fade" id="hasil-content" role="tabpanel">
                            
                            <!-- Filter Buttons -->
                            <div class="d-flex flex-nowrap overflow-auto gap-2 pb-3 mb-2">
                                <button type="button" class="status-pill active filter-btn-hasil" onclick="filterHasil('semua', this)">Semua</button>
                                <button type="button" class="status-pill filter-btn-hasil" onclick="filterHasil('Ditolak', this)">Ditolak</button>
                                <button type="button" class="status-pill filter-btn-hasil" onclick="filterHasil('Diterima', this)">Diterima</button>
                            </div>

                            <p class="text-muted small mb-3">
                                <i class="bi bi-info-circle me-1 text-brand-orange"></i>
                                Lihat arti dari setiap status lamaranmu <a href="#" class="text-brand-orange fw-bold">disini</a>.
                            </p>

                            <!-- Container Card Hasil Seleksi -->
                            <div class="d-flex flex-column gap-3" id="container-hasil">
                                <!-- Card yang dipindahkan akan masuk ke sini otomatis -->
                            </div>

                            <!-- Empty State Hasil Seleksi -->
                            <div class="text-center py-4 my-2" id="empty-hasil">
                                <div class="mb-3">
                                    <div class="bg-light d-inline-flex p-3 rounded-circle text-muted shadow-sm fs-1">
                                        <i class="bi bi-file-earmark-x-fill"></i>
                                    </div>
                                </div>
                                <h3 class="fw-bold text-dark mb-2">Belum Ada Hasil Seleksi</h3>
                                <p class="text-muted fs-6 mb-4">
                                    Ubah status lamaran di tab Proses Seleksi menjadi "Diterima" atau "Ditolak" untuk melihatnya berpindah ke sini!
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-brand-brown btn-lg px-4" data-bs-dismiss="modal">Tutup</button>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL TENTANG, KATEGORI, KONTAK -->
    <div class="modal fade" id="modalTentang" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-brand-orange text-white py-3">
                    <h4 class="modal-title fw-bold"><i class="bi bi-building me-2"></i>Tentang PT MIESTAR</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-5 text-center">
                    <img src="{{ asset('assets/images/job11.png') }}" width="120" class="mb-4 bg-light p-2 rounded-circle shadow-sm">
                    <h3 class="fw-bold text-brand-orange mb-3">PT MIESTAR Indonesia</h3>
                    <p class="text-secondary fs-5 leading-relaxed">
                        PT MIESTAR adalah perusahaan berkembang di bidang <strong>F&B dan Kuliner</strong> berlokasi utama di <strong>Jakarta Selatan</strong>. Kami berkomitmen menyajikan produk kuliner berkualitas tinggi serta membuka kesempatan karir seluas-luasnya bagi talenta terbaik untuk tumbuh dan berkembang bersama kami.
                    </p>
                </div>
                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-brand-brown btn-lg px-4" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKategori" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-brand-orange text-white py-3">
                    <h4 class="modal-title fw-bold"><i class="bi bi-grid-fill me-2"></i>Kategori Pekerjaan</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="list-group fs-5">
                        <div class="list-group-item p-3 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-cup-hot me-3 text-warning fs-4"></i> Operasional & F&B (Barista, Waiters, Cook)</span>
                            <span class="badge bg-brand-orange fs-6 px-3 py-2 rounded-pill">5 Posisi</span>
                        </div>
                        <div class="list-group-item p-3 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-people me-3 text-success fs-4"></i> Manajemen & HRD</span>
                            <span class="badge bg-brand-orange fs-6 px-3 py-2 rounded-pill">3 Posisi</span>
                        </div>
                        <div class="list-group-item p-3 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-laptop me-3 text-info fs-4"></i> IT & Design (UI/UX, Support)</span>
                            <span class="badge bg-brand-orange fs-6 px-3 py-2 rounded-pill">2 Posisi</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-brand-brown btn-lg px-4" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalKontak" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-brand-orange text-white py-3">
                    <h4 class="modal-title fw-bold"><i class="bi bi-telephone-fill me-2"></i>Kontak & Alamat Kami</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-5 fs-5">
                    <div class="mb-4 d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-danger fs-2 me-3"></i>
                        <div>
                            <strong>Alamat Kantor:</strong>
                            <div class="text-muted">Jakarta Selatan, DKI Jakarta</div>
                        </div>
                    </div>
                    <div class="mb-4 d-flex align-items-center">
                        <i class="bi bi-envelope-fill text-brand-orange fs-2 me-3"></i>
                        <div>
                            <strong>Email HRD:</strong>
                            <div class="text-muted">hrd@miestar.co.id</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-whatsapp text-success fs-2 me-3"></i>
                        <div>
                            <strong>WhatsApp Recruitment:</strong>
                            <div class="text-muted">+62 812-3456-7890</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-brand-brown btn-lg px-4" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script JavaScript Pindah Card Realtime -->
    <script>
        function filterProses(status, element) {
            let buttons = document.querySelectorAll('.filter-btn-proses');
            buttons.forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');

            let items = document.querySelectorAll('#container-proses .item-lamaran');
            items.forEach(item => {
                if (status === 'semua' || item.getAttribute('data-status') === status) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function filterHasil(status, element) {
            let buttons = document.querySelectorAll('.filter-btn-hasil');
            buttons.forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');

            let items = document.querySelectorAll('#container-hasil .item-lamaran');
            items.forEach(item => {
                if (status === 'semua' || item.getAttribute('data-status') === status) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Fungsi Memindahkan Card secara Realtime saat Dropdown Diubah
        function changeAppStatus(appId, selectElement) {
            let newStatus = selectElement.value;
            let card = document.getElementById('app-card-' + appId);
            card.setAttribute('data-status', newStatus);

            if (newStatus === 'Diterima' || newStatus === 'Ditolak') {
                // Ubah Tampilan Badge Action menjadi Permanen
                let actionArea = card.querySelector('.action-area');
                if (newStatus === 'Diterima') {
                    actionArea.innerHTML = '<span class="badge bg-success fs-6 px-3 py-2"><i class="bi bi-check-circle-fill me-1"></i> Diterima</span>';
                } else {
                    actionArea.innerHTML = '<span class="badge bg-danger fs-6 px-3 py-2"><i class="bi bi-x-circle-fill me-1"></i> Ditolak</span>';
                }

                // Pindahkan Card ke Tab Hasil Seleksi
                document.getElementById('container-hasil').appendChild(card);

                // Update Hitungan Tab
                updateCounts();

                // Buka Tab Hasil Seleksi Otomatis
                let hasilTab = new bootstrap.Tab(document.getElementById('hasil-tab'));
                hasilTab.show();
            }
        }

        function updateCounts() {
            let prosesCount = document.querySelectorAll('#container-proses .item-lamaran').length;
            let hasilCount = document.querySelectorAll('#container-hasil .item-lamaran').length;

            document.getElementById('count-proses').innerText = prosesCount;
            document.getElementById('count-hasil').innerText = hasilCount;

            // Handle Empty State Display
            if (prosesCount === 0) {
                document.getElementById('empty-proses').classList.remove('d-none');
            } else {
                document.getElementById('empty-proses').classList.add('d-none');
            }

            if (hasilCount === 0) {
                document.getElementById('empty-hasil').classList.remove('d-none');
            } else {
                document.getElementById('empty-hasil').classList.add('d-none');
            }
        }
    </script>
</body>
</html>