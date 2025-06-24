@extends('layouts.admin')

@section('title', 'Scan Kehadiran Event: ' . $event->name)
@section('page-subtitle', 'Arahkan kamera ke QR Code peserta untuk mencatat kehadiran.')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pemindai QR Code</h4>
            </div>
            <div class="card-body text-center">

                {{-- Notifikasi Sukses atau Error --}}
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                 @if(session('info'))
                <div class="alert alert-info" role="alert">
                    {{ session('info') }}
                </div>
                @endif

                {{-- Elemen untuk menampilkan kamera --}}
                <div id="reader" style="width: 100%; max-width: 500px; margin: auto;"></div>

                {{-- Form tersembunyi untuk mengirim hasil scan --}}
                <form action="{{ route('committee.attendance.scan', $event) }}" method="POST" id="attendance-form" class="d-none">
                    @csrf
                    <input type="hidden" name="registration_code" id="result-input">
                </form>
            </div>
            <div class="card-footer text-center">
                <small class="text-muted">Pemindai akan otomatis mendeteksi QR code yang terlihat oleh kamera.</small>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Memuat library QR Scanner dari CDN --}}
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Fungsi ini akan berjalan saat QR code berhasil terdeteksi
        console.log(`Code matched = ${decodedText}`, decodedResult);
        
        // Masukkan hasil scan ke dalam input form yang tersembunyi
        document.getElementById('result-input').value = decodedText;
        
        // Kirim form tersebut ke server
        document.getElementById('attendance-form').submit();
    }

    function onScanFailure(error) {
        // Fungsi ini bisa diabaikan, atau digunakan untuk logging
        // console.warn(`Code scan error = ${error}`);
    }

    // Membuat instance scanner baru
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", // ID dari elemen div di HTML
        { fps: 10, qrbox: {width: 250, height: 250} }, // Konfigurasi scanner
        /* verbose= */ false
    );

    // Mulai proses scanning
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endpush