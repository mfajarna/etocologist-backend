<form action="{{ route('kunjungankeadaan.addkunjungan') }}" class="w-full" method="POST">
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

        <div class="card">
            <div class="card-header">
                Riwayat Kunjungan Keadaan Anak
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="table_data">
                    <thead>
                        <tr>
                            <th width="5%"><input type="checkbox" id="head-cb"></th>
                            <th>Bulan Ke</th>
                            <th width="15%">Tanggal</th>
                            <th>Umur mg/bln</th>
                            <th>BB</th>
                            <th>PB</th>
                            <th>LK</th>
                            <th>ASI</th>
                            <th>PASI</th>
                            <th>MPA</th>
                            <th width="15%">Imunisasi</th>
                            <th width="15%">Perkembangan Kes.</th>
                            <th>Th/</th>
                            <th width="15%">Nasehat</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>


    <div class="card">
                <div class="card-header">
                   Data Riwayat Kunjungan Keadaan Anak
               </div>

               <div class="card-body">
                    <table class="table table-responsive" id="products_table">
                        <thead>
                        <tr class="d-flex">
                            <th class="col-2">Bulan Ke</th>
                            <th class="col-3">Tanggal</th>
                            <th class="col-3">Umur mg/bln</th>
                            <th class="col-2">BB</th>
                            <th class="col-2">PB</th>
                            <th class="col-2">LK</th>
                            <th class="col-2">ASI</th>
                            <th class="col-2">PASI</th>
                            <th class="col-2">MPA</th>
                            <th class="col-2">Imunisasi</th>
                            <th class="col-3">Perkembangan Kes.</th>
                            <th class="col-2">Th/</th>
                            <th class="col-2">Nasehat</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($kunjunganKeadaan as $index => $riwayat)
                                <tr class="d-flex">
                                    <td class="col-sm-2">
                                        <select name="kunjunganKeadaan[{{$index}}][bulan]" id="bulan" class="form-control"  wire:model="kunjunganKeadaan.{{$index}}.bulan" required>
                                        <option value="" disabled selected>-- Pilih Bulan Ke --</option>
                                            @for ($i = 1; $i <= 12 ; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="date"
                                            name="kunjunganKeadaan[{{$index}}][tanggal]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.tanggal"
                                            placeholder="Tanggal"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-3">
                                        <select name="kunjunganKeadaan[{{$index}}][umur]" id="umur" class="form-control"  wire:model="kunjunganKeadaan.{{$index}}.umur" required>
                                        <option value="" disabled selected>-- Pilih Bulan Ke --</option>
                                            @for ($i = 5; $i <= 25 ; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="number"
                                            name="kunjunganKeadaan[{{$index}}][bb]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.bb"
                                            placeholder="BB"
                                            value="{{ old('bb') }}"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="number"
                                            name="kunjunganKeadaan[{{$index}}][pb]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.pb"
                                            placeholder="PB"
                                            value="{{ old('pb') }}"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text"
                                            name="kunjunganKeadaan[{{$index}}][lk]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.lk"
                                            placeholder="lk"
                                            value="{{ old('lk') }}"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text"
                                            name="kunjunganKeadaan[{{$index}}][asi]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.asi"
                                            placeholder="asi"
                                            value="{{ old('asi') }}"
                                            required
                                            />
                                    </td>
                                     <td class="col-sm-2">
                                        <input type="text"
                                            name="kunjunganKeadaan[{{$index}}][pasi]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.pasi"
                                            placeholder="pasi"
                                            value="{{ old('pasi') }}"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text"
                                            name="kunjunganKeadaan[{{$index}}][mpa]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.mpa"
                                            placeholder="mpa"
                                            value="{{ old('mpa') }}"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-2">
                                        <input type="text"
                                            name="kunjunganKeadaan[{{$index}}][imunisasi]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.imunisasi"
                                            placeholder="imunisasi"
                                            value="{{ old('imunisasi') }}"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-3">
                                        <select name="kunjunganKeadaan[{{$index}}][perkembangan_kesehatan]" id="perkembangan_kesehatan" class="form-control"  wire:model="kunjunganKeadaan.{{$index}}.perkembangan_kesehatan" required>
                                        <option value="" disabled selected>-- Pilih Perkembangan Kes --</option>
                                                <option value="MK">MK</option>
                                                <option value="MH">MH</option>
                                                <option value="B">B</option>
                                                <option value="S">S</option>
                                                <option value="P">P</option>
                                                <option value="T">T</option>
                                                <option value="ISPA">ISPA</option>
                                                <option value="DIAR">DIAR</option>
                                                <option value="Kej">Kej</option>
                                        </select>
                                    </td>
                                   <td class="col-sm-2">
                                        <input type="text"
                                            name="kunjunganKeadaan[{{$index}}][th]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.th"
                                            placeholder="th"
                                            value="{{ old('th') }}"
                                            required
                                            />
                                    </td>
                                    <td class="col-sm-2">
                                        <textarea
                                            name="kunjunganKeadaan[{{$index}}][nasehat]"
                                            class="form-control"
                                            wire:model="kunjunganKeadaan.{{$index}}.nasehat"
                                            placeholder="nasehat"
                                            value="{{ old('nasehat') }}"
                                            required
                                        >
                                        </textarea>
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
                            wire:click.prevent="addRiwayatKunjungan">+ Add Riwayat</button>
                    </div>
                </div>
               </div>

                <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                     <a href="{{ route('riwayatkeadaan.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </form>
    </div>
</form>
 @push('additional')
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
          <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>


        <script>
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
                            url: "{!! URL::to('poli-anak/getKunjunganRiwayat/'.$id_anak) !!}",
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
                                data: 'bulan',
                                name: 'bulan'
                            },
                            {
                                "targets": 2,
                                data: 'tanggal',
                                name: 'tanggal'
                            },
                            {
                                "targets": 3,
                                data: 'umur',
                                name: 'umur'
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
                                data: 'lk',
                                name: 'lk'
                            },
                            {
                                "targets": 7,
                                data: 'asi',
                                name: 'asi'
                            },
                            {
                                "targets": 8,
                                data: 'pasi',
                                name: 'pasi'
                            },
                            {
                                "targets": 9,
                                data: 'mpa',
                                name: 'mpa'
                            },
                            {
                                "targets": 10,
                                data: 'imunisasi',
                                name: 'imunisasi'
                            },
                            {
                                "targets": 11,
                                data: 'perkembangan_kesehatan',
                                name: 'perkembangan_kesehatan'
                            },
                            {
                                "targets": 12,
                                data: 'th',
                                name: 'th'
                            },
                            {
                                "targets": 13,
                                data: 'nasehat',
                                name: 'nasehat'
                            },
                        ],
                    });
            });
        </script>
 @endpush
