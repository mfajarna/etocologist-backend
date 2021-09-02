<x-administrasi>
@section('content')
    @include('layouts.headers.content')

    <div class="container-fluid mt--7">
               @if($errors->any())
        <div class="mb-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi kesalahan dalam pengimputan data pasien!</h4>
                <p>
                    <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </p>
        </div>
        </div>
        @endif
        @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Sukses!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('updatesuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Sukses!</strong> {{ session('updatesuccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('hapus'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Sukses!</strong> {{ session('hapus') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white-default shadow">
                    <div class="card-header bg-transparent">
                        <h6 class="text-uppercase text-black ls-1 mb-1">Input Pasien</h6>
                        <h2 class="text-black mb-0">Masukan Data Pasien Baru</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pasien.store') }}" class="w-full" method="POST">
                            @csrf
                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama" class="form-control-label">Nama Pasien Ibu</label>
                                            <input type="text" class="form-control form-control-alternative" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan Nama Pasien Ibu" value="{{ old('nama') }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama_suami" class="form-control-label">Nama Suami</label>
                                            <input type="text" id="nama_suami" name="nama_suami" class="form-control form-control-alternative" aria-describedby="nama_suami" placeholder="Masukan Nama Suami Pasien" value="{{ old('nama_suami') }}">
                                            <small id="nama_suami" class="form-text text-muted">*Catatan: Kosongkan jika tidak ada</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kelurahan" class="form-control-label">Kelurahan</label>
                                            <input type="text" class="form-control form-control-alternative" id="kelurahan" name="kelurahan" aria-describedby="kelurahan" placeholder="Masukan Nama Kelurahan" value="{{ old('kelurahan') }}">
                                            <small id="kelurahan" class="form-text text-muted">*Contoh: Baleendah, Banjaran, Bojongsoang</small>
                                        </div>
                                    </div>
                                </div>

                    <div class="row g-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="umur" class="form-control-label" >Umur Pasien Ibu</label>
                                    <input type="number" class="form-control form-control-alternative" id="umur" name="umur" aria-describedby="umur" placeholder="Masukan Umur Pasien Ibu" value="{{ old('umur') }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="umur_suami" class="form-control-label">Umur Suami Pasien</label>
                                    <input type="number" class="form-control form-control-alternative" id="umur_suami" name="umur_suami" aria-describedby="umur_suami" placeholder="Masukan Umur Suami Pasien" value="{{ old('umur_suami') }}">
                                    <small id="umur_pasien" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="posyandu" class="form-control-label">Posyandu</label>
                                    <input type="text" class="form-control form-control-alternative" id="posyandu" name="posyandu" aria-describedby="posyandu" placeholder="Masukan Nama Posyandu" value="{{ old('posyandu') }}">
                                    <small id="posyandu" class="form-text text-muted">*Masukan nama posyandu</small>
                                </div>
                            </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pekerjaan" class="form-control-label">Pekerjaan Pasien Ibu</label>
                                <input type="text" class="form-control form-control-alternative" id="pekerjaan" name="pekerjaan" aria-describedby="pekerjaan" placeholder="Masukan Nama Pekerjaan" value="{{ old('pekerjaan') }}">
                                <small id="pekerjaan" class="form-text text-muted">*Jika tidak ada, inputkan saja ibu rumah tangga</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pekerjaan_suami" class="form-control-label">Pekerjaan Suami Pasien Ibu</label>
                                <input type="text" class="form-control form-control-alternative" id="pekerjaan_suami" name="pekerjaan_suami" aria-describedby="pekerjaan_suami" placeholder="Masukan Nama Pekerjaan Suami" value="{{ old('pekerjaan_suami') }}">
                                <small id="pekerjaan_suami" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                            </div>
                        </div>
                    </div>

                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="htpt" class="form-control-label">Masukan Tanggal HPHT</label>
                            <input type="date" class="form-control form-control-alternative" id="htpt" name="htpt" aria-describedby="htpt" placeholder="Masukan Tanggal HPHT" value="{{ old('htpt') }}">
                            <small id="htpt" class="form-text text-muted">*Tanggal HPHT pasien ibu</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="alamat" class="form-control-label">Alamat</label>
                            <textarea class="form-control form-control-alternative" id="alamat" name="alamat" aria-describedby="htpt" placeholder="Masukan Alamat Pasien" value="{{ old('alamat') }}"></textarea>
                            <small id="alamat" class="form-text text-muted">*Alamat pasien</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" class="form-control-label">
                            <label for="no_telp" class="form-control-label">No Telepon</label>
                            <input type="number" class="form-control form-control-alternative" id="no_telp" name="no_telp" aria-describedby="no_telp" placeholder="Masukan Nomor Telepon" value="{{ old('no_telp') }}">
                            <small id="no_telp" class="form-text text-muted">*Nomor telepon pasien yang dapat dihubungi</small>
                        </div>
                    </div>
               </div>
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <x-jet-label value="{{ __('Email') }}"  class="form-control-label" />
                            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }} form-control form-control-alternative" type="email" name="email" placeholder="Masukan Email Pasien Ibu"
                                        :value="old('email')" required />
                             <small id="password" class="form-text text-muted">*Email pasien ibu</small>
                            <x-jet-input-error for="email"></x-jet-input-error>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                           <x-jet-label value="{{ __('Password') }}"  class="form-control-label" />
                            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }} form-control form-control-alternative" type="password" placeholder="Masukan Password"
                                        name="password" required autocomplete="new-password" />
                            <small id="password" class="form-text text-muted">*Password pasien ibu</small>
                            <x-jet-input-error for="password"></x-jet-input-error>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <x-jet-label value="{{ __('Konfirmasi Password') }}"   class="form-control-label"/>

                             <x-jet-input class="form-control form-control-alternative" type="password" name="password_confirmation" required autocomplete="new-password"  placeholder="Masukan Konfirmasi Password" />
                            <small id="password" class="form-text text-muted">*Konfirmasi Password</small>
                        </div>
                    </div>
               </div>
                <div class="row g-3">
                    <div class="col-sm-4">
                        <label for="tujuan_poli" class="form-control-label">Poli Tujuan</label>
                        <select name="nama_poli_tujuan" id="nama_poli_tujuan" class="form-control form-control-alternative"  required>
                        <option value="" disabled selected>-- Poli Tujuan --</option>
                            <option value="Poli Ibu">Poli Ibu</option>
                            <option value="Poli Anak">Poli Anak</option>
                            <option value="Poli Umum">Poli Umum</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">

                    </div>
               </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Simpan') }}</button>
                </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
</x-administrasi>
