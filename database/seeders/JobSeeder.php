<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        Job::truncate(); // Bersihkan data lama

        $jobs = [
            [
                'title' => 'HRD',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 8.000.000 - Rp 10.000.000',
                'type' => 'Full-time',
                'requirements' => 'Pendidikan S1 Psikologi/Hukum/Manajemen, pengalaman min. 2 tahun, menguasai rekrutmen.',
                'posted_date' => '2026-10-20',
                'description' => 'Bertanggung jawab dalam mengelola proses rekrutmen karyawan, administrasi kepegawaian, dan pengembangan SDM di PT MIESTAR.',
                'image' => 'job1.png'
            ],
            [
                'title' => 'Content Creator',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 4.000.000 - Rp 6.000.000',
                'type' => 'Full-time',
                'requirements' => 'Kreatif, menguasai editing video (CapCut/Premiere), aktif di TikTok & Instagram, paham tren kuliner/F&B.',
                'posted_date' => '2026-10-18',
                'description' => 'Membuat konten kreatif promosi produk dan operasional kuliner PT MIESTAR untuk media sosial.',
                'image' => 'job2.png'
            ],
            [
                'title' => 'Restaurant Manager',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 6.500.000 - Rp 9.000.000',
                'type' => 'Full-time',
                'requirements' => 'Pengalaman minimal 2 tahun di bidang F&B, memiliki jiwa kepemimpinan dan manajemen outlet.',
                'posted_date' => '2026-10-15',
                'description' => 'Mengatur operasional harian restoran PT MIESTAR dan mengelola tim pelayanan outlet.',
                'image' => 'job3.png'
            ],
            [
                'title' => 'Supervisor Operational',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 5.500.000 - Rp 7.500.000',
                'type' => 'Full-time',
                'requirements' => 'Pendidikan min. D3/S1, memiliki kemampuan komunikasi yang baik, mampu bekerja dengan target.',
                'posted_date' => '2026-10-14',
                'description' => 'Mewawancarai dan mengawasi jalannya standar operasional prosedur (SOP) harian tim kerja PT MIESTAR.',
                'image' => 'job4.png'
            ],
            [
                'title' => 'UI/UX Designer',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 7.000.000 - Rp 9.500.000',
                'type' => 'Full-time',
                'requirements' => 'Menguasai Figma, Wireframing, Prototyping, dan merancang tampilan aplikasi pemesanan.',
                'posted_date' => '2026-10-11',
                'description' => 'Merancang alur antarmuka web dan aplikasi kasir/internal PT MIESTAR.',
                'image' => 'job5.png'
            ],
            [
                'title' => 'Waiters',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 2.000.000 - Rp 3.000.000',
                'type' => 'Full-time',
                'requirements' => 'Berpenampilan menarik, ramah, komunikatif, dan siap melayani pelanggan dengan prima.',
                'posted_date' => '2026-10-09',
                'description' => 'Menyambut tamu, mencatat pesanan, menyajikan makanan dan minuman, serta menjaga kebersihan area dining.',
                'image' => 'job6.png'
            ],
            [
                'title' => 'Barista',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 2.000.000 - Rp 3.000.000',
                'type' => 'Full-time',
                'requirements' => 'Berpengalaman meracik kopi, menguasai mesin espresso, dan memiliki attitude yang baik.',
                'posted_date' => '2026-10-10',
                'description' => 'Menyiapkan dan meracik berbagai minuman kopi serta beverages sesuai standar resep PT MIESTAR.',
                'image' => 'job7.png'
            ],
            [
                'title' => 'Cook Helper',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 2.000.000 - Rp 3.500.000',
                'type' => 'Full-time',
                'requirements' => 'Cekatan, disiplin, menjaga kebersihan dapur, dan membantu chef menyiapkan bahan masakan.',
                'posted_date' => '2026-10-07',
                'description' => 'Membantu persiapan bahan baku (prep), menjaga kebersihan area dapur, dan membantu proses memasak.',
                'image' => 'job8.png'
            ],
            [
                'title' => 'IT Support',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 5.000.000 - Rp 8.000.000',
                'type' => 'Full-time',
                'requirements' => 'Menguasai troubleshooting hardware, jaringan LAN, sistem POS kasir, dan perangkat pendukung.',
                'posted_date' => '2026-10-08',
                'description' => 'Menangani kendala teknis perangkat komputer, jaringan internet, dan sistem kasir outlet PT MIESTAR.',
                'image' => 'job9.png'
            ],
            [
                'title' => 'PIC Kitchen & Barista & Waiters',
                'company' => 'PT MIESTAR',
                'location' => 'Jakarta Selatan',
                'salary' => 'Rp 5.000.000 - Rp 7.000.000',
                'type' => 'Full-time',
                'requirements' => 'Pengalaman min. 1 tahun di bidang F&B Supervisor/PIC, tegas, dan mampu mengoordinasikan tim operasional.',
                'posted_date' => '2026-10-05',
                'description' => 'Bertanggung jawab penuh atas kelancaran operasional dapur, bar, dan pelayanan di area outlet.',
                'image' => 'job10.png'
            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}