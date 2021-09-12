<form action="{{ route('poliumum.store') }}" class="w-full" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                Data Kunjungan Poli Umum
             </div>
                <input type="hidden" class="form-control" id="id_ibu" name="id_ibu" aria-describedby="id_ibu" placeholder="Masukan Nama Suami" value="{{ $id }}" readonly>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="id_ibu">Nama Pasien Ibu</label>
                            <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" value="{{ $data[0]->nama }}" readonly>
                        <small id="id_ibu" class="form-text text-muted">*Nama Pasien Ibu Yang Sudah Terdaftar</small>
                        </div>
                    </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_suami">Umur</label>
                            <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" value="{{ $data[0]->umur }}" readonly>
                            <small id="id_ibu" class="form-text text-muted">*Umur pasien ibu</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_suami">Alamat</label>
                            <textarea type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" readonly>{{ $data[0]->alamat }} </textarea>
                            <small id="id_ibu" class="form-text text-muted">*Alamat Rumah Pasien</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Riwayat Poli Umum
            </div>
            <div class="card-body">

                <table class="table table-responsive" id="table_data">
                   <thead>
                        <tr>
                            <th class="col-2">Tanggal</th>
                            <th class="col-2">Keluhan</th>
                            <th class="col-2">Tensi</th>
                            <th class="col-2">BB</th>
                            <th class="col-2">LAB</th>
                            <th class="col-2">Pemeriksaan</th>
                            <th class="col-2">Theraphi</th>
                            <th class="col-2">Ket</th>
                         </tr>
                    </thead>
                </table>
                <div class="mb-10">

                        <button class="btn btn-success" id="buttoncetak_nonaktif_all" onClick="cetakOnClick()">
                            <svg id="i-edit" class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 1 32 32" fill="none" stroke="#FFFF" stroke-linecap="round" stroke-linejoin="round" width="15px" stroke-width="2">
                                <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" /></svg>
                                Cetak Kartu Umum
                         </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Data Kunjungan Pasien Poli Umum
            </div>
            <div class="card-body">
               <table class="table table-responsive" id="products_table">
                        <thead>
                        <tr class="d-flex">
                            <th class="col-2">Tanggal</th>
                            <th class="col-2">Keluhan</th>
                            <th class="col-2">Tensi</th>
                            <th class="col-2">BB</th>
                            <th class="col-2">LAB</th>
                            <th class="col-2">Pemeriksaan</th>
                            <th class="col-2">Theraphi</th>
                            <th class="col-2">Ket</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($keadaan as $index => $riwayat)
                            <tr class="d-flex">
                                <td class="col-2">
                                    <input type="date"
                                        name="keadaan[{{$index}}][tanggal]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.tanggal"
                                        value="{{ old('tanggal') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <textarea
                                        name="keadaan[{{$index}}][keluhan]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.k"
                                        placeholder="Masukan Keluhan"
                                        value="{{ old('keluhan') }}" required
                                    ></textarea>
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="keadaan[{{$index}}][tensi]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.tensi"
                                        value="{{ old('tensi') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="keadaan[{{$index}}][bb]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.bb"
                                        value="{{ old('bb') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="keadaan[{{$index}}][lab]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.lab"
                                        value="{{ old('lab') }}" required
                                    />
                                </td>
                                 <td class="col-2">
                                    <input type="text"
                                        name="keadaan[{{$index}}][pemeriksaan]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.pemeriksaan"
                                        value="{{ old('pemeriksaan') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="keadaan[{{$index}}][theraphi]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.theraphi"
                                        value="{{ old('theraphi') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <textarea
                                        name="keadaan[{{$index}}][ket]"
                                        class="form-control"
                                        wire:model="keadaan.{{$index}}.k"
                                        placeholder="Masukan ket"
                                        value="{{ old('ket') }}" required
                                    ></textarea>
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

                <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                     <a href="{{ route('poliumum.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </div>
        </div>
    </form>

        @push('additional')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>


          <script>

            function cetakOnClick()
            {
                let id_check = $('#id_ibu').val();

                window.open('cetak-kartu-umum/'+id_check,'_blank');
            }



              $(document).ready(function () {
                    var table = $('#table_data').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [0, "asc"],
                            [1, "asc"],
                            [2, "asc"],
                            [3, "asc"],
                            [4, "asc"],
                            [5, "asc"],
                            [6, "asc"],
                            [7, "asc"],
                        ],
                        ajax:{
                            url: "{!! URL::to('poli-umum/getRiwayat/'.$id) !!}"
                        },
                        columnDefs: [
                            { targets: '_all', visible: true},
                            {
                                "targets": 0,
                                data: 'tanggal',
                                name: 'tanggal'
                            },
                            {
                                "targets": 1,
                                data: 'keluhan',
                                name: 'keluhan'
                            },
                            {
                                "targets": 2,
                                data: 'tensi',
                                name: 'tensi'
                            },
                            {
                                "targets": 3,
                                data: 'bb',
                                name: 'bb'
                            },
                            {
                                "targets": 4,
                                data: 'lab',
                                name: 'lab'
                            },
                            {
                                "targets": 5,
                                data: 'pemeriksaan',
                                name: 'pemeriksaan'
                            },
                            {
                                "targets": 6,
                                data: 'theraphi',
                                name: 'theraphi'
                            },
                            {
                                "targets": 7,
                                data: 'ket',
                                name: 'ket'
                            },
                        ],

                    })


              })

          </script>
        @endpush




