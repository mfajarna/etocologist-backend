<form action="{{ route('riwayatkeadaan.store') }}" class="w-full" method="POST">
    @csrf

<div class="card">
            <div class="card-header">
                Data Pasien Anak
             </div>
             <div class="card-body">
                 <input type="hidden" class="form-control" id="id_riwayatkeadaan" name="id_riwayatkeadaan" aria-describedby="id_riwayatkeadaan" placeholder="Masukan Nama Ibu" value={{ $id_riwayatkeadaan }} readonly>
                 <input type="hidden" class="form-control" id="id_anak" name="id_anak" aria-describedby="id_anak" placeholder="Masukan Nama Ibu" value={{ $id_anak }} readonly>
                 <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="id_anak">Nama Anak</label>
                            <input type="text" class="form-control" id="nama_anak" name="nama_anak" aria-describedby="nama_anak" placeholder="Masukan Nama Ibu" value={{ $nama }}  readonly>
                        <small id="nama_anak" class="form-text text-muted">*Nama Anak Yang Sudah Terdaftar</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_ibu">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" aria-describedby="nama_ibu" placeholder="Masukan Nama Ibu" value="{{ $tanggal_lahir }}"  readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" aria-describedby="jenis_kelamin" value="{{ $jenis_kelamin }}"  readonly>
                        </div>
                    </div>
                 </div>
                 <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Masukan Tempat Lahir" value="{{ $tempat_lahir }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan (Kg)</label>
                            <input type="text" class="form-control" id="berat_badan" name="berat_badan" aria-describedby="berat_badan" value="{{ $bb }}" readonly>
                        </div>
                    </div>
                 </div>
             </div>
        </div>

</form>
