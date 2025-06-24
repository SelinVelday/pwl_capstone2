@extends('layouts.admin')

@section('title', 'Manajemen Event')
@section('page-subtitle', 'Kelola semua event yang Anda buat.')

@section('page-action')
    <a href="{{ route('committee.events.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Buat Event Baru
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Event Saya</h4>
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
                                <th>Tanggal & Waktu</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->date)->isoFormat('D MMM Y') }}, {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('committee.events.sub_events.index', $event) }}" class="btn btn-link btn-info" title="Kelola Sesi">
                                                <i class="fa fa-sitemap"></i>
                                            </a>
                                            <a href="{{ route('committee.attendance.scanner', $event) }}" class="btn btn-link btn-success" title="Scan Kehadiran">
                                                <i class="fa fa-qrcode"></i>
                                            </a>

                                            {{-- TOMBOL BARU DITAMBAHKAN DI SINI --}}
                                            <a href="{{ route('committee.certificates.form', $event) }}" class="btn btn-link btn-warning" title="Upload Sertifikat">
                                                <i class="fa fa-certificate"></i>
                                            </a>
                                            
                                            <a href="{{ route('committee.events.edit', $event) }}" class="btn btn-link btn-primary" title="Edit Event">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('committee.events.delete', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus event ini? Semua data terkait (peserta, sesi) juga akan terhapus.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger" title="Hapus Event">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Anda belum membuat event apapun.</td>
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