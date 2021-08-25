<form action="{{ route('proseskehamilan.store') }}" class="w-full" method="POST">
        @csrf
         <div class="card">

            {{-- <div class="card-header">
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
                            <input type="text" class="form-control" id="kb_sebelum_hamil" name="kb_sebelum_hamil" aria-describedby="kb_sebelum_hamil" placeholder="Masukan KB Sebelum Hamil" value="{{ old('kb_sebelum_hamil') }}">
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
               </div> --}}

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
                            <tr class="d-flex">
                                <td class="col-2">
                                    <input type="date"
                                        name="proseskehamilan[{{$index}}][tanggal]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.tanggal"
                                        value="{{ old('tanggal') }}"
                                    />
                                </td>
                                 <td class="col-2">
                                    <input type="number"
                                        name="proseskehamilan[{{$index}}][umur_kehamilan]"
                                        class="form-control"
                                        placeholder="Masukan Umur Kehamilan"
                                        wire:model="proseskehamilan.{{$index}}.umur_kehamilan"
                                        value="{{ old('umur_kehamilan') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][k]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.k"
                                        placeholder="Masukan K"
                                        value="{{ old('k') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][hb]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.hb"
                                        placeholder="Masukan HB"
                                        value="{{ old('hb') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][lila]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.lila"
                                        placeholder="Masukan LILA"
                                        value="{{ old('lila') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="number"
                                        name="proseskehamilan[{{$index}}][berat_badan]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.berat_badan"
                                        placeholder="Masukan Berat Badan"
                                        value="{{ old('berat_badan') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][tinggi_fut]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.tinggi_fut"
                                        placeholder="Masukan Tinggi Fut"
                                        value="{{ old('tinggi_fut') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][letak_janin]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.letak_janin"
                                        placeholder="Masukan Letak Janin"
                                        value="{{ old('letak_janin') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][dda]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.dda"
                                        placeholder="Masukan DDA"
                                        value="{{ old('dda') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <textarea
                                        name="proseskehamilan[{{$index}}][keluhan]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.keluhan"
                                        placeholder="Masukan keluhan"
                                        value="{{ old('keluhan') }}"
                                    >
                                    </textarea>
                                </td>
                                <td class="col-2">
                                     <div class="form-group">
                                        <select name="proseskehamilan[{{$index}}][tindakan]" id="tindakan" class="form-control">
                                        <option value="" disabled selected>-- Tindakan --</option>
                                            <option value="th">Th/</option>
                                            <option value="fe">Fe</option>
                                            <option value="tt">TT</option>
                                        </select>
                                </div>
                                </td>
                                <td class="col-2">
                                    <textarea
                                        name="proseskehamilan[{{$index}}][konseling]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.konseling"
                                        placeholder="Masukan konseling"
                                        value="{{ old('konseling') }}"
                                    >
                                    </textarea>
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][n/r]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.n/r"
                                        placeholder="Masukan n/r"
                                        value="{{ old('n/r') }}"
                                    />
                                </td>
                                <td class="col-2">
                                    <input type="text"
                                        name="proseskehamilan[{{$index}}][paraf]"
                                        class="form-control"
                                        wire:model="proseskehamilan.{{$index}}.paraf"
                                        placeholder="Masukan paraf"
                                        value="{{ old('paraf') }}"
                                    />
                                </td>
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
        {{-- <script>
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
        </script> --}}
    @endpush
