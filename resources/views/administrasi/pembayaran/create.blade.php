 <x-administrasi>
    @section('content')
            @include('layouts.headers.content')

     <div class="container-fluid mt--7">
         <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white-default shadow">
                    <div class="card-header bg-transparent">
                        <h6 class="text-uppercase text-black ls-1 mb-1">Pembayaran</h6>
                        <h2 class="text-black mb-0">Proses Pembayaran Layanan Klinik</h2>
                    </div>
                    <div class="card-body">
                         <form action="{{ route('pasien.store') }}" class="w-full" method="POST">
                            @csrf
                            <div class="row g-3">
                                     <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama" class="form-control-label">Nama Pasien Ibu</label>
                                            <input type="text" class="form-control form-control-alternative" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan Nama Pasien Ibu" value="{{ $model[0]['ibu']['nama'] }}" autofocus readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama_suami" class="form-control-label">Nama Suami</label>
                                            <input type="text" id="nama_suami" name="nama_suami" class="form-control form-control-alternative" aria-describedby="nama_suami" placeholder="Masukan Nama Suami Pasien" value="{{ $model[0]['ibu']['nama_suami'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="alamat" class="form-control-label">Alamat</label>
                                            <textarea  class="form-control form-control-alternative" id="alamat" name="alamat" aria-describedby="alamat" placeholder="Masukan Alamat" readonly> {{ $model[0]['ibu']['alamat'] }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <h6 class="text-uppercase text-black ls-1 mb-1">Data Layanan</h6>
                                    
                          
                                </div>

                            </div>
                            </div>
                         </form>
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
