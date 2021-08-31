<x-content>
    @push('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
    @endpush
    </head>

    <x-slot name="header">
        <x-header.header-poli-anak-component>
            {{ __('Riwayat Keadaan Anak') }}

        </x-header.header-poli-anak-component>

    </x-slot>


     <div class="py-12 container mx-auto">
             @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>Sukses!</strong> {{ session('success') }}
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

            <div class="card mt-4">
                <div class="card-header">
                    Masukan Data Riwayat Keadaan Anak
                </div>
                <div class="card-body">
                      <div class="mb-10">
                         <button class="btn btn-success" id="button_nonaktif_all" onClick="tambahOnClick()" disabled>
                            <svg id="i-edit" class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 1 32 32" fill="none" stroke="#FFFF" stroke-linecap="round" stroke-linejoin="round" width="15px" stroke-width="2">
                                <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" /></svg>
                                Riwayat Keadaan
                         </button>
                        <button class="btn btn-success" id="buttonknjg_nonaktif_all" onClick="kunjunganOnclick()" disabled>
                            <svg id="i-edit" class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 1 32 32" fill="none" stroke="#FFFF" stroke-linecap="round" stroke-linejoin="round" width="15px" stroke-width="2">
                                <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" /></svg>
                                Kunjungan Keadaan
                         </button>
                     </div>
                    <div class="table-responsive mt-4">
                         <table id="table_data" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th width="5%"><input type="checkbox" id="head-cb"></th>
                            <th>Nama Anak</th>
                            <th>Nama Ibu</th>
                            <th>Nama Ayah</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                        </tr>
                    </thead>
                    </table>
                </div>
              </div>
            </div>

    </div>
    @push('additional')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" defer></script>
        <script>
            let yangDiCheck = 0;

            function hapusOnClick()
            {
                let checkbox_terpilih = $("#table_data tbody .cb-child:checked");
                let id = []
                $.each(checkbox_terpilih, function(index, elm){
                    id.push(elm.value);
                })

                if(confirm('Apakah anda yakin untuk menghapus?'))
                {
                    $.ajax({
                    url: "{{ route('inputanak.hapus') }}",
                    method: "GET",
                    data:{id:id},
                    success:function(res)
                    {
                        $('#table_data').DataTable().ajax.reload();
                        location.reload();
                    }
                });
                }
            }

            function kunjunganOnclick()
            {
                let checkbox_terpilih = $("#table_data tbody .cb-child:checked");
                let id_check = []
                $.each(checkbox_terpilih, function(index, elm){
                    id_check.push(elm.value);
                })

               window.location.href='kunjungankeadaan/'+id_check+'/edit'

            }

            function tambahOnClick()
            {
                let checkbox_terpilih = $("#table_data tbody .cb-child:checked");
                let id_check = []
                $.each(checkbox_terpilih, function(index, elm){
                    id_check.push(elm.value);
                })

               window.location.href='riwayatkeadaan/'+id_check+'/edit'

            }

            $(document).ready(function(){
                  var t = $('#table_data').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [1, "asc"],
                            [2, "asc"],
                            [3, "asc"],
                            [4, "asc"],
                        ],
                        ajax:{
                            url: "{{ route('inputanak.index') }}",
                        },

                        columnDefs: [
                            { targets: '_all', visible: true},
                            {
                                "targets": 0,
                                "class": "text-center",
                                orderable: false,
                                "render": function(data, type, row, meta){
                                    return `<input type="checkbox" name="obat_checked[]"  class="cb-child" value="${row.id}">`;
                                }
                            },
                            {
                                "targets": 1,
                                data: 'nama',
                                name: 'nama'
                            },
                            {
                                "targets": 2,
                                data: 'ibu.nama',
                                name: 'ibu.nama'
                            },
                            {
                                "targets": 3,
                                data: 'ibu.nama_suami',
                                name: 'ibu.nama_suami'
                            },
                            {
                                "targets": 4,
                                data: 'jenis_kelamin',
                                name: 'jenis_kelamin'
                            },
                            {
                                "targets": 5,
                                data: 'tanggal_lahir',
                                name: 'tanggal_lahir'
                            },
                        ],
                    });

                    $("#table_data tbody").on('click', '.cb-child', function(){
                         $('input.cb-child').not(this).prop('checked', false);
                         let yangDiCheck = $("#table_data tbody .cb-child:checked");
                         let button_non_aktif_status = (yangDiCheck.length>0);

                         $("#button_nonaktif_all").prop('disabled', !button_non_aktif_status);
                         $("#buttonknjg_nonaktif_all").prop('disabled', !button_non_aktif_status);
                         $("#buttontmbh_nonaktif_all").prop('disabled', !button_non_aktif_status);
                    });
             });

        </script>
    @endpush
</x-content>
