<x-content>
    @push('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
    @endpush
 </head>
    <x-slot name="header">
        <x-header.header-gudang-farmasi-component>
            {{ __('Menu Jenis Obat Alkes') }}
        </x-header.header-gudang-farmasi-component>
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
                    Table Jenis Obat Alkes
                </div>
                <div class="card-body">
                      <div class="mb-10">
                         <a class="btn btn-success" href="{{ route('jenisobat.create') }}" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="15px" viewBox="0 0 24 24"><defs><style>.cls-1{fill:none;stroke:#FFFF;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title>8.add</title><g id="_8.add" data-name="8.add"><circle class="cls-1" cx="12" cy="12" r="11"/><line class="cls-1" x1="12" y1="6" x2="12" y2="18"/><line class="cls-1" x1="18" y1="12" x2="6" y2="12"/></g></svg>
                            Tambah</a>

                         <button class="btn btn-success" id="button_nonaktif_all" onClick="tambahOnClick()" disabled>
                            <svg id="i-edit" class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 1 32 32" fill="none" stroke="#FFFF" stroke-linecap="round" stroke-linejoin="round" width="15px" stroke-width="2">
                                <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" /></svg>
                                Ubah
                         </button>


                            <button class="btn btn-success" id="buttonhps_nonaktif_all" onClick="hapusOnClick()" disabled>
                            <svg version="1.1" width="15px" class="mr-1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                            viewBox="0 1 78.667 78.67" style="enable-background:new 0 0 78.667 78.67;" xml:space="preserve">
                                    <g>
                                        <path style="fill:#FFF;" d="M55.182,24.972c-1.219-1.218-3.191-1.217-4.408,0L39.335,36.411L27.9,24.972
                                            c-1.218-1.217-3.19-1.218-4.408,0c-1.217,1.217-1.217,3.19,0,4.408l11.436,11.439L23.492,52.253c-1.217,1.218-1.217,3.19,0,4.408
                                            c0.608,0.608,1.406,0.912,2.204,0.912c0.797,0,1.595-0.304,2.204-0.912l11.435-11.435l11.431,11.434
                                            c0.608,0.609,1.406,0.913,2.204,0.913s1.595-0.304,2.203-0.912c1.218-1.217,1.218-3.19,0.001-4.407L43.742,40.819l11.44-11.44
                                            C56.399,28.163,56.399,26.189,55.182,24.972z"/>
                                        <path style="fill:#FFF;" d="M39.34,0C17.648,0,0,17.648,0,39.34C0,61.027,17.648,78.67,39.34,78.67
                                            c21.685,0,39.327-17.644,39.327-39.331C78.667,17.648,61.025,0,39.34,0z M39.34,72.438c-18.255,0-33.106-14.848-33.106-33.098
                                            c0-18.255,14.852-33.106,33.106-33.106c18.249,0,33.094,14.852,33.094,33.106C72.434,57.59,57.588,72.438,39.34,72.438z"/>
                                    </g>
                            </svg>
                                Hapus
                          </button>

                     </div>
                    <div class="table-responsive mt-4">
                         <table id="table_data" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th width="5%"><input type="checkbox" id="head-cb"></th>
                            <th>Nama Jenis Obat</th>
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
                    url: "{{ route('jenisobat.remove') }}",
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

            function tambahOnClick()
            {
                let checkbox_terpilih = $("#table_data tbody .cb-child:checked");
                let id_check = []
                $.each(checkbox_terpilih, function(index, elm){
                    id_check.push(elm.value);
                })

               window.location.href='jenisobat/'+id_check+'/edit'

            }

            $(document).ready(function(){
                  var t = $('#table_data').DataTable({
                        processing: true,
                        serverSide: true,
                        "order": [
                            [1, "asc"]
                        ],
                        ajax:{
                            url: "{{ route('jenisobat.index') }}",
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
                                data: 'nama_jenis_obat',
                                name: 'nama_jenis_obat'
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
</x-content>
