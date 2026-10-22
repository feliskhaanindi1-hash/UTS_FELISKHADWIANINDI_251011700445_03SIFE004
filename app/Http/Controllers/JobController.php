<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Halaman Utama / Daftar Lowongan dengan Fitur Search + Pagination
    public function index(Request $request)
    {
        $search = $request->input('search');

        $jobs = Job::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('company', 'like', "%{$search}%")
                         ->orWhere('location', 'like', "%{$search}%");
        })->paginate(5)->appends(['search' => $search]);

        return view('jobs.index', compact('jobs', 'search'));
    }

    // Halaman Detail Lowongan
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    // Proses Pengiriman Lamaran
    public function apply(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'nama_pelamar'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'email'         => 'required|email',
            'no_hp'         => 'required|string|max:20',
        ]);

        // Simpan Data Lamaran ke Session
        $userApplications = session()->get('user_applications', []);
        
        $newApplication = [
            'id'            => uniqid(),
            'job_title'     => $job->title,
            'company'       => $job->company,
            'location'      => $job->location,
            'salary'        => $job->salary,
            'image'         => $job->image ?? 'job1.png',
            'nama_pelamar'  => $request->nama_pelamar,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status'        => 'Direview', // Status awal saat pertama melamar
            'applied_at'    => date('d M Y H:i'),
        ];

        $userApplications[] = $newApplication;
        session()->put('user_applications', $userApplications);

        return redirect()->back()->with('success', 'Selamat! Lamaran Anda untuk posisi "' . $job->title . '" di ' . $job->company . ' berhasil dikirimkan.');
    }
}