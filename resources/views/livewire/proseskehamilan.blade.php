<div class="accordion" id="accordionExample">
         <div class="card">
            <div class="card-header " id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         <svg enable-background="new 0 0 32 32" width="14pt" id="Слой_1" version="1.1" viewBox="0 4 32 32"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.285,11.284L16,19.571l-8.285-8.288c-0.395-0.395-1.034-0.395-1.429,0  c-0.394,0.395-0.394,1.035,0,1.43l8.999,9.002l0,0l0,0c0.394,0.395,1.034,0.395,1.428,0l8.999-9.002  c0.394-0.395,0.394-1.036,0-1.431C25.319,10.889,24.679,10.889,24.285,11.284z" fill="#828282" id="Expand_More"/><g/><g/><g/><g/><g/><g/></svg> Data Pasien Ibu
                        </button>
                    </h2>
            </div>
             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="id_ibu">Nama Pasien Ibu</label>
                                <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" value="{{ $data->ibu->nama }}" readonly>
                            <small id="id_ibu" class="form-text text-muted">*Nama Pasien Ibu Yang Sudah Terdaftar</small>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nama_suami">Nama Suami</label>
                                <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" value="{{ $data->ibu->nama_suami }}" readonly>
                                <small id="id_ibu" class="form-text text-muted">*Nama Suami Pasien Yang Sudah Terdaftar</small>
                            </div>
                        </div>
                         <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nama_suami">Umur</label>
                                <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" value="{{ $data->ibu->umur }}" readonly>
                                <small id="id_ibu" class="form-text text-muted">*Umur pasien ibu</small>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nama_suami">Alamat</label>
                                <textarea type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" readonly>{{ $data->ibu->alamat }} </textarea>
                                <small id="id_ibu" class="form-text text-muted">*Alamat Rumah Pasien</small>
                            </div>
                        </div>
                    </div>

                </div>
             </div>
            </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   <svg enable-background="new 0 0 32 32" width="14pt" id="Слой_1" version="1.1" viewBox="0 4 32 32"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M24.285,11.284L16,19.571l-8.285-8.288c-0.395-0.395-1.034-0.395-1.429,0  c-0.394,0.395-0.394,1.035,0,1.43l8.999,9.002l0,0l0,0c0.394,0.395,1.034,0.395,1.428,0l8.999-9.002  c0.394-0.395,0.394-1.036,0-1.431C25.319,10.889,24.679,10.889,24.285,11.284z" fill="#828282" id="Expand_More"/><g/><g/><g/><g/><g/><g/></svg> Data Riwayat Kehamilan
                    </button>
            </h2>
            </div>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
         <div class="card-body">
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="gpa">G.P.A</label>
                            <input type="text" class="form-control" id="gpa" name="gpa" aria-describedby="gpa" placeholder="Masukan GPA" value="{{ $data->gpa }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jarak_kehamilan">Jarak Kehamilan</label>
                            <input type="text" class="form-control" id="jarak_kehamilan" name="jarak_kehamilan" aria-describedby="jarak_kehamilan" placeholder="Masukan Jarak Kehamilan" value="{{ $data->jarak_kehamilan }}" readonly>
                            <small id="jarak_kehamilan" class="form-text text-muted">*Jarak kehamilan pasien ibu</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="siklus_haid">Siklus Haid</label>
                            <input type="text" class="form-control" id="siklus_haid" name="siklus_haid" aria-describedby="siklus_haid" placeholder="Masukan Siklus Haid" value="{{ $data->siklus_haid }}" readonly>
                            <small id="siklus_haid" class="form-text text-muted">*Siklus haid pasien</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kb_sebelum_hamil">Tinggi Badan</label>
                            <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" aria-describedby="tinggi_badan" placeholder="Masukan Tinggi Badan" value="{{ $data->tinggi_badan }}" readonly>
                            <small id="tinggi_badan" class="form-text text-muted">*Tinggi Badan</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kb_sebelum_hamil">KB Sebelum Hamil</label>
                            <input type="text" class="form-control" id="kb_sebelum_hamil" name="kb_sebelum_hamil" aria-describedby="kb_sebelum_hamil" placeholder="Masukan KB Sebelum Hamil" value="{{ $data->kb_sebelum_hamil }}" readonly>
                            <small id="siklus_haid" class="form-text text-muted">*Kb sebelum hamil</small>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="riwayat_penyakit">Riwayat Penyakit</label>
                            <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" aria-describedby="htpt" placeholder="Masukan Riwaya Penyakit Pasien" readonly>{{ $data->riwayat_penyakit }}</textarea>
                            <small id="riwayat_penyakit" class="form-text text-muted">*Riwayat penyakit pasien  </small>
                        </div>
                    </div>
               </div>

               {{-- Table --}}
            </div>
               <div class="card">
                <div class="card-header">
                    Data Riwayat Persalinan
                </div>
                <div class="card-body">
                    <table id="table_data_riwayat" class="table table-bordered center">
                        <thead>
                            <tr >
                                <th>No</th>
                                <th class="col">Umur</th>
                                <th class="col-4">Partus o/</th>
                                <th class="col-4">Cara</th>
                                <th class="col-4">Ket</th>
                            </tr>
                        </thead>
                    </table>
                </div>
               </div>
          </div>
          </div>

