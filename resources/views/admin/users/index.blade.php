@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')
@section('page-subtitle', 'Kelola pengguna dengan peran Panitia dan Keuangan')

@section('page-action')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Pengguna
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Pengguna</h4>
            </div>
            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Status</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>
                                        @if($user->is_active)
                                            <span class="badge bg-success text-white">Aktif</span>
                                        @else
                                            <span class="badge bg-danger text-white">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-link btn-primary btn-lg" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.users.toggle', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status pengguna ini?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-link {{ $user->is_active ? 'btn-warning' : 'btn-info' }}" title="{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                    <i class="fa {{ $user->is_active ? 'fa-times-circle' : 'fa-check-circle' }}"></i>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.users.delete', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('PERINGATAN: Menghapus pengguna akan menghapus semua data terkait. Apakah Anda benar-benar yakin?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger" title="Hapus">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data pengguna untuk ditampilkan.</td>
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