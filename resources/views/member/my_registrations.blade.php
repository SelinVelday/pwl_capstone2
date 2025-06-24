@extends('layouts.frontend')

@section('title', 'Registrasi Event Saya')

@section('content')
<div class="container">
    <h1 class="mb-4">Registrasi Event Saya</h1>

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

    <div class="card shadow-sm">
        <div class="card-body">
            @if($registrations->isEmpty())
                <div class="text-center p-5">
                    <p class="text-muted">Anda belum terdaftar di event manapun.</p>
                    <a href="{{ route('events.index') }}" class="btn btn-primary mt-3">Lihat Event Tersedia</a>
                </div>
            @else
                <div class="list-group">
                    @foreach ($registrations as $reg)
                    <div class="list-group-item list-group-item-action flex-column align-items-start mb-3 border rounded">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1 fw-bold text-primary">{{ $reg->event->name }}</h5>
                            <small>{{ \Carbon\Carbon::parse($reg->event->date)->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1">Tanggal: {{ \Carbon\Carbon::parse($reg->event->date)->isoFormat('dddd, D MMMM Y') }}</p>
                        <p class="mb-1">Kode Registrasi: <span class="badge bg-secondary">{{ $reg->registration_code }}</span></p>

                        <hr>
                        
                        {{-- Bagian Aksi yang Dinamis --}}
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div>
                                <p class="mb-0">Status Pembayaran: 
                                    @if($reg->payment_status == 'paid')
                                        <span class="badge bg-success">Lunas</span>
                                    @elseif($reg->payment_status == 'pending' && $reg->payment_proof_path)
                                        <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                                    @else
                                        <span class="badge bg-danger">Belum Dibayar</span>
                                    @endif
                                </p>
                                <p class="mb-0">Kehadiran: 
                                    @if($reg->attended)
                                        <span class="badge bg-success">Sudah Hadir</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Hadir</span>
                                    @endif
                                </p>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="text-end">
                                @if($reg->payment_status == 'pending' && !$reg->payment_proof_path)
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal-{{ $reg->id }}">
                                        Lakukan Pembayaran
                                    </button>
                                @endif

                                @if($reg->payment_status == 'paid')
                                    <a href="{{ route('member.qrcode.show', $reg) }}" class="btn btn-dark btn-sm">
                                        <i class="fas fa-qrcode"></i> Tampilkan QR Code
                                    </a>
                                @endif
                                
                                @if($reg->attended && $reg->certificate_path)
                                    <a href="{{ route('member.certificate.download', $reg) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-download"></i> Download Sertifikat
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="paymentModal-{{ $reg->id }}" tabindex="-1" aria-labelledby="paymentModalLabel-{{ $reg->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="paymentModalLabel-{{ $reg->id }}">Pembayaran: {{ $reg->event->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    {{-- ====================================================== --}}
                                    {{-- === TAMBAHKAN BLOK INI UNTUK MENAMPILKAN ERROR === --}}
                                    {{-- ====================================================== --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {{-- ====================================================== --}}

                                    <p>Silakan lakukan pembayaran sebesar <strong>Rp {{ number_format($reg->event->registration_fee, 0, ',', '.') }}</strong> ke rekening berikut:</p>
                                    <p><strong>Bank Papilaya:</strong> 123-456-7890<br><strong>Atas Nama:</strong> Panitia Event Papilaya</p>
                                    <hr>
                                    <p>Setelah melakukan pembayaran, silakan unggah bukti transfer Anda di bawah ini.</p>
                                    
                                    <form action="{{ route('member.payment.upload', $reg) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                            <label for="payment_proof-{{ $reg->id }}" class="form-label">File Bukti Pembayaran (JPG/PNG)</label>
                                            <input class="form-control" type="file" id="payment_proof-{{ $reg->id }}" name="payment_proof" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection