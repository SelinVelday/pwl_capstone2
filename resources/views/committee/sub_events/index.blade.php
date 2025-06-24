@extends('layouts.admin')

@section('title', 'Kelola Sesi untuk Event: ' . $event->name)
@section('page-subtitle', 'Tambah, ubah, atau hapus sesi/sub-event di bawah ini.')

@section('page-action')
    <a href="{{ route('committee.events.sub_events.create', $event) }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Sesi Baru
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Daftar Sesi</h4>
                    <a href="{{ route('committee.events.index') }}" class="btn btn-secondary btn-sm">Kembali ke Daftar Event</a>
                </div>
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
                                <th>Nama Sesi</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th>Narasumber</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subEvents as $subEvent)
                                <tr>
                                    <td>{{ $subEvent->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($subEvent->date)->isoFormat('D MMM Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($subEvent->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($subEvent->end_time)->format('H:i') }}</td>
                                    <td>{{ $subEvent->location }}</td>
                                    <td>{{ $subEvent->speaker }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('committee.sub_events.edit', $subEvent) }}" class="btn btn-link btn-primary" title="Edit Sesi">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('committee.sub_events.delete', $subEvent) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus sesi ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger" title="Hapus Sesi">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada sesi yang ditambahkan untuk event ini.</td>
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