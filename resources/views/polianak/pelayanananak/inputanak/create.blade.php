<x-content>
    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    </head>
     <x-slot name="header">
        <x-header.header-poli-anak-component>
            {{ __('Input Data Pasien Anak') }}
        </x-header.header-poli-anak-component>
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
         <div class="card mb-2">
             <div class="card-header">
               Biodata Anak
             </div>
         <div class="card-body">
             <form action="{{ route('inputanak.store') }}" class="w-full" method="POST">
                @csrf
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama">Nama Anak Pasien Ibu</label>
                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan Nama Anak" value="{{ old('nama') }}">
                            <small id="nama" class="form-text text-muted">*Masukan nama anak yang akan di data</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="id_ibu">Nama Pasien Ibu</label>
                                <select name="id_ibu" id="id_ibu" class="form-control" placeholder="" onchange="autofill(this)">
                                <option value="" disabled selected>-- Pilih Nama Pasien --</option>
                                    @foreach ($model as $data )
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_suami">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Ayah" value="{{ old('nama_suami') }}" readonly>
                            <small id="kelurahan" class="form-text text-muted">*Nama ayah yang sudah terdaftar</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="Masukan Umur Pasien Ibu" value="{{ old('tanggal_lahir') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="umur">Umur Ibu</label>
                            <input type="number" class="form-control" id="umur" name="umur" aria-describedby="umur" placeholder="Umur Pasien Ibu" value="{{ old('umur') }}" readonly>
                            <small id="umur" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                        </div>
                    </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                            <label for="umur_suami">Umur Ayah</label>
                            <input type="number" class="form-control" id="umur_suami" name="umur_suami" aria-describedby="umur_suami" placeholder="Umur Ayah" value="{{ old('umur_suami') }}" readonly>
                            <small id="posyandu" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="">
                                 <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                 <option value="L">Laki-Laki</option>
                                 <option value="P">Perempuan</option>
                            </select>
                            <small id="jenis_kelamin" class="form-text text-muted">*Jika tidak ada, inputkan saja ibu rumah tangga</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Pasien Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" aria-describedby="pekerjaan" placeholder="Masukan Pekerjaan Ibu" value="{{ old('pekerjaan') }}" readonly>
                            <small id="pekerjaan" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="pekerjaan_suami">Pekerjaan Suami Pasien Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_suami" name="pekerjaan_suami" aria-describedby="pekerjaan_suami" placeholder="Masukan Nama Pekerjaan Suami" value="{{ old('pekerjaan_suami') }}" readonly>
                            <small id="pekerjaan_suami" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" aria-describedby="htpt" placeholder="Masukan Alamat Pasien" value="{{ old('alamat') }}" readonly></textarea>
                            <small id="alamat" class="form-text text-muted">*Alamat pasien</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" placeholder="Masukan Nomor Telepon" value="{{ old('no_telp') }}" readonly>
                            <small id="no_telp" class="form-text text-muted">*Nomor telepon pasien yang dapat dihubungi</small>
                        </div>
                    </div>
               </div>
         </div>
        </div>
        <div class="card">
            <div class="card-header">
                Keadaan Saat Lahir
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="bb">Berat Badan Anak</label>
                            <input type="number" class="form-control" id="bb" name="bb" aria-describedby="bb" placeholder="Masukan Berat Badan" value="{{ old('bb') }}" />
                            <small id="bb" class="form-text text-muted">*Berat badan anak saat lahir</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="bblr">BBRL +/-</label>
                            <input type="number" class="form-control" id="bblr" name="bblr" aria-describedby="bblr" placeholder="Masukan BBLR" value="{{ old('bblr') }}" />
                            <small id="bblr" class="form-text text-muted">*BBLR anak saat lahir</small>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="keadaan_lahir">Keadaan Lahir</label>
                            <input type="text" class="form-control" id="keadaan_lahir" name="keadaan_lahir" aria-describedby="keadaan_lahir" placeholder="Masukan Keadaan Lahir" value="{{ old('keadaan_lahir') }}" />
                            <small id="keadaan_lahir" class="form-text text-muted">*Keadaan lahir anak saat lahir</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lahir_di">Tempat Lahir</label>
                            <input type="text" class="form-control" id="lahir_di" name="lahir_di" aria-describedby="lahir_di" placeholder="Masukan Tempat Lahir" value="{{ old('lahir_di') }}" />
                            <small id="lahir_di" class="form-text text-muted">*Tempat lahir anak</small>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="proses_lahir">Proses Lahir</label>
                            <input type="text" class="form-control" id="proses_lahir" name="proses_lahir" aria-describedby="proses_lahir" placeholder="Masukan Proses Lahir" value="{{ old('proses_lahir') }}" />
                            <small id="proses_lahir" class="form-text text-muted">*Proses lahir anak</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ditolong_oleh">Ditolong Oleh</label>
                            <input type="text" class="form-control" id="ditolong_oleh" name="ditolong_oleh" aria-describedby="ditolong_oleh" placeholder="Masukan Ditolong Oleh" value="{{ old('ditolong_oleh') }}" />
                            <small id="ditolong_oleh" class="form-text text-muted">*Orang yang menolong anak lahir</small>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="letak_janin">Letak Janin</label>
                            <input type="text" class="form-control" id="letak_janin" name="letak_janin" aria-describedby="letak_janin" placeholder="Masukan Letak Janin" value="{{ old('letak_janin') }}" />
                            <small id="letak_janin" class="form-text text-muted">*Letak janin anak saat lahir</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jenis_imunisasi">Jenis Imunisasi</label>
                            <input type="text" class="form-control" id="jenis_imunisasi" name="jenis_imunisasi" aria-describedby="jenis_imunisasi" placeholder="Masukan Jenis Imunisasi" value="{{ old('jenis_imunisasi') }}" />
                            <small id="jenis_imunisasi" class="form-text text-muted">*Jenis Imunisasi anak saat lahir</small>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cara_lahir">Cara Lahir</label>
                            <input type="text" class="form-control" id="cara_lahir" name="cara_lahir" aria-describedby="cara_lahir" placeholder="Masukan Cara Lahir" value="{{ old('cara_lahir') }}" />
                            <small id="cara_lahir" class="form-text text-muted">*Cara Lahir Anak</small>
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


    @push('additional')
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
          <script src="https://code.jquery.com/jquery-1.12.4.js" defer></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
          <script>

              $(document).ready(function(){
                $('#id_ibu').select2();
              });

            function autofill(sel)
            {
               var nama_pasien = sel.value;

               $.ajax({
                   url: "{!! URL::to('poli-anak/getIbu') !!}",
                   data : 'id=' + nama_pasien,
               }).success(function (data) {
                    var json = data;

                    $("#nama_suami").val(json.nama_suami)
                    $('#umur').val(json.umur)
                    $('#umur_suami').val(json.umur_suami)
                    $('#pekerjaan').val(json.pekerjaan)
                    $('#pekerjaan_suami').val(json.pekerjaan_suami)
                    $('#no_telp').val(json.no_telp)
                    $('#alamat').val(json.alamat)
               });
            }
        </script>
    @endpush

</x-content>


