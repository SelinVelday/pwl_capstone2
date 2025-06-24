@csrf
<div class="form-group">
    <label for="name">Nama Sesi</label>
    <input type="text" class="form-control" name="name" placeholder="Contoh: Sesi 1: Pembukaan" value="{{ old('name', $subEvent->name ?? '') }}" required>
    @error('name') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" class="form-control" name="date" value="{{ old('date', $subEvent->date ?? $event->date) }}" required>
            @error('date') <small class="form-text text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="start_time">Waktu Mulai</label>
            <input type="time" class="form-control" name="start_time" value="{{ old('start_time', $subEvent->start_time ?? '') }}" required>
            @error('start_time') <small class="form-text text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="end_time">Waktu Selesai</label>
            <input type="time" class="form-control" name="end_time" value="{{ old('end_time', $subEvent->end_time ?? '') }}" required>
            @error('end_time') <small class="form-text text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="speaker">Narasumber Sesi</label>
    <input type="text" class="form-control" name="speaker" placeholder="Nama narasumber untuk sesi ini" value="{{ old('speaker', $subEvent->speaker ?? '') }}" required>
    @error('speaker') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>

<div class="form-group">
    <label for="location">Lokasi Sesi</label>
    <input type="text" class="form-control" name="location" placeholder="Contoh: Ruang A" value="{{ old('location', $subEvent->location ?? '') }}" required>
    @error('location') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>

<div class="form-group">
    <label for="max_participants">Maks. Peserta Sesi (opsional)</label>
    <input type="number" class="form-control" name="max_participants" value="{{ old('max_participants', $subEvent->max_participants ?? '') }}">
    @error('max_participants') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>

<div class="form-group">
    <label for="description">Deskripsi Sesi (opsional)</label>
    <textarea class="form-control" name="description" rows="3">{{ old('description', $subEvent->description ?? '') }}</textarea>
    @error('description') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>