<form action="{{ route('proseskehamilan.store') }}" class="w-full" method="POST">
        @csrf
            <div class="card">
               <div class="card-header">
                   Data Proses Persalinan
               </div>
                <div class="card-body">
                <div>
                    <table class="table table-responsive" id="products_table">
                        <thead>
                        <tr class="d-flex">
                            <th class="col-2">Tanggal</th>
                            <th class="col-2" >Umur Kehamilan</th>
                            <th class="col-2" >K</th>
                            <th class="col-2">HB</th>
                            <th class="col-2">LILA</th>
                            <th class="col-2">Berat Badan</th>
                            <th class="col-2">Tinggi Fut</th>
                            <th class="col-2">Letak Janin</th>
                            <th class="col-2">dda</th>
                            <th class="col-2">Keluhan</th>
                            <th class="col-2">Tindakan</th>
                            <th class="col-2">Konseling</th>
                            <th class="col-2">N/R</th>
                            <th class="col-2">Paraf</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($proseskehamilan as $index => $riwayat)
                        <input type="hidden"
                                        name="proseskehamilan[{{$index}}][id_riwayat]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.id_riwayat"

                                    />
                            <tr class="d-flex">
                                <td class="col-2">
                                    <input type="date"
                                        name="proseskehamilan[{{$index}}][tanggal]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.tanggal"
                                        value="{{ old('tanggal') }}" required
                                    />
                                </td>
                                 <td class="col-2">
                                    <input type="number"
                                        name="proseskehamilan[{{$index}}][umur_kehamilan]"
                                        class="form-control"
                                        placeholder="Masukan Umur Kehamilan"
                                        wire:model="proseskehamilan.{{$index}}.umur_kehamilan"
                                        value="{{ old('umur_kehamilan') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][k]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.k"
                                        placeholder="Masukan K"
                                        value="{{ old('k') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][hb]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.hb"
                                        placeholder="Masukan HB"
                                        value="{{ old('hb') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][lila]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.lila"
                                        placeholder="Masukan LILA"
                                        value="{{ old('lila') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="number"
                                        name="proseskehamilan[{{$index}}][bb]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.bb"
                                        placeholder="Masukan Berat Badan"
                                        value="{{ old('bb') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="number"
                                        name="proseskehamilan[{{$index}}][tinggi_fut]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.tinggi_fut"
                                        placeholder="Masukan Tinggi Fut"
                                        value="{{ old('tinggi_fut') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][letak_janin]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.letak_janin"
                                        placeholder="Masukan Letak Janin"
                                        value="{{ old('letak_janin') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][dda]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.dda"
                                        placeholder="Masukan DDA"
                                        value="{{ old('dda') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                    <textarea
                                        name="proseskehamilan[{{$index}}][keluhan]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.keluhan"
                                        placeholder="Masukan keluhan"
                                        value="{{ old('keluhan') }}" required
                                    >
                                    </textarea>
                                </td>
                                <td class="col-2">
                                        <select name="proseskehamilan[{{$index}}][tindakan]" id="tindakan" class="form-control"  wire:model="proseskehamilan.{{$index}}.tindakan" required>
                                        <option value="" disabled selected>-- Tindakan --</option>
                                            <option value="th">Th/</option>
                                            <option value="fe">Fe</option>
                                            <option value="tt">TT</option>
                                        </select>
                                </td>
                                <td class="col-2">
                                    <textarea
                                        name="proseskehamilan[{{$index}}][konseling]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.konseling"
                                        placeholder="Masukan konseling"
                                        value="{{ old('konseling') }}" required
                                    >
                                    </textarea>
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][n/r]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.n/r"
                                        placeholder="Masukan n/r"
                                        value="{{ old('n/r') }}" required
                                    />
                                </td>
                                <td class="col-2">
                                        <select name="proseskehamilan[{{$index}}][paraf]" id="paraf" class="form-control" wire:model="proseskehamilan.{{$index}}.paraf" required>
                                        <option value="" disabled selected>-- Status Paraf --</option>
                                            <option value="Sudah Di Paraf">Sudah Di Paraf</option>
                                            <option value="Belum">Belum Di Paraf</option>
                                    </div>
                            <td>
                                <a href="#" wire:click.prevent="removeRiwayat({{$index}})">Hapus</a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addRiwayat">+ Add Riwayat</button>
                    </div>
                </div>
            </div>
            </div>
                <div class="mt-2 mb-4">
                    <button class="btn btn-success" type="submit">Simpan</button>
                     <a href="{{ route('proseskehamilan.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </form>
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
                            url: "{!! URL::to('poli-ibu/get-riwayat/'.$id_riwayat) !!}"
                        },
                        columnDefs: [
                            { targets: '_all', visible: true},
                            {
                                "targets": 0,
                                "class": "col-12",
                                data: 'no',
                                name: 'no'
                            },
                            {
                                "targets": 1,
                                "class": "",
                                data: 'umur',
                                name: 'umur'
                            },
                            {
                                "targets": 2,
                                "class": "",
                                data: 'partus',
                                name: 'partus'
                            },
                            {
                                "targets": 3,
                                "class": "",
                                data: 'cara',
                                name: 'cara'
                            },
                            {
                                "targets": 4,
                                "class": "",
                                data: 'keterangan',
                                name: 'keterangan'
                            },
                        ],

                    })


              });

          </script>
    @endpush
