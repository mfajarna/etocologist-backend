<form action="{{ route('riwayatkehamilan.store') }}" class="w-full" method="POST">
        @csrf

         <div class="card">
            <div class="card-header">
                Data Pasien Ibu
             </div>
             <div class="card-body">
                 <div class="row g-3">
                    <div class="col-sm-4">
                         <div class="form-group">
                            <label for="id_ibu">Nama Pasien Ibu</label>
                            <select name="id_ibu" id="id_ibu" class="form-control" placeholder="" onchange="autofill(this)">
                            <option value="" disabled selected>-- Pilih Nama Pasien --</option>
                                @foreach ($model as $data )
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        <small id="id_ibu" class="form-text text-muted">*Nama Pasien Ibu Yang Sudah Terdaftar</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama_suami">Nama Suami</label>
                            <input type="text" class="form-control" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Masukan Nama Suami" readonly>
                        </div>
                    </div>
                 </div>
             </div>
            <div class="card-header">
                Data Riwayat Kehamilan
            </div>
         <div class="card-body">
               <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="gpa">G.P.A</label>
                            <input type="text" class="form-control" id="gpa" name="gpa" aria-describedby="gpa" placeholder="Masukan GPA" value="{{ old('gpa') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jarak_kehamilan">Jarak Kehamilan</label>
                            <input type="text" class="form-control" id="jarak_kehamilan" name="jarak_kehamilan" aria-describedby="jarak_kehamilan" placeholder="Masukan Jarak Kehamilan" value="{{ old('jarak_kehamilan') }}">
                            <small id="jarak_kehamilan" class="form-text text-muted">*Masukan jarak kehamilan pasien ibu</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="siklus_haid">Siklus Haid</label>
                            <input type="text" class="form-control" id="siklus_haid" name="siklus_haid" aria-describedby="siklus_haid" placeholder="Masukan Siklus Haid" value="{{ old('siklus_haid') }}">
                            <small id="siklus_haid" class="form-text text-muted">*siklus haid pasien</small>
                        </div>
                    </div>
               </div>
               <div class="row g-3">
                   <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kb_sebelum_hamil">Tinggi Badan</label>
                            <input type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" aria-describedby="tinggi_badan" placeholder="Masukan Tinggi Badan" value="{{ old('tinggi_badan') }}">
                            <small id="tinggi_badan" class="form-text text-muted">*Tinggi Badan</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kb_sebelum_hamil">KB Sebelum Hamil</label>
                            <input type="text" class="form-control" id="kb_sebelum_hamil" name="kb_sebelum_hamil" aria-describedby="kb_sebelum_hamil" placeholder="Masukan Tinggi Badan" value="{{ old('kb_sebelum_hamil') }}">
                            <small id="siklus_haid" class="form-text text-muted">*Kb sebelum hamil</small>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="riwayat_penyakit">Riwayat Penyakit</label>
                            <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" aria-describedby="htpt" placeholder="Masukan Riwaya Penyakit Pasien" value="{{ old('riwayat_penyakit') }}"></textarea>
                            <small id="riwayat_penyakit" class="form-text text-muted">*Riwayat penyakit pasien  </small>
                        </div>
                    </div>
               </div>

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
                    @foreach ($riwayatkehamilans as $index => $riwayat)
                        <tr>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatkehamilans[{{$index}}][no_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilans.{{$index}}.no_riwayat"
                                       placeholder="Masukan No Riwayat"
                                       value="{{ old('no_riwayat') }}"
                                       />
                            </td>
                            <td class="col-sm-2">
                                <input type="number"
                                       name="riwayatkehamilans[{{$index}}][umur_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilans.{{$index}}.umur_riwayat"
                                       placeholder="Masukan Umur"
                                       value="{{ old('umur_riwayat') }}"
                                       />

                            </td>
                            <td class="col-sm-2">
                                <input type="text"
                                       name="riwayatkehamilans[{{$index}}][partus_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilans.{{$index}}.partus_riwayat"
                                       placeholder="Masukan Partus"
                                       value="{{ old('partus_riwayat') }}"
                                       />
                            </td>
                            <td class="col-sm-3">
                                <textarea
                                       name="riwayatkehamilans[{{$index}}][cara_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilans.{{$index}}.cara_riwayat"
                                       value="{{ old('cara_riwayat') }}"
                                       placeholder="Masukan Cara"
                                       >
                                </textarea>
                            </td>
                            <td class="col-sm-3">
                                <textarea
                                       name="riwayatkehamilans[{{$index}}][ket_riwayat]"
                                       class="form-control"
                                       wire:model="riwayatkehamilans.{{$index}}.ket_riwayat"
                                       value="{{ old('ket_riwayat') }}"
                                       placeholder="Masukan Keterangan"
                                       >

                                </textarea>
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeRiwayat({{$index}})">Delete</a>
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

                <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                     <a href="{{ route('riwayatkehamilan.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    @push('additional')
          <script src="https://code.jquery.com/jquery-1.12.4.js" defer></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
        <script>
            function autofill(sel)
            {
               var nama_pasien = sel.value;

               $.ajax({
                   url: "{!! URL::to('poli-ibu/getPasien') !!}",
                   data : 'id=' + nama_pasien,
               }).success(function (data) {
                    var json = data;


                    $("#nama_suami").val(json.nama_suami)
               });
            }
        </script>
    @endpush
