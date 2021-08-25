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
                Ubah Jenis Obat <?= $item->nama_jenis_obat ?>
             </div>
         <div class="card-body">
             <form action="{{ route('jenisobat.update', $item->id) }}" class="w-full" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_jenis_obat">Nama Jenis Obat</label>
                    <input type="type" class="form-control" id="nama_jenis_obat" name="nama_jenis_obat" aria-describedby="jenisobat" placeholder="Masukan Nama Jenis Obat" value="{{ old('nama_jenis_obat') ?? $item->nama_jenis_obat }}">
                    <small id="jenisobat" class="form-text text-muted">Contoh nama jenis obat: Analgesik, Antasida, Antibiotik</small>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="{{ route('jenisobat.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
            </form>
         </div>
        </div>
</x-content>
