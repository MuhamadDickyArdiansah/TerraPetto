<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;




class LaporanAdmController extends Controller
{
    public function index()
    {
        $request = request();
        $user = Auth::user(); // Mengambil data user yang login

        if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
            $request->validate([
                'tanggal_awal' => 'required|date',
                'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            ]);

            $tanggal_awal = $request->tanggal_awal;
            $tanggal_akhir = $request->tanggal_akhir;

            // Cek role user
            if ($user->role == 'admin' || $user->role == 'dokter') {
                // Admin dan Dokter: Menampilkan semua data dengan status selesai
                $adm = Administrasi::where('status', 'selesai')
                    ->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])
                    ->get();
            } elseif ($user->role == 'pasien') {
                // Pasien: Menampilkan data miliknya dengan status selesai
                $adm = Administrasi::where('pasien_id', $user->id)
                    ->where('status', 'selesai')
                    ->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])
                    ->get();
            } else {
                // Jika role tidak sesuai, redirect atau tampilkan pesan
                return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }

            // Jika request adalah untuk export PDF
            if ($request->has('export') && $request->export === 'pdf') {
                $pdf = PDF::loadView('pdf.laporan', compact('adm', 'tanggal_awal', 'tanggal_akhir'));
                return $pdf->download('laporan.pdf');
            }

            // Kirim semua variabel ke view
            return view('laporanadm_index', compact('adm', 'tanggal_awal', 'tanggal_akhir'));
        } else {
            return view('laporanadm_form');
        }
    }
}
