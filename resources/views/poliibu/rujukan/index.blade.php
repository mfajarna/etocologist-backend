<x-content>
    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <x-slot name="header">

        <x-header.header-poli-ibu-component>
        {{ __('Rujukan Apotek') }}
        </x-header.header-poli-ibu-component>
    </x-slot>
    <div class="py-12 container">
       @if($errors->any())
        <div class="mb-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi kesalahan dalam pengimputan data!</h4>
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

         @livewire('rujukan', [
             'model' => $model,
             'hasil_kode' => $hasil_kode
         ])
    </div>
        @push('additional')
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
          <script src="https://code.jquery.com/jquery-1.12.4.js" defer></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

         <script>

              $(document).ready(function(){
                $('#id_ibu').select2();
              });

            function autofill(sel)
            {
               var nama_pasien = sel.value;

               $.ajax({
                   url: "{!! URL::to('poli-anak/getIbu') !!}",
                   data : 'id=' + nama_pasien,
               }).success(function (data) {
                    var json = data;

                    $("#nama_suami").val(json.nama_suami)
                    $('#umur').val(json.umur)
                    $('#umur_suami').val(json.umur_suami)
                    $('#pekerjaan').val(json.pekerjaan)
                    $('#pekerjaan_suami').val(json.pekerjaan_suami)
                    $('#no_telp').val(json.no_telp)
                    $('#alamat').val(json.alamat)
               });
            }
        </script>


        @endpush
</x-content>
