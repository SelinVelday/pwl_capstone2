@extends('layouts.frontend')

@section('title', $event->name)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow-sm">
            @if($event->poster_path)
                <img src="{{ asset('storage/' . $event->poster_path) }}" class="card-img-top" alt="Poster {{ $event->name }}">
            @endif
            <div class="card-body p-5">
                <h1 class="card-title display-6 fw-bold">{{ $event->name }}</h1>
                <hr>
                <div class="d-flex justify-content-between text-muted mb-4">
                    <span><i class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($event->date)->isoFormat('dddd, D MMMM Y') }}</span>
                    <span><i class="fas fa-clock me-2"></i>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }} WIB</span>
                </div>
                <div class="mb-4">
                    <h5 class="fw-bold">Deskripsi</h5>
                    <p>{{ $event->description ?? 'Tidak ada deskripsi.' }}</p>
                </div>
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item"><i class="fas fa-user-tie me-2" style="width:20px;"></i> <strong>Narasumber:</strong> {{ $event->speaker }}</li>
                    <li class="list-group-item"><i class="fas fa-map-marker-alt me-2" style="width:20px;"></i> <strong>Lokasi:</strong> {{ $event->location }}</li>
                    <li class="list-group-item"><i class="fas fa-users me-2" style="width:20px;"></i> <strong>Kuota:</strong> {{ $event->max_participants ? $event->max_participants . ' Peserta' : 'Tidak terbatas' }}</li>
                    <li class="list-group-item"><i class="fas fa-dollar-sign me-2" style="width:20px;"></i> <strong>Biaya:</strong> <span class="fw-bold text-primary">{{ $event->registration_fee > 0 ? 'Rp ' . number_format($event->registration_fee, 0, ',', '.') : 'Gratis' }}</span></li>
                </ul>

                <div class="d-grid gap-2">
                    @guest
                        {{-- Jika pengguna adalah tamu, tombol adalah link biasa ke halaman login --}}
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login untuk Mendaftar</a>
                    @endguest

                    @auth
                        {{-- Jika pengguna sudah login --}}
                        @if(Auth::user()->role === 'member')
                            @php
                                $isRegistered = Auth::user()->registrations()->where('event_id', $event->id)->exists();
                            @endphp

                            @if($isRegistered)
                                <a href="{{ route('member.my_registrations') }}" class="btn btn-success btn-lg">Anda Sudah Terdaftar</a>
                            @else
                                <form action="{{ route('member.events.register', $event) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Daftar Sekarang</button>
                                </form>
                            @endif
                        @else
                            <button type="button" class="btn btn-secondary btn-lg" disabled>Hanya Member yang Bisa Mendaftar</button>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection