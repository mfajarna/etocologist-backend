<x-content>
    <x-slot name="header">
        <x-header.header-gudang-farmasi-component>
        {{ __('Menu Jenis Obat Alkes') }}
        </x-header.header-gudang-farmasi-component>
    </x-slot>
    <div class="py-12 container">
       @if($errors->any())
        <div class="mb-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi kesalahan dalam pengimputan data jenis obat!</h4>
                <p>
                    <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </p>
        </div>
        </div>
        @endif
         <div class="card">
             <div class="card-header">
                Buat Obat Baru
             </div>
         <div class="card-body">
             <form action="{{ route('obat.store') }}" class="w-full" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="type" class="form-control" id="nama_obat" name="nama_obat" aria-describedby="nama_obat" placeholder="Masukan Nama Obat" value="{{ old('nama_obat') }}">
                    <small id="nama_obat" class="form-text text-muted">Contoh nama obat: Panadol, Paramol, FG Trosis</small>
                </div>
                <div class="form-group">
                    <label for="jenis_obat">Jenis Obat</label>
                    <select name="jenis_obat" id="jenis-obat" class="form-control" placeholder="hehe">
                            <option value="" disabled selected>-- Pilih Jenis Obat --</option>
                                @foreach ($model as $data )
                            <option value="{{ $data->nama_jenis_obat }}">{{ $data->nama_jenis_obat }}</option>
                                @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                     <a href="{{ route('jenisobat.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>

            </form>
         </div>
        </div>
</x-content>
