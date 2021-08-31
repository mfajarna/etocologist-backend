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
                        <button class="btn btn-success" id="buttoncetak_nonaktif_all" onClick="cetakOnclick()" disabled>
                           <svg width="15" height="15" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.3125 8.0625H26.4375V4.6875C26.4375 2.10281 24.3347 0 21.75 0H10.25C7.66531 0 5.5625 2.10281 5.5625 4.6875V8.0625H4.6875C2.10281 8.0625 0 10.1653 0 12.75V20.25C0 22.8347 2.10281 24.9375 4.6875 24.9375H5.5625V29.1875C5.5625 30.7383 6.82419 32 8.375 32H23.625C25.1758 32 26.4375 30.7383 26.4375 29.1875V24.9375H27.3125C29.8972 24.9375 32 22.8347 32 20.25V12.75C32 10.1653 29.8972 8.0625 27.3125 8.0625ZM7.4375 4.6875C7.4375 3.13669 8.69919 1.875 10.25 1.875H21.75C23.3008 1.875 24.5625 3.13669 24.5625 4.6875V8.0625H7.4375V4.6875ZM24.5625 29.1875C24.5625 29.7044 24.1419 30.125 23.625 30.125H8.375C7.85806 30.125 7.4375 29.7044 7.4375 29.1875V19.9375H24.5625V29.1875ZM30.125 20.25C30.125 21.8008 28.8633 23.0625 27.3125 23.0625H26.4375V19.9375H27C27.5178 19.9375 27.9375 19.5178 27.9375 19C27.9375 18.4822 27.5178 18.0625 27 18.0625H5C4.48225 18.0625 4.0625 18.4822 4.0625 19C4.0625 19.5178 4.48225 19.9375 5 19.9375H5.5625V23.0625H4.6875C3.13669 23.0625 1.875 21.8008 1.875 20.25V12.75C1.875 11.1992 3.13669 9.9375 4.6875 9.9375H27.3125C28.8633 9.9375 30.125 11.1992 30.125 12.75V20.25Z" fill="#FFFCFC"/>
                                    <path d="M18.5 22.0625H13.5C12.9822 22.0625 12.5625 22.4822 12.5625 23C12.5625 23.5178 12.9822 23.9375 13.5 23.9375H18.5C19.0178 23.9375 19.4375 23.5178 19.4375 23C19.4375 22.4822 19.0178 22.0625 18.5 22.0625Z" fill="#FFFCFC"/>
                                    <path d="M18.5 26.0625H13.5C12.9822 26.0625 12.5625 26.4822 12.5625 27C12.5625 27.5178 12.9822 27.9375 13.5 27.9375H18.5C19.0178 27.9375 19.4375 27.5178 19.4375 27C19.4375 26.4822 19.0178 26.0625 18.5 26.0625Z" fill="#FFFCFC"/>
                                    <path d="M8 12.0625H5C4.48225 12.0625 4.0625 12.4822 4.0625 13C4.0625 13.5178 4.48225 13.9375 5 13.9375H8C8.51775 13.9375 8.9375 13.5178 8.9375 13C8.9375 12.4822 8.51775 12.0625 8 12.0625Z" fill="#FFFCFC"/>
                                    </svg>
                                Cetak Kartu Anak
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

            function cetakOnclick()
            {
                let checkbox_terpilih = $("#table_data tbody .cb-child:checked");
                let id_check = []
                $.each(checkbox_terpilih, function(index, elm){
                    id_check.push(elm.value);
                })

               window.open('cetak-kartu-anak/'+id_check,'_blank');

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
                         $("#buttoncetak_nonaktif_all").prop('disabled', !button_non_aktif_status);
                    });
             });

        </script>
    @endpush
</x-content>
