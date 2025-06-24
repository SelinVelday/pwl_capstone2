@extends('layouts.admin')

@section('title', 'Upload Sertifikat untuk Event: ' . $event->name)
@section('page-subtitle', 'Unggah file PDF untuk setiap peserta yang telah hadir.')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Peserta Hadir</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($attendedParticipants->isEmpty())
                    <p class="text-muted">Belum ada peserta yang tercatat hadir di event ini.</p>
                @else
                    <form action="{{ route('committee.certificates.upload', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Peserta</th>
                                        <th>Email</th>
                                        <th>Status Sertifikat</th>
                                        <th style="width: 40%;">Upload File PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendedParticipants as $registration)
                                        <tr>
                                            <td>{{ $registration->user->name }}</td>
                                            <td>{{ $registration->user->email }}</td>
                                            <td>
                                                @if($registration->certificate_path)
                                                    <span class="badge bg-success">Sudah Diunggah</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Belum Ada</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- Input tersembunyi untuk mengirim ID registrasi --}}
                                                <input type="hidden" name="registration_ids[]" value="{{ $registration->id }}">
                                                {{-- Input file untuk sertifikat, perhatikan nama dalam bentuk array --}}
                                                <input type="file" name="certificates[]" class="form-control" accept=".pdf">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-action mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-upload"></i> Unggah Semua Sertifikat yang Dipilih
                            </button>
                            <a href="{{ route('committee.events.index') }}" class="btn btn-default">Kembali</a>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection