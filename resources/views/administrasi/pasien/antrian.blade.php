<x-administrasi>
@section('content')
    @include('layouts.headers.content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-white-default shadow">
                    <div class="card-header bg-transparent">
                        <h6 class="text-uppercase text-black ls-1 mb-1">Antrian</h6>
                        <h2 class="text-black mb-0">List Antrian Pengunjung</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-4">
                            <table id="table_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr align="center">
                                            <th>No Antrian</th>
                                            <th>Nama Pasien</th>
                                            <th>Tujuan Poli</th>
                                            <th>Status</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>

    <script>
            $(document).ready(function(){
                  var t = $('#table_data').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [0, "asc"],
                            [1, "asc"],
                            [2, "asc"],
                            [3, "asc"],
                            [4, "asc"],
                        ],
                        ajax:{
                            url: "{{ route('pasien.antrian') }}",
                        },

                        columnDefs: [
                            { targets: '_all', visible: true},
                            {
                                "targets": 0,
                                data: 'no_antrian',
                                name: 'no_antrian'
                            },
                            {
                                "targets": 1,
                                data: 'ibu.nama',
                                name: 'ibu.nama'
                            },
                            {
                                "targets": 2,
                                data: 'nama_poli_tujuan',
                                name: 'nama_poli_tujuan'
                            },
                            {
                                "targets": 3,
                                data: 'status',
                                name: 'status'
                            },
                            {
                                'targets': 4,
                                data: 'created_at',
                                name: 'created_at'
                            }
                        ],
                    });

                    $("#table_data tbody").on('click', '.cb-child', function(){
                         $('input.cb-child').not(this).prop('checked', false);
                         let yangDiCheck = $("#table_data tbody .cb-child:checked");
                         let button_non_aktif_status = (yangDiCheck.length>0);

                         $("#button_nonaktif_all").prop('disabled', !button_non_aktif_status);
                         $("#buttonhps_nonaktif_all").prop('disabled', !button_non_aktif_status);
                    });
             });
    </script>
@endpush


</x-administrasi>
