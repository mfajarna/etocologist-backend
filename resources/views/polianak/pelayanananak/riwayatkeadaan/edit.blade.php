<x-content>
     @push('head')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     @endpush
    </head>
     <x-slot name="header">
        <x-header.header-poli-anak-component>
            {{ __('Input Riwayat Keadaan Anak') }}
        </x-header.header-poli-anak-component>
    </x-slot>

    <div class="py-12 container">
       @if($errors->any())
        <div class="mb-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi kesalahan dalam pengimputan data pasien!</h4>
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

        @livewire('riwayatkeadaanupdate',[
            'model' => $model,
            'anak_id' => $anak_id
        ]);
    </div>

</x-content>


