<div class="card">
             <div class="card-header">
                Buat Rujukan Pasien
             </div>
         <div class="card-body">
             <form action="{{ route('inputpasien.addrujukan') }}" class="w-full" method="POST">
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
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Data Rujukan Pasien
                    </div>
                    <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="kode_rujukan">Kode Rujukan</label>
                                        <input type="text" class="form-control" id="kode_rujukan" name="kode_rujukan" aria-describedby="kode_rujukan"  value="{{ old('kode_rujukan') ?? $hasil_kode }} " readonly>
                                        <small id="kode_rujukan" class="form-text text-muted">*Kode Rujukan Untuk Diserahkan di apotek</small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    <label for="catatan_obat">Catatan</label>
                                    <textarea class="form-control" id="catatan_obat" name="catatan_obat" aria-describedby="htpt" placeholder="Masukan Catatan Obat" value="{{ old('catata_obat') }}"></textarea>
                                    <small id="catatan_obat" class="form-text text-muted">*Catatan Obat</small>
                                </div>
                            </div>

                    </div>
            </div>
            <div class="card-header">
                Masukan Layanan
            </div>
            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th class="text-center">Nama Layanan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_keluhan as $index => $riwayat)
                        <tr>
                            <td class="col-sm-12">
                                <select name="data_keluhan[{{$index}}][nama_layanan]" id="nama_layanan" class="form-control" wire:model="data_keluhan.{{$index}}.nama_layanan" required>
                                    <option value="" disabled selected>-- Pilih Nama Layanan --</option>
                                        @foreach ($layanan as $item )
                                            <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                                        @endforeach
                                    </select>
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeRiwayat({{$index}})">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-4">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addRiwayat">+ Add Layanan</button>
                    </div>
                </div>
            </div>
            <div class="card-header">
                Masukan Resep Obat
            </div>
            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                    <tr>
                        <th class="text-center">Nama Obat</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_obat as $index => $riwayat)

                        <tr>
                            <td class="col-sm-6">
                                <select name="data_obat[{{$index}}][nama_obat]" id="nama_obat" class="form-control" wire:model="data_obat.{{$index}}.nama_obat" required>
                                    <option value="" disabled selected>-- Pilih Nama Obat --</option>
                                        @foreach ($obat as $item )
                                            <option value="{{ $item->id }}">{{ $item->obat->nama_obat }}</option>
                                        @endforeach
                                </select>
                            </td>
                            <td class="col-sm-4">
                                <input type="number"
                                       name="data_obat[{{$index}}][quantity]"
                                       class="form-control"
                                       wire:model="data_obat.{{$index}}.quantity"
                                       placeholder="Masukan Jumlah Obat"
                                       value="{{ old('quantity') }}"
                                       />
                            </td>
                            <td>
                                <a href="#" wire:click.prevent="removeObat({{$index}})">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-4">
                        <button class="btn btn-sm btn-secondary"
                            wire:click.prevent="addObat">+ Add Resep Obat</button>
                    </div>
                </div>
             <div class="mt-2">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <button class="btn btn-outline-secondary" type="reset">Reset</button>
                </div>

            </form>

         </div>
