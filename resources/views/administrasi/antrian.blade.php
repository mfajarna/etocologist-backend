<x-administrasi>

    @section('content')
        @include('layouts.headers.content')
        <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white-default shadow">
                    <div class="card-header bg-transparent">
                        <h6 class="text-uppercase text-black ls-1 mb-1">Antrian</h6>
                        <h2 class="text-black mb-0">Buat Antrian Baru</h2>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('antrian.tambah') }}" class="w-full" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-4">
                        <div class="form-group">
                                <label for="id_ibu">Nama Pasien Ibu</label>
                                    <select name="id_ibu" id="id_ibu" class="form-control" placeholder="" onchange="autofill(this)" required>
                                    <option value="" disabled selected>-- Pilih Nama Pasien --</option>
                                        @foreach ($model as $data )
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                        </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nama_suami">Nama Suami</label>
                                <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Ayah" value="{{ old('nama_suami') }}" readonly>
                                <small id="nama_suami" class="form-text text-muted">*Nama ayah yang sudah terdaftar</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" aria-describedby="htpt" placeholder="Masukan Alamat Pasien" value="{{ old('alamat') }}" readonly></textarea>
                            <small id="alamat" class="form-text text-muted">*Alamat pasien</small>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
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
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" placeholder="Masukan Nomor Telepon" value="{{ old('no_telp') }}" readonly>
                            <small id="no_telp" class="form-text text-muted">*Nomor telepon pasien yang dapat dihubungi</small>
                        </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-4">
                        <div class="form-group">
                                <label for="id_ibu">Pilih Poli Tujuan</label>
                                    <select name="nama_poli" id="nama_poli" class="form-control" placeholder="" onchange="addPoli(this)" required>
                                    <option value="" disabled selected>-- Pilih Nama Poli --</option>
                                        <option value="Poli Anak">Poli Anak</option>
                                        <option value="Poli Umum">Poli Umum</option>
                                        <option value="Poli Ibu">Poli Ibu</option>
                                        <option value="Poli Massas">Poli Massas</option>
                                    </select>
                        </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="no_antrian">No Antrian</label>
                                <input type="text" class="form-control" id="no_antrian" name="no_antrian" aria-describedby="no_antrian" placeholder="No Antrian" value="{{ old('no_antrian') }}" readonly>
                                <small id="no_antrian" class="form-text text-muted">*Nomor Antrian</small>
                            </div>
                        </div>
                    </div>
                <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <button class="btn btn-outline-secondary" type="reset">Reset</button>
                </div>

            </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
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


            function addPoli(sel)
            {
                var nama_poli = sel.value;
                var antrian_polianak = "<?= $polianak ?>"
                var antrian_poliibu= "<?= $poliibu ?>"
                var antrian_poliumum= "<?= $poliumum ?>"
                var antrian_polimassas ="<?= $polimassas ?>"

                if(nama_poli === "Poli Anak")
                {
                   $('#no_antrian').val(antrian_polianak)
                }
                if(nama_poli === "Poli Ibu")
                {
                   $('#no_antrian').val(antrian_poliibu)
                }
                if(nama_poli === "Poli Umum")
                {
                   $('#no_antrian').val(antrian_poliumum)
                }
                if(nama_poli === "Poli Massas")
                {
                   $('#no_antrian').val(antrian_polimassas)
                }
            }
        </script>
    @endsection
</x-administrasi>
