@extends('layouts.admin')

@section('title', 'Buat Event Baru')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Formulir Event Baru</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('committee.events.store') }}" enctype="multipart/form-data">
                    {{-- Menggunakan partial view untuk isi form --}}
                    @include('committee.events._form')

                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan Event</button>
                        <a href="{{ route('committee.events.index') }}" class="btn btn-default">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection