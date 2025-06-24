@csrf
<div class="form-group">
    <label for="name">Nama Event</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $event->name ?? '') }}" required>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" class="form-control" name="date" value="{{ old('date', $event->date ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="time">Waktu</label>
            <input type="time" class="form-control" name="time" value="{{ old('time', $event->time ?? '') }}" required>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="speaker">Narasumber</label>
    <input type="text" class="form-control" name="speaker" value="{{ old('speaker', $event->speaker ?? '') }}" required>
</div>
<div class="form-group">
    <label for="location">Lokasi</label>
    <input type="text" class="form-control" name="location" value="{{ old('location', $event->location ?? '') }}" required>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="registration_fee">Biaya Registrasi</label>
            <input type="number" class="form-control" name="registration_fee" value="{{ old('registration_fee', $event->registration_fee ?? '0') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="max_participants">Maks. Peserta (opsional)</label>
            <input type="number" class="form-control" name="max_participants" value="{{ old('max_participants', $event->max_participants ?? '') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Deskripsi</label>
    <textarea class="form-control" name="description" rows="5">{{ old('description', $event->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="poster">Poster (opsional)</label>
    <input type="file" class="form-control" id="poster" name="poster">
    
    {{-- TAMBAHKAN KODE INI UNTUK MENAMPILKAN ERROR --}}
    @error('poster')
        <small class="form-text text-danger">{{ $message }}</small>
    @enderror
    {{-- AKHIR TAMBAHAN --}}

    @if(isset($event) && $event->poster_path)
    <small class="d-block mt-2">Poster saat ini: <a href="{{ asset('storage/'.$event->poster_path) }}" target="_blank">Lihat</a></small>
    @endif
</div>