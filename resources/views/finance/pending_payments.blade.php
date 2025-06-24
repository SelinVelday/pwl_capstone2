@extends('layouts.admin')

@section('title', 'Verifikasi Pembayaran')
@section('page-subtitle', 'Daftar pembayaran yang menunggu untuk diverifikasi.')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pembayaran Tertunda</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Event</th>
                                <th>Nama Peserta</th>
                                <th>Email</th>
                                <th>Bukti Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pendingRegistrations as $reg)
                            <tr>
                                <td>{{ $reg->event->name }}</td>
                                <td>{{ $reg->user->name }}</td>
                                <td>{{ $reg->user->email }}</td>
                                <td>
                                    @if($reg->payment_proof_path)
                                        <a href="{{ asset('storage/' . $reg->payment_proof_path) }}" target="_blank" class="btn btn-link btn-primary">
                                            Lihat Bukti
                                        </a>
                                    @else
                                        <span>Tidak Ada</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <form action="{{ route('finance.payment.verify', $reg) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin memverifikasi pembayaran ini?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-link btn-success" title="Verifikasi">
                                                <i class="fa fa-check"></i> Verifikasi
                                            </button>
                                        </form>
                                        <form action="{{ route('finance.payment.reject', $reg) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menolak pembayaran ini?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-link btn-danger" title="Tolak">
                                                <i class="fa fa-times"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada pembayaran yang perlu diverifikasi saat ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection