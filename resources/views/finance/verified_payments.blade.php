@extends('layouts.admin')

@section('title', 'Riwayat Pembayaran Terverifikasi')
@section('page-subtitle', 'Daftar pembayaran yang telah berhasil diverifikasi, dikelompokkan per event.')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Riwayat Pembayaran per Event</h4>
            </div>
            <div class="card-body">

                {{-- Komponen Akordeon Bootstrap --}}
                <div class="accordion" id="accordionPayments">
                    @forelse ($groupedRegistrations as $eventName => $registrations)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $loop->iteration }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse-{{ $loop->iteration }}">
                                    <span class="fw-bold">{{ $eventName }}</span>
                                    <span class="badge bg-success ms-3">{{ count($registrations) }} Peserta Terverifikasi</span>
                                </button>
                            </h2>
                            <div id="collapse-{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $loop->iteration }}" data-bs-parent="#accordionPayments">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Peserta</th>
                                                    <th>Email</th>
                                                    <th>Waktu Verifikasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($registrations as $reg)
                                                    <tr>
                                                        <td>{{ $reg->user->name }}</td>
                                                        <td>{{ $reg->user->email }}</td>
                                                        <td>{{ $reg->updated_at->isoFormat('D MMM Y, HH:mm') }} WIB</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center p-4">
                            <p class="text-muted">Belum ada riwayat pembayaran yang terverifikasi.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>
@endsection