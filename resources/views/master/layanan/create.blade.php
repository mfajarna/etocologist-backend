<x-content>
    <x-slot name="header">
        <x-header.header-layanan-component>
        {{ __('Tambah Layanan') }}
        </x-header.header-layanan-component>
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
                Buat Jenis Layanan Baru
             </div>
         <div class="card-body">
             <form action="{{ route('layanan.store') }}" class="w-full" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_layanan">Nama Layanan</label>
                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" aria-describedby="jenisobat" placeholder="Masukan Nama Layanan" value="{{ old('nama_layanan') }}">
                    <small id="nama_layanan" class="form-text text-muted">Contoh nama layanan: Baby Spa, Kontrol USG</small>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Layanan</label>
                    <input type="number" class="form-control" id="harga" name="harga" aria-describedby="jenisobat" placeholder="Harga Layanan" value="{{ old('harga') }}">

                </div>
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                     <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>

            </form>
         </div>
        </div>
</x-content>
