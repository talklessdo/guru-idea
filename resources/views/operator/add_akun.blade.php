<x-layout>
    <style>
        .konten {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem 4rem;
        }
        
    </style>
    <div class="konten">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">➕ Tambah Guru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="formRegister" action="/store_akun" method="post">
                @csrf
                <div class="card-body">
                    <!-- Nama Lengkap -->
                    <div class="form-group">
                        <label for="exampleInputName">Nama Lengkap</label>
                        <input name="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="exampleInputName"
                            placeholder="Masukkan Nama"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email</label>
                        <input name="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="exampleInputEmail1"
                            placeholder="Masukkan Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <label for="exampleInputRole">Role</label>
                        <select name="role"
                            class="form-control @error('role') is-invalid @enderror"
                            id="exampleInputRole">
                            <option value="">Pilih role</option>
                            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                            <option value="kepsek" {{ old('role') == 'kepsek' ? 'selected' : '' }}>Kepala Sekolah</option>
                            <option value="kurikulum" {{ old('role') == 'kurikulum' ? 'selected' : '' }}>Kurikulum</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <div class="input-group">
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="exampleInputPassword1"
                                placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleEye"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="form-group">
                        <label for="inputPasswordConfirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control"
                            id="inputPasswordConfirmation"
                            required>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Masukkan</button>
                    <a href="/manage_akun" class="btn btn-secondary ml-2">Kembali</a>
                </div>
            </form>

        </div>
        <!-- /.card -->
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('exampleInputPassword1');
            const eyeIcon = document.getElementById('toggleEye');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.classList.toggle('fa-eye-slash');
            eyeIcon.classList.toggle('fa-eye');
        }

        
    </script>

</x-layout>
