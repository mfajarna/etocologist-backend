<x-content>
    @push('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
     @endpush
      <x-slot name="header">
        <x-header.header-gudang-farmasi-component>
            {{ __('Pemasukan Obat Alkes') }}
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
        @endif
        <div class="card">
            <div class="card-header">
                Buat Pemasukan Obat Alkes
            </div>
            <div class="card-body">
                <form action="{{ route('informasi-obat.store') }}" class="w-full" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="obat_id">Nama Obat</label>
                        <select name="obat_id" class="form-control" id="obat_id" onchange="autofill()">
                             <option value="" disabled selected>-- Pilih Nama Obat --</option>
                            @foreach ($data as $item )
                            <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                                @endforeach
                        </select>
                    <small id="obat_id" class="form-text text-muted">Pilih nama obat yang tersedia.</small>
                    </div>
                    <div class="form-group">
                        <label for="jenis_obat">Jenis Obat</label>
                        <input type="text" class="form-control" id="jenis_obat" name="jenis_obat" aria-describedby="jenis_obat" placeholder="Masukan Nama Obat" disabled>
                        <small id="jenis_obat" class="form-text text-muted">Contoh nama obat: Panadol, Paramol, FG Trosis</small>
                    </div>
                    <div class="form-group">
                        <label for="sediaan">Sediaan</label>
                        <input type="number" class="form-control" id="sediaan" name="sediaan" aria-describedby="sediaan" placeholder="Masukan Sediaan Obat" value={{ old('sediaan') }} >

                    </div>
                    <div class="form-group">
                        <label for="tanggal_periode">Tanggal Masuk Obat</label>
                        <div class='input-group date' id='tgl_masuk'>
                            <input type='text' class="form-control" id='tgl_masuk' name="tgl_masuk" placeholder="-- Pilih Bulan Periode --" value="{{ old('tgl_masuk') }}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                <div class="mt-2">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                     <a href="{{ route('informasi-obat.index') }}" class="btn btn-outline-secondary" role="button">Kembali</a>
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    @push('additional')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js" defer></script>
    <script>
        function autofill(){
             var selectBox = document.getElementById("obat_id");
             var id_obat = selectBox.options[selectBox.selectedIndex].value;


            $.ajax({
                url: "{{ route('informasi-obat.autofill') }}",
                type: 'GET',
                data: {id:id_obat},
                success: function(data)
                {
                    var json = data,
                    obj = JSON.parse(json);

                    if(id_obat != ""){
                    $('#jenis_obat').val(obj.jenis_obat);
                    }else if(id_obat == "")
                    {
                    $('#jenis_obat').val("");
                    }
                }
            });
        }

        $(document).ready(function(){
                    $('#tgl_masuk').datepicker({
                        format: "dd-MM-yyyy",
        });
        });
    </script>
    @endpush
</x-content>
