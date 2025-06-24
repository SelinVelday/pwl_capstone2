@csrf
<div class="form-group">
    <label for="name">Nama Lengkap</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="{{ old('name', $user->name ?? '') }}" required>
    @error('name') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>
<div class="form-group">
    <label for="email">Alamat Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="masukkan@email.com" value="{{ old('email', $user->email ?? '') }}" required>
    @error('email') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>
<div class="form-group">
    <label for="role">Peran (Role)</label>
    <select class="form-select" id="role" name="role" required>
        <option value="committee" @if(old('role', $user->role ?? '') == 'committee') selected @endif>Committee (Panitia)</option>
        <option value="finance" @if(old('role', $user->role ?? '') == 'finance') selected @endif>Finance (Keuangan)</option>
    </select>
    @error('role') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
    @if (isset($user))
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
    @endif
    @error('password') <small class="form-text text-danger">{{ $message }}</small> @enderror
</div>
<div class="form-group">
    <label for="password_confirmation">Konfirmasi Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
</div>