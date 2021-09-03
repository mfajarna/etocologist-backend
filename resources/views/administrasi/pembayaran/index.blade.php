<x-administrasi>
    @section('content')
            @include('layouts.headers.content')

     <div class="container-fluid mt--7">
         @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Sukses!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @if (session('fail'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>Gagal Melakukan Transaksi!</strong> {{ session('fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('updatesuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Sukses!</strong> {{ session('updatesuccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('hapus'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Sukses!</strong> {{ session('hapus') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
         <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white-default shadow">
                    <div class="card-header bg-transparent">
                        <h6 class="text-uppercase text-black ls-1 mb-1">Pembayaran</h6>
                        <h2 class="text-black mb-0">Pembayaran Layanan Klinik</h2>
                    </div>
                    <div class="card-body">
                            <div class="row g-3">
                                    <div class="col-sm-4">

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="kode_rujukan" class="form-control-label">Masukan Kode Rujukan </label>
                                                    <input type="text" class="form-control form-control-alternative" id="kode_rujukan" name="kode_rujukan" aria-describedby="kode_rujukan" placeholder="Masukan Kode Rujukan" onkeyup="autofill(this)" autofocus required>
                                                </div>
                                                <div class="col">
                                            <div class="text-center mt-2 mr-6">
                                                <button type="submit" onclick="pembayaran()" class="btn btn-success mt-4">{{ __('Proses') }}</button>
                                            </div>
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                    </div>
                            </div>
                            <div class="row g-3">
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control form-control-alternative" id="id_rujukan" name="id_rujukan" aria-describedby="id_rujukan" placeholder="Nama Pasien Ibu" required readonly>
                                        <div class="form-group">
                                            <label for="nama_ibu" class="form-control-label">Nama Pasien Ibu</label>
                                            <input type="text" class="form-control form-control-alternative" id="nama_ibu" name="nama_ibu" aria-describedby="nama_ibu" placeholder="Nama Pasien Ibu" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama_suami" class="form-control-label">Nama Suami Pasien</label>
                                            <input type="text" class="form-control form-control-alternative" id="nama_suami" name="nama_suami" aria-describedby="nama_suami" placeholder="Nama Suami Pasien" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="alamat" class="form-control-label">Alamat</label>
                                            <textarea class="form-control form-control-alternative" id="alamat" name="alamat" placeholder="Nama Alamat Pasien Ibu" readonly> </textarea>
                                        </div>
                                    </div>
                            </div>

                    </div>
                </div>
            </div>
         </div>
     </div>
    @endsection
    @push('js')
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
          <script src="https://code.jquery.com/jquery-1.12.4.js" defer></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>


          <script>

            function autofill(sel)
            {
               var kode_rujukan = sel.value;

               $.ajax({
                   url: "{!! URL::to('getRujukan') !!}",
                   data : 'kode_rujukan=' + kode_rujukan,
               }).success(function (data) {
                    var json = data;

                    console.log(json[0])
                    $("#nama_ibu").val(json[0].ibu.nama)
                    $("#nama_suami").val(json[0].ibu.nama_suami)
                    $("#alamat").val(json[0].ibu.alamat)
                    $("#id_rujukan").val(json[0].id);
               });
            }

            function pembayaran(){
                var id_rujukan = $('#id_rujukan').val();

                window.location.href='pembayaran-pasien/'+id_rujukan
            }
          </script>
@endpush
</x-administrasi>
