@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Formulir Edit Event: {{ $event->name }}</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('committee.events.update', $event) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    {{-- ====================================================== --}}
                    {{-- === BLOK INI AKAN MENAMPILKAN SEMUA ERROR VALIDASI === --}}
                    {{-- ====================================================== --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h4 class="alert-heading">Terjadi Kesalahan!</h4>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- ====================================================== --}}
                    
                    {{-- Memanggil file partial form --}}
                    @include('committee.events._form')

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Perbarui Event</button>
                        <a href="{{ route('committee.events.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection