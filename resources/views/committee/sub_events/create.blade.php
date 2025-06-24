@extends('layouts.admin')

@section('title', 'Tambah Sesi Baru')
@section('page-subtitle', 'Menambahkan sesi untuk event: ' . $event->name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Formulir Sesi Baru</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('committee.events.sub_events.store', $event) }}">
                    {{-- Memanggil file partial form yang tadi kita buat --}}
                    @include('committee.sub_events._form')

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan Sesi</button>
                        <a href="{{ route('committee.events.sub_events.index', $event) }}" class="btn btn-default">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection