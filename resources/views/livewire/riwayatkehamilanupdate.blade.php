<form action="{{ route('riwayatkehamilan.addnew') }}" class="w-full" method="POST">
        @csrf

<div class="card">
         <div class="card-header">
             Data Pasien Ibu
         </div>

         <div class="card-body">
             <input type="hidden" class="form-control" id="id_riwayat" name="id_riwayat" aria-describedby="id_riwayat" placeholder="Masukan Nama Ibu" value={{ $model->id }} readonly>
              <input type="hidden" class="form-control" id="id_ibu" name="id_ibu" aria-describedby="id_ibu" placeholder="Masukan Nama Ibu" value={{ $model->ibu->id }} readonly>

             <div class="row g-3">
                 <div class="col-sm-4">
                     <div class="form-group">
                        <label for="id_anak">Nama Pasien Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" aria-describedby="nama_ibu" placeholder="Masukan Nama Ibu" value={{ $model->ibu->nama }}  readonly>
                        <small id="nama_ibu" class="form-text text-muted">*Nama Ibu Yang Sudah Terdaftar</small>
                     </div>
                 </div>
                <div class="col-sm-4">
                     <div class="form-group">
                        <label for="id_anak">Nama Suami Ibu</label>
                            <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Ibu" value={{ $model->ibu->nama_suami }}  readonly>
                        <small id="nama_suami" class="form-text text-muted">*Nama Suami Ibu Yang Sudah Terdaftar</small>
                     </div>
                 </div>
                <div class="col-sm-4">
                     <div class="form-group">
                        <label for="id_anak">Alamat</label>
                            <textarea  class="form-control" id="alamat" name="alamat" aria-describedby="alamat" placeholder="Masukan Nama Ibu" readonly> {{ $model->ibu->alamat }} </textarea>
                        <small id="alamat" class="form-text text-muted">*Alamat Yang Sudah Terdaftar</small>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    <div class="card">
         <div class="card-header">
             Data Riwayat Persalinan
         </div>
         <div class="card-body">
                <table id="table_data_riwayat" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 12.5%">No</th>
                                <th class="text-center" style="width: 12.5%">Umur</th>
                                <th class="text-center" style="width: 25%">Partus o/</th>
                                <th class="text-center" style="width: 25%">Cara</th>
                                <th class="text-center" style="width: 25%">Ket</th>
                            </tr>
                        </thead>
                </table>
         </div>
     </div>

     <div class="card">
               <div class="card-header">
                   Data Riwayat Persalinan
               </div>
              <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-center">Umur</th>
                        <th class="text-center">Partus o/</th>
                        <th class="text-center">Cara</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($riwayatkehamilanupdate as $index => $riwayat)
                        <tr>
                            <td class="col-sm-2">
                                <input type="hidden"
                                       name="riwayatkehamilanupdate[{{$index}}][id_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilanupdate.{{$index}}.id_riwayat"
                                       value="{{ old('id_riwayat') }}"
                                       />
                                <input type="text"
                                       name="riwayatkehamilanupdate[{{$index}}][no_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilanupdate.{{$index}}.no_riwayat"
                                       placeholder="Masukan No Riwayat"
                                       value="{{ old('no_riwayat') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatkehamilanupdate[{{$index}}][umur_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilanupdate.{{$index}}.umur_riwayat"
                                       placeholder="Masukan Umur"
                                       value="{{ old('umur_riwayat') }}"
                                       />

                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatkehamilanupdate[{{$index}}][partus_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilanupdate.{{$index}}.partus_riwayat"
                                       placeholder="Masukan Partus"
                                       value="{{ old('partus_riwayat') }}"
                                       />
                            </td>
                            <td class="col-sm-3">
                                <textarea
                                       name="riwayatkehamilanupdate[{{$index}}][cara_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilanupdate.{{$index}}.cara_riwayat"
                                       value="{{ old('cara_riwayat') }}"
                                       placeholder="Masukan Cara"
                                       >
                                </textarea>
                            </td>
                            <td class="col-sm-3">
                                <textarea
                                       name="riwayatkehamilanupdate[{{$index}}][ket_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilanupdate.{{$index}}.ket_riwayat"
                                       value="{{ old('ket_riwayat') }}"
                                       placeholder="Masukan Keterangan"
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
                            wire:click.prevent="addRiwayatKehamilanUpdate">+ Add Riwayat</button>
                    </div>
                </div>
            </div>
 </div>
                <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                     <a href="{{ route('riwayatkehamilan.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </form>
        </div>
    </div>

@push('additional')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>

          <script>
              $(document).ready(function(){

                    var table = $('#table_data_riwayat').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [0, "asc"],
                            [1, "asc"],
                            [2, "asc"],
                            [3, "asc"],
                            [4, "asc"],
                        ],
                        ajax:{
                            url: "{!! URL::to('poli-ibu/get-riwayat/'.$model->id) !!}"
                        },
                        columnDefs: [
                            { targets: '_all', visible: true},
                            {
                                "targets": 0,
                                data: 'no',
                                name: 'no'
                            },
                            {
                                "targets": 1,
                                data: 'umur',
                                name: 'umur'
                            },
                            {
                                "targets": 2,
                                data: 'partus',
                                name: 'partus'
                            },
                            {
                                "targets": 3,
                                data: 'cara',
                                name: 'cara'
                            },
                            {
                                "targets": 4,
                                data: 'keterangan',
                                name: 'keterangan'
                            },
                        ],

                    })


              });

          </script>
@endpush
