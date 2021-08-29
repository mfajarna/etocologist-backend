
<form action="{{ route('riwayatkeadaan.store') }}" class="w-full" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                Data Pasien Anak
             </div>
             <div class="card-body">
                 <div class="row g-3">
                    <div class="col-sm-4">
                         <div class="form-group">
                            <label for="id_anak">Nama Anak</label>
                            <select name="id_anak" id="id_anak" class="form-control" placeholder="" onchange="autofill(this)">
                            <option value="" disabled selected>-- Pilih Nama Anak --</option>
                                @foreach ($model as $data )
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach

                            </select>
                        <small id="id_ibu" class="form-text text-muted">*Nama Anak Yang Sudah Terdaftar</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" aria-describedby="nama_ibu" placeholder="Masukan Nama Ibu" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_suami">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Ayah" readonly>
                        </div>
                    </div>
                 </div>
                 <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="Masukan Tanggal Lahir" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" aria-describedby="jenis_kelamin" placeholder="Masukan Jenis Kelamin" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" aria-describedby="alamat" placeholder="Masukan Alamat" readonly> </textarea>
                        </div>
                    </div>
                 </div>
             </div>
        </div>
        <div class="card">
             <div class="card-header">
                Riwayat Pem. Saat Lahir
            </div>
            <div class="card-body">
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bb">BB</label>
                            <input type="number" class="form-control" id="bb" name="bb" aria-describedby="bb" placeholder="Masukan BB" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="bblr">BBLR</label>
                            <input type="number" class="form-control" id="bblr" name="bblr" aria-describedby="bblr" placeholder="Masukan BBLR" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="keadaan_lahir">Keadaan Lahir</label>
                                <input type="text" class="form-control" id="keadaan_lahir" name="keadaan_lahir" aria-describedby="keadaan_lahir" placeholder="Masukan Keadaan Lahir" readonly>
                        </div>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Lahir Di</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Masukan Tempat Lahir" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="letak_janin">Letak Janin</label>
                            <input type="text" class="form-control" id="letak_janin" name="letak_janin" aria-describedby="letak_janin" placeholder="Masukan Letak Janin" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jenis_imunisasi">Jenis Imunisasi</label>
                            <input type="text" class="form-control" id="jenis_imunisasi" name="jenis_imunisasi" aria-describedby="jenis_imunisasi" placeholder="Masukan Jenis Imunisasi" readonly>
                        </div>
                    </div>

               </div>
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cara_lahir">Cara Lahir</label>
                            <input type="text" class="form-control" id="cara_lahir" name="cara_lahir" aria-describedby="cara_lahir" placeholder="Masukan Cara Lahir" readonly>
                        </div>
                    </div>
                </div>
        </div>

        <div class="card">
                           <div class="card-header">
                   Data Riwayat Keadaan Anak
               </div>
                <div class="card-body">
                <table class="table table-responsive" id="products_table">
                    <thead>
                    <tr class="d-flex">
                        <th class="col-2">Tanggal</th>
                        <th class="col-2">Minggu Ke</th>
                        <th class="col-2">Umur .. Hari</th>
                        <th class="col-2">BB</th>
                        <th class="col-2">PB</th>
                        <th class="col-2">St Gizi</th>
                        <th class="col-2">Makanan</th>
                        <th class="col-2">Tali Pusat</th>
                        <th class="col-2">Imunisasi</th>
                        <th class="col-2">KK</th>
                        <th class="col-2">Cacat</th>
                        <th class="col-2">Gejala</th>
                        <th class="col-2">Tindakan Pusat</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($riwayatKeadaan as $index => $riwayat)
                        <tr class="d-flex">
                            <input type="hidden"
                                       name="riwayatKeadaan[{{$index}}][id_anak]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.id_anak"
                                       value="{{ old('id_anak') }}"
                                    />
                            <td class="col-sm-2">
                                <input type="date"
                                       name="riwayatKeadaan[{{$index}}][tanggal]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.tanggal"
                                       placeholder="Tanggal"
                                       value="{{ old('tanggal') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][minggu_ke]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.minggu_ke"
                                       placeholder="Minggu ke"
                                       value="{{ old('minggu_ke') }}"
                                       />

                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][umur_hari]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.umur_hari"
                                       placeholder="Umur Hari"
                                       value="{{ old('umur_hari') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][bb]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.bb"
                                       placeholder="BB"
                                       value="{{ old('bb') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][pb]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.pb"
                                       placeholder="PB"
                                       value="{{ old('pb') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatKeadaan[{{$index}}][st_gizi]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.st_gizi"
                                       placeholder="ST Gizi"
                                       value="{{ old('st_gizi') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <select name="riwayatKeadaan[{{$index}}][makanan]" id="makanan" class="form-control"  wire:model="riwayatKeadaan.{{$index}}.makanan" required>
                                <option value="" disabled selected>-- Makanan --</option>
                                    <option value="ASI">ASI</option>
                                    <option value="PASI">PASI</option>
                                </select>
                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatKeadaan[{{$index}}][tali_pusat]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.tali_pusat"
                                       placeholder="Tali Pusat"
                                       value="{{ old('tali_pusat') }}"
                                />
                            </td>
                            <td class="col-sm-2">
                                <select name="riwayatKeadaan[{{$index}}][imunisasi]" id="imunisasi" class="form-control"  wire:model="riwayatKeadaan.{{$index}}.imunisasi" required>
                                <option value="" disabled selected>-- Imunisasi --</option>
                                    <option value="B">B</option>
                                    <option value="P">P</option>
                                    <option value="H">H</option>
                                    <option value="Penta">Penta</option>
                                </select>
                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatKeadaan[{{$index}}][kk]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.kk"
                                       placeholder="KK"
                                       value="{{ old('kk') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatKeadaan[{{$index}}][cacat]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.cacat"
                                       placeholder="Cacat"
                                       value="{{ old('cacat') }}"
                                       />
                            </td>
                             <td class="col-sm-2">
                                <textarea
                                       name="riwayatKeadaan[{{$index}}][gejala]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.gejala"
                                       placeholder="Gejala"
                                       value="{{ old('gejala') }}"
                                       > </textarea>
                            </td>
                             <td class="col-sm-2">
                                <textarea
                                       name="riwayatKeadaan[{{$index}}][tindakan_nasehat]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.tindakan_nasehat"
                                       placeholder="Tindakan Nasehat"
                                       value="{{ old('tindakan_nasehat') }}"
                                > </textarea>
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeRiwayat({{$index}})">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addRiwayat">+ Add Riwayat</button>
                    </div>
                </div>
            </div>
        </div>

            <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                     <a href="{{ route('riwayatkeadaan.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </form>
    </div>

    @push('additional')
          <script src="https://code.jquery.com/jquery-1.12.4.js" defer></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
        <script>
            function autofill(sel)
            {
               var nama_pasien = sel.value;

               $.ajax({
                   url: "{!! URL::to('poli-anak/getDataAnak') !!}",
                   data : 'id=' + nama_pasien,
               }).success(function (data) {
                    var json = data;

                    $("#nama_ibu").val(json.ibu['nama']);
                    $("#nama_suami").val(json.ibu['nama_suami']);
                    $("#tanggal_lahir").val(json.tanggal_lahir);
                    $("#jenis_kelamin").val(json.jenis_kelamin);
                    $("#alamat").val(json.ibu['alamat']);
                    $("#bb").val(json.bb)
                    $("#bblr").val(json.bblr)
                    $("#keadaan_lahir").val(json.keadaan_lahir)
                    $("#tempat_lahir").val(json.tempat_lahir)
                    $("#letak_janin").val(json.letak_janin)
                    $("#jenis_imunisasi").val(json.jenis_imunisasi)
                    $("#cara_lahir").val(json.cara_lahir)
               });
            }
        </script>
    @endpush
