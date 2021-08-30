
<form action="{{ route('riwayatkeadaan.addData') }}" class="w-full" method="POST">
        @csrf

        <div class="card">
            <div class="card-header">
                Data Pasien Anak
             </div>
             <div class="card-body">
                 <input type="hidden" class="form-control" id="id_anak" name="id_anak" aria-describedby="id_anak" placeholder="Masukan Nama Ibu" value={{ $model->id }} readonly>
                 <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="id_anak">Nama Anak</label>
                            <input type="text" class="form-control" id="nama_anak" name="nama_anak" aria-describedby="nama_anak" placeholder="Masukan Nama Ibu" value={{ $model->nama }}  readonly>
                        <small id="nama_anak" class="form-text text-muted">*Nama Anak Yang Sudah Terdaftar</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_ibu">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" aria-describedby="nama_ibu" placeholder="Masukan Nama Ibu" value="{{ $model->tanggal_lahir }}"  readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" aria-describedby="jenis_kelamin" value="{{ $model->jenis_kelamin }}"  readonly>
                        </div>
                    </div>
                 </div>
                 <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Masukan Tempat Lahir" value="{{ $model->tempat_lahir }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan (Kg)</label>
                            <input type="text" class="form-control" id="berat_badan" name="berat_badan" aria-describedby="berat_badan" value="{{ $model->bb }}" readonly>
                        </div>
                    </div>
                 </div>
             </div>
        </div>
        <div class="card">
             <div class="card-header">
                Riwayat Keadaan Anak
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="table_data">
                   <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" id="head-cb"></th>
                        <th width="23%">Tanggal</th>
                        <th>Minggu Ke</th>
                        <th>Umur .. Hari</th>
                        <th>BB</th>
                        <th>PB</th>
                        <th>St Gizi</th>
                        <th>Makanan</th>
                        <th>Tali Pusat</th>
                        <th>Imunisasi</th>
                        <th>KK</th>
                        <th>Cacat</th>
                        <th>Gejala</th>
                        <th>Tindakan Nasehat</th>
                    </tr>
                    </thead>
                </table>
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
                        <th class="col-2">Tindakan Nasehat</th>
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
                                       required
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][minggu_ke]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.minggu_ke"
                                       placeholder="Minggu ke"
                                       value="{{ old('minggu_ke') }}"
                                       required
                                       />

                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][umur_hari]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.umur_hari"
                                       placeholder="Umur Hari"
                                       value="{{ old('umur_hari') }}"
                                       required
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][bb]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.bb"
                                       placeholder="BB"
                                       value="{{ old('bb') }}"
                                       required
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatKeadaan[{{$index}}][pb]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.pb"
                                       placeholder="PB"
                                       value="{{ old('pb') }}"
                                       required
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatKeadaan[{{$index}}][st_gizi]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.st_gizi"
                                       placeholder="ST Gizi"
                                       value="{{ old('st_gizi') }}"
                                       required
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
                                       required
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatKeadaan[{{$index}}][cacat]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.cacat"
                                       placeholder="Cacat"
                                       value="{{ old('cacat') }}"
                                       required
                                       />
                            </td>
                             <td class="col-sm-2">
                                <textarea
                                       name="riwayatKeadaan[{{$index}}][gejala]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.gejala"
                                       placeholder="Gejala"
                                       value="{{ old('gejala') }}"
                                       required
                                       > </textarea>
                            </td>
                             <td class="col-sm-2">
                                <textarea
                                       name="riwayatKeadaan[{{$index}}][tindakan_nasehat]"
                                       class="form-control"
                                       wire:model="riwayatKeadaan.{{$index}}.tindakan_nasehat"
                                       placeholder="Tindakan Nasehat"
                                       value="{{ old('tindakan_nasehat') }}"
                                       required
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
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
          <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>
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


            let yangDiCheck = 0;

            $(document).ready(function(){
                var t = $('#table_data').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [1, "asc"],
                            [2, "asc"],
                            [3, "asc"],
                            [4, "asc"],
                            [5, "asc"],
                            [6, "asc"],
                            [7, "asc"],
                            [8, "asc"],
                            [9, "asc"],
                            [10, "asc"],
                            [11, "asc"],
                            [12, "asc"],
                            [13, "asc"],
                        ],
                        ajax:{
                            url: "{!! URL::to('poli-anak/getRiwayatAnak/'.$model->id) !!}",
                        },

                        columnDefs: [
                            { targets: '_all', visible: true},
                            {
                                "targets": 0,
                                "class": "text-center",
                                orderable: false,
                                "render": function(data, type, row, meta){
                                    return `<input type="checkbox" name="obat_checked[]"  class="cb-child" value="${row.id}">`;
                                }
                            },
                            {
                                "targets": 1,
                                data: 'tanggal',
                                name: 'tanggal'
                            },
                            {
                                "targets": 2,
                                data: 'minggu_ke',
                                name: 'minggu_ke'
                            },
                            {
                                "targets": 3,
                                data: 'umur_hari',
                                name: 'umur_hari'
                            },
                            {
                                "targets": 4,
                                data: 'bb',
                                name: 'bb'
                            },
                            {
                                "targets": 5,
                                data: 'pb',
                                name: 'pb'
                            },
                            {
                                "targets": 6,
                                data: 'st_gizi',
                                name: 'st_gizi'
                            },
                            {
                                "targets": 7,
                                data: 'makanan',
                                name: 'makanan'
                            },
                            {
                                "targets": 8,
                                data: 'tali_pusat',
                                name: 'tali_pusat'
                            },
                            {
                                "targets": 9,
                                data: 'imunisasi',
                                name: 'imunisasi'
                            },
                            {
                                "targets": 10,
                                data: 'kk',
                                name: 'kk'
                            },
                            {
                                "targets": 11,
                                data: 'cacat',
                                name: 'cacat'
                            },
                            {
                                "targets": 12,
                                data: 'gejala',
                                name: 'gejala'
                            },
                            {
                                "targets": 13,
                                data: 'tindakan_nasehat',
                                name: 'tindakan_nasehat'
                            },
                        ],
                    });
            });
        </script>
    @endpush
