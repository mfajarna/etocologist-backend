<x-content>
     <x-slot name="header">
        <x-header.header-poli-ibu-component>
            {{ __('Input Data Pasien Ibu') }}
        </x-header.header-poli-ibu-component>
    </x-slot>

    <div class="py-12 container">
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
         <div class="card">
             <div class="card-header">
                Buat Pasien Ibu Baru
             </div>
         <div class="card-body">
             <form action="{{ route('inputpasien.store') }}" class="w-full" method="POST">
                @csrf
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama">Nama Pasien Ibu</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan Nama Pasien Ibu" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_suami">Nama Suami</label>
                            <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami Pasien" value="{{ old('nama_suami') }}">
                            <small id="nama_suami" class="form-text text-muted">*Catatan: Kosongkan jika tidak ada</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" aria-describedby="kelurahan" placeholder="Masukan Nama Kelurahan" value="{{ old('kelurahan') }}">
                            <small id="kelurahan" class="form-text text-muted">*Contoh: Baleendah, Banjaran, Bojongsoang</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="umur">Umur Pasien Ibu</label>
                            <input type="number" class="form-control" id="umur" name="umur" aria-describedby="umur" placeholder="Masukan Umur Pasien Ibu" value="{{ old('umur') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="umur_suami">Umur Suami Pasien</label>
                            <input type="number" class="form-control" id="umur_suami" name="umur_suami" aria-describedby="umur_suami" placeholder="Masukan Umur Suami Pasien" value="{{ old('umur_suami') }}">
                            <small id="umur_pasien" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                        </div>
                    </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                            <label for="posyandu">Posyandu</label>
                            <input type="text" class="form-control" id="posyandu" name="posyandu" aria-describedby="posyandu" placeholder="Masukan Nama Posyandu" value="{{ old('posyandu') }}">
                            <small id="posyandu" class="form-text text-muted">*Masukan nama posyandu</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Pasien Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" aria-describedby="pekerjaan" placeholder="Masukan Nama Pekerjaan" value="{{ old('pekerjaan') }}">
                            <small id="pekerjaan" class="form-text text-muted">*Jika tidak ada, inputkan saja ibu rumah tangga</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pekerjaan_suami">Pekerjaan Suami Pasien Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_suami" name="pekerjaan_suami" aria-describedby="pekerjaan_suami" placeholder="Masukan Nama Pekerjaan Suami" value="{{ old('pekerjaan_suami') }}">
                            <small id="pekerjaan_suami" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="htpt">Masukan Tanggal HPHT</label>
                            <input type="date" class="form-control" id="htpt" name="htpt" aria-describedby="htpt" placeholder="Masukan Tanggal HPHT" value="{{ old('htpt') }}">
                            <small id="htpt" class="form-text text-muted">*Tanggal HPHT pasien ibu</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" aria-describedby="htpt" placeholder="Masukan Alamat Pasien" value="{{ old('alamat') }}"></textarea>
                            <small id="alamat" class="form-text text-muted">*Alamat pasien</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" placeholder="Masukan Nomor Telepon" value="{{ old('no_telp') }}">
                            <small id="no_telp" class="form-text text-muted">*Nomor telepon pasien yang dapat dihubungi</small>
                        </div>
                    </div>
               </div>
                <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                     <a href="{{ route('inputpasien.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </form>
         </div>
        </div>
    </div>
</x-content>


