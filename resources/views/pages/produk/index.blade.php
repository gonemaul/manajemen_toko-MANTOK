@extends('base.admin')
@section('title', __('Data Barang'))

@section('content')
    <div class="p-dashboard">
        @include('components.sidebar')
        <div class="wrapper">
            @include('components.header', ['title' => 'Data Barang'])
            <div class="content-wrapper">
                <div class="card-tabel">
                    {{-- @include('pages.produk.filter', [
                        'classWF' => 'four-column',
                        'filterSelect' => [
                            'text' => 'Status',
                        ],
                        'filterExport' => '',
                        'filterBtnModal' => '',
                        'idSearch' => 'searchbarTableProduk',
                    ]) --}}
                    <div class="card-datatable page-card">
                        <table id="table-produk" class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-start">Nama Produk</th>
                                    <th class="text-start">Stock</th>
                                    <th class="text-center">Total Shipping</th>
                                    <th class="text-center">Total Aktivitas</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
                scrollX: true,
                responsive: true,
                processing: true,
                serverSide: true,
                columnDefs: [{
                        targets: '_all',
                        defaultContent: '-',
                        orderable: true
                    },
                    {
                        targets: [4],
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
                "headerCallback": function(thead, data, start, end, display) {
                    $(thead).find('th').each(function(index) {
                        let th = $(this);
                        th.find('svg').remove(); // Remove existing SVG if any

                        if (index !== 5) {
                            th.append(`
                                <svg class="ic-sort" xmlns='http://www.w3.org/2000/svg' width='16' height='17' viewBox='0 0 16 17' fill='none'>
                                    <path d='M4.66663 13.8334H5.99996V5.83341H7.99996L5.33329 3.16675L2.66663 5.83341H4.66663V13.8334ZM13.3333 11.1667H11.3333V3.16675H9.99996V11.1667H7.99996L10.6666 13.8334L13.3333 11.1667Z' fill='black'/>
                                </svg>
                            `);
                        }
                    });
                }
            });
        })
    </script>
@endpush
