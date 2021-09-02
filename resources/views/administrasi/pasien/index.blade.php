<x-administrasi>
@section('content')
    @include('layouts.headers.content')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white-default shadow">
                    <div class="card-header bg-transparent">
                        <h6 class="text-uppercase text-black ls-1 mb-1">Input Pasien</h6>
                        <h2 class="text-black mb-0">Masukan Data Pasien Baru</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('inputpasien.store') }}" class="w-full" method="POST">
                            @csrf

                                <div class="row g-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama" class="form-control-label">Nama Pasien Ibu</label>
                                            <input type="text" class="form-control form-control-alternative" id="nama" name="nama" aria-describedby="nama" placeholder="Masukan Nama Pasien Ibu" value="{{ old('nama') }}" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nama_suami" class="form-control-label">Nama Suami</label>
                                            <input type="text" id="nama_suami" name="nama_suami" class="form-control form-control-alternative" aria-describedby="nama_suami" placeholder="Masukan Nama Suami Pasien" value="{{ old('nama_suami') }}">
                                            <small id="nama_suami" class="form-text text-muted">*Catatan: Kosongkan jika tidak ada</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kelurahan" class="form-control-label">Kelurahan</label>
                                            <input type="text" class="form-control form-control-alternative" id="kelurahan" name="kelurahan" aria-describedby="kelurahan" placeholder="Masukan Nama Kelurahan" value="{{ old('kelurahan') }}">
                                            <small id="kelurahan" class="form-text text-muted">*Contoh: Baleendah, Banjaran, Bojongsoang</small>
                                        </div>
                                    </div>
                                </div>

                    <div class="row g-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="umur" class="form-control-label" >Umur Pasien Ibu</label>
                                    <input type="number" class="form-control form-control-alternative" id="umur" name="umur" aria-describedby="umur" placeholder="Masukan Umur Pasien Ibu" value="{{ old('umur') }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="umur_suami" class="form-control-label">Umur Suami Pasien</label>
                                    <input type="number" class="form-control form-control-alternative" id="umur_suami" name="umur_suami" aria-describedby="umur_suami" placeholder="Masukan Umur Suami Pasien" value="{{ old('umur_suami') }}">
                                    <small id="umur_pasien" class="form-text text-muted">*Kosongkan jika tidak ada</small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="posyandu" class="form-control-label">Posyandu</label>
                                    <input type="text" class="form-control form-control-alternative" id="posyandu" name="posyandu" aria-describedby="posyandu" placeholder="Masukan Nama Posyandu" value="{{ old('posyandu') }}">
                                    <small id="posyandu" class="form-text text-muted">*Masukan nama posyandu</small>
                                </div>
                            </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan Pasien Ibu</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" aria-describedby="pekerjaan" placeholder="Masukan Nama Pekerjaan" value="{{ old('pekerjaan') }}">
                                <small id="pekerjaan" class="form-text text-muted">*Jika tidak ada, inputkan saja ibu rumah tangga</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="pekerjaan_suami">Pekerjaan Suami Pasien Ibu</label>
                                <input type="text" class="form-control" id="pekerjaan_suami" name="pekerjaan_suami" aria-describedby="pekerjaan_suami" placeholder="Masukan Nama Pekerjaan Suami" value="{{ old('pekerjaan_suami') }}">
                                <small id="pekerjaan_suami" class="form-text text-muted">*Kosongkan jika tidak ada</small>
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
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
</x-administrasi>
