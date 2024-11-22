@extends('base.admin')
@section('title', __('Belanja'))

@section('content')
    <div class="p-dashboard">
        @include('components.sidebar')
        <div class="wrapper">
            @include('components.header', ['title' => 'Data Belanja'])
            <div class="content-wrapper">
                <div class="card-tabel">
                    @include('pages.belanja.filter', [
                        'classWF' => 'four-column',
                        'filterSelect' => [
                            'text' => 'Status',
                        ],
                        'filterDate' => '',
                        'filterExport' => '',
                        'idSearch' => 'searchbarTableProduk',
                    ])
                    <div class="card-datatable page-card">
                        <table id="table-produk" class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">No Order</th>
                                    <th class="text-center">Tanggal Order</th>
                                    <th class="text-center">Tanggal Pengiriman</th>
                                    <th class="text-center">Total Barang</th>
                                    <th class="text-center">Total Belanja</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 20; $i++)
                                    <tr>
                                        <td class="text-center">{{ $i + 1 }}FFB342</td>
                                        <td class="text-center">20 November 2024</td>
                                        <td class="text-center">27 November 2024</td>
                                        <td class="text-center">100</td>
                                        <td class="text-center">103
                                        </td>
                                        <td class="text-center">
                                            <div class="status active">Selesai</div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="action-btn" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="true">
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="">Detail</a>
                                                    <a href="" id="action_edit_produk" class="dropdown-item"
                                                        data-toggle="modal" data-target="">Edit</a>
                                                    <a href="" id="action_change_status_produk" class="dropdown-item"
                                                        data-toggle="modal" data-target="">Ubah
                                                        Status</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            const table_produk = $('#table-produk').DataTable({
                // scrollX: true,
                responsive: true,
                // processing: true,
                // serverSide: true,
                columnDefs: [{
                        targets: '_all',
                        defaultContent: '-',
                        // orderable: true
                    },
                    {
                        targets: [6],
                        sortable: false
                    },
                ],
                pagingType: 'simple',
                "language": {
                    "lengthMenu": "Rows : _MENU_",
                    "info": "_START_-_END_ of _TOTAL_",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "paginate": {
                        "next": "<img class='next-icon' src='{{ asset('assets/svg/datatable-paginate-left.svg') }}'>",
                        "previous": "<img src='{{ asset('assets/svg/datatable-paginate-left.svg') }}'>"
                    },
                },
                "aaSorting": [],
                // "headerCallback": function(thead, data, start, end, display) {
                //     $(thead).find('th').each(function(index) {
                //         let th = $(this);
                //         th.find('svg').remove(); // Remove existing SVG if any

                //         if (index !== 6) {
                //             th.append(`
            //             <svg class="ic-sort" xmlns='http://www.w3.org/2000/svg' width='16' height='17' viewBox='0 0 16 17'
            //                 fill='none'>
            //                 <path
            //                     d='M4.66663 13.8334H5.99996V5.83341H7.99996L5.33329 3.16675L2.66663 5.83341H4.66663V13.8334ZM13.3333 11.1667H11.3333V3.16675H9.99996V11.1667H7.99996L10.6666 13.8334L13.3333 11.1667Z'
            //                     fill='black' />
            //             </svg>
            //             `);
                //         }
                //     });
                // }
            });
        })
    </script>
@endpush
