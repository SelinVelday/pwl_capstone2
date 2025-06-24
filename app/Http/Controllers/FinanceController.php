<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FinanceController extends Controller
{
    /**
     * Menampilkan daftar pembayaran yang masih tertunda untuk diverifikasi.
     *
     * @return \Illuminate\View\View
     */
    public function pendingPayments()
    {
        if (Auth::user()->role !== 'finance') {
            abort(403, 'Anda tidak memiliki akses sebagai Tim Keuangan.');
        }

        $pendingRegistrations = Registration::where('payment_status', 'pending')
                                            ->whereNotNull('payment_proof_path')
                                            ->with('user', 'event')
                                            ->orderBy('created_at', 'asc')
                                            ->get();
                                            
        return view('finance.pending_payments', compact('pendingRegistrations'));
    }

    /**
     * Menampilkan riwayat pembayaran yang telah diverifikasi, dikelompokkan per event.
     *
     * @return \Illuminate\View\View
     */
    public function verifiedPayments()
    {
        if (Auth::user()->role !== 'finance') {
            abort(403, 'Anda tidak memiliki akses sebagai Tim Keuangan.');
        }

        $verifiedRegistrations = Registration::where('payment_status', 'paid')
                                            ->with('user', 'event')
                                            ->orderBy('updated_at', 'desc')
                                            ->get();
        
        // Mengelompokkan hasil berdasarkan nama event untuk ditampilkan di view
        $groupedRegistrations = $verifiedRegistrations->groupBy('event.name');

        return view('finance.verified_payments', compact('groupedRegistrations'));
    }

    /**
     * Memproses verifikasi pembayaran untuk sebuah registrasi.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyPayment(Registration $registration)
    {
        if (Auth::user()->role !== 'finance') {
            abort(403, 'Anda tidak memiliki akses sebagai Tim Keuangan.');
        }

        $registration->update(['payment_status' => 'paid']);
        return redirect()->back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    /**
     * Memproses penolakan bukti pembayaran.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rejectPayment(Registration $registration)
    {
        if (Auth::user()->role !== 'finance') {
            abort(403, 'Anda tidak memiliki akses sebagai Tim Keuangan.');
        }

        // Hapus file bukti pembayaran yang ditolak dari storage
        if ($registration->payment_proof_path) {
            Storage::disk('public')->delete($registration->payment_proof_path);
        }

        // Kembalikan status ke 'pending' dan kosongkan path bukti bayar
        // agar member bisa mengunggah ulang.
        $registration->update(['payment_proof_path' => null]);

        return redirect()->back()->with('success', 'Pembayaran ditolak. Peserta perlu mengunggah ulang bukti pembayaran.');
    }
}