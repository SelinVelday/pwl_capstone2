@extends('layouts.frontend')

@section('title', 'QR Code Registrasi')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Tiket Registrasi Ulang</h4>
                </div>
                <div class="card-body p-4">
                    <h5 class="card-title">{{ $registration->event->name }}</h5>
                    <p class="card-text">Atas Nama: <strong>{{ $registration->user->name }}</strong></p>
                    
                    <div class="my-4">
                        {{-- UBAH BAGIAN INI: Tampilkan data SVG secara langsung --}}
                        {!! $qrCodeImage !!}
                    </div>

                    <p class="mb-1">Kode Registrasi:</p>
                    <p class="h4 font-monospace bg-light p-2 rounded">{{ $registration->registration_code }}</p>
                    
                    <hr>
                    <p class="text-muted small">Tunjukkan kode ini kepada panitia saat melakukan registrasi ulang di lokasi event.</p>
                </div>
            </div>
            <div class="mt-4 text-center">
                 <a href="{{ route('member.my_registrations') }}" class="btn btn-secondary">Kembali ke Daftar Registrasi</a>
            </div>
        </div>
    </div>
</div>
@endsection