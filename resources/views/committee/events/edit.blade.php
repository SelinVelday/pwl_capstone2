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
                {{-- Formulir ini akan mengirim data ke route 'committee.events.update' dengan metode PUT --}}
                <form method="POST" action="{{ route('committee.events.update', $event) }}" enctype="multipart/form-data">
                    @method('PUT')
                    
                    {{-- Menggunakan partial view yang sama dengan form 'create' untuk isi formulirnya --}}
                    {{-- File ini (_form.blade.php) harus ada di dalam folder yang sama --}}
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