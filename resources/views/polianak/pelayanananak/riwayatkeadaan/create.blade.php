<x-content>
     @push('head')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
     @endpush

     <x-slot name="header">
        <x-header.header-poli-anak-component>
            {{ __('Riwayat Keadaan Anak') }}
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

        @livewire('riwayatkeadaan')
    </div>

</x-content>


