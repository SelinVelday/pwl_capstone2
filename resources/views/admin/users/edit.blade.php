@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Formulir Edit Pengguna: {{ $user->name }}</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @method('PUT')
                    @include('admin.users._form')
                     <div class="card-action">
                        <button type="submit" class="btn btn-success">Perbarui</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection