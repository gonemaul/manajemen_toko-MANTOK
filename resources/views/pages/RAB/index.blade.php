@extends('base.admin')
@section('title', __('RAB'))

@section('content')
    <div class="box">
        <div class="row">
            <div class="col-md-2">
                <div class="circle" onclick="window.location.href='{{ route('belanja') }}'">
                    <svg class="back" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM18 12.75H7.81L10.82 15.76C11.11 16.05 11.11 16.53 10.82 16.82C10.67 16.97 10.48 17.04 10.29 17.04C10.1 17.04 9.91 16.97 9.76 16.82L5.47 12.53C5.33 12.39 5.25 12.2 5.25 12C5.25 11.8 5.33 11.61 5.47 11.47L9.76 7.18C10.05 6.89 10.53 6.89 10.82 7.18C11.11 7.47 11.11 7.95 10.82 8.24L7.81 11.25H18C18.41 11.25 18.75 11.59 18.75 12C18.75 12.41 18.41 12.75 18 12.75Z"
                            fill="#0055c5" />
                    </svg>
                </div>
            </div>
            <div class="col-md-5 kiri">
                <div class="top search-container">
                    <label for="dropdown-search">Nama Barang</label>
                    <div class="dropdown">
                        <input type="text" id="dropdown-search" placeholder="Nama Barang" />
                        <div class="dropdown-content">
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="input-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="harga" disabled placeholder="Rp. 0">
                    </div>

                    <div class="input-group">
                        <label for="banyak">Banyak</label>
                        <input type="text" class="banyak" disabled placeholder="0">
                    </div>

                    <div class="input-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="jumlah" disabled placeholder="Rp. 0">
                    </div>
                </div>
            </div>
            <div class="col-md-5 kanan">
                <div class="top">
                    <label for="total">Total</label>
                    <span class="total">Rp. 0</span>
                </div>
                <div class="bottom">
                    <button class=" btn buat_data" disabled>
                        <img src="{{ asset('assets/svg/create.svg') }}" alt="" class="icon-btn">
                        Buat</button>
                    <button class="btn tambah_data" disabled>
                        <img src="{{ asset('assets/svg/add.svg') }}" alt="" class="icon-btn">
                        Tambah</button>
                    <button class="btn reset" disabled>
                        <img src="{{ asset('assets/svg/reset.svg') }}" alt="" class="icon-btn">
                        Reset</button>
                </div>
            </div>
        </div>
        <div class="tabel">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Banyak</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('script')
    <script>
        const db = [{
                "id": 1,
                "nama": "Produk A",
                "harga": 50000,
                "banyak": 2,
                "jumlah": 100000
            },
            {
                "id": 2,
                "nama": "Produk B",
                "harga": 30000,
                "banyak": 3,
                "jumlah": 90000
            },
            {
                "id": 3,
                "nama": "Produk C",
                "harga": 15000,
                "banyak": 5,
                "jumlah": 75000
            },
            {
                "id": 4,
                "nama": "Produk D",
                "harga": 20000,
                "banyak": 4,
                "jumlah": 80000
            },
            {
                "id": 5,
                "nama": "Produk E",
                "harga": 10000,
                "banyak": 6,
                "jumlah": 60000
            }
        ];
        let datas = [];

        $(document).ready(function() {
            $('#dropdown-search').on('keyup', function() {
                const searchText = $(this).val().toLowerCase();
                $('.dropdown-content').empty();
                if (searchText) {
                    const item = db.filter(item => item.nama.toLowerCase() == searchText);
                    const filteredData = db.filter(item => item.nama.toLowerCase().includes(searchText));
                    filteredData.forEach(item => {
                        $('.dropdown-content').append(
                            `<a href="" class="dropdown-item" data-nama="${item.nama}">${item.nama}</a>`
                        );
                    });
                    $('.dropdown-content').show();
                    if (item.length == 0) {
                        $('.harga').val('');
                        $('.jumlah').val('');
                        $('.banyak').val('');
                        $('.tambah_data').prop('disabled', true);
                        $('.banyak').prop('disabled', true);
                    } else {
                        $('.harga').val(`Rp ${item[0].harga.toLocaleString()}`)
                        $('.jumlah').val(`Rp ${item[0].harga.toLocaleString()}`)
                        $('.banyak').val(1);
                        // $('.banyak').val(1);
                        $('.tambah_data').prop('disabled', false);
                        $('.banyak').prop('disabled', false);
                    }
                }
            });

            // // Event klik pada item dropdown
            $(document).on('click', '.dropdown-item', function(e) {
                e.preventDefault();
                const selectedName = $(this).data('nama');
                const item = db.filter(item => item.nama == selectedName)[0];
                $('#dropdown-search').val(selectedName);
                $('.harga').val(`Rp ${item.harga.toLocaleString()}`)
                $('.jumlah').val(`Rp ${item.harga.toLocaleString()}`)
                $('.banyak').prop('disabled', false);
                $('.tambah_data').prop('disabled', false);
                $('.banyak').val(1);
                $('.banyak').focus();
                $('.banyak').select();
                $('.dropdown-content').hide();
            });

            $(document).on('input', '.banyak', function(e) {
                e.preventDefault();
                const banyak = parseFloat($(this).val()) || 1;
                const harga = parseFloat($('.harga').val().replace('Rp ', '').replace(/\./g, ''));
                const jumlah = harga * banyak;
                $('.jumlah').val(`Rp ${jumlah.toLocaleString()}`);
            })

            $('.tambah_data').on('click', function(e) {
                e.preventDefault();
                const nama = $('#dropdown-search').val();
                const harga = parseFloat($('.harga').val().replace('Rp ', '').replace(/\./g, ''));
                const banyak = parseInt($('.banyak').val()) || 1;
                const jumlah = harga * banyak;

                if (nama && harga && banyak) {
                    datas.push({
                        id: datas.length + 1,
                        nama: nama,
                        harga: harga,
                        banyak: banyak,
                        jumlah: jumlah
                    });
                    render();
                    $('#dropdown-search').val('');
                    $('#dropdown-search').focus();
                    $('.banyak').val('');
                    $('.harga').val('');
                    $('.jumlah').val('');
                    $('.banyak').prop('disabled', true);
                    $('.tambah_data').prop('disabled', true);
                    $('.reset').prop('disabled', false);
                } else {
                    alert('Harap isi semua field');
                }
            })

            $('.reset').on('click', function(e) {
                e.preventDefault();
                const res = confirm('Apa anda yakin?')
                if (res) {
                    datas = [];
                    render();
                    $('.reset').prop('disabled', true);
                }
            })

            function render() {
                let tableBody = $('.custom-table tbody');
                tableBody.empty();
                datas.forEach(function(item, index) {
                    const row = `<tr>
                      <td class="text-center id" data-id="${item.id}">${index + 1}</td>
                      <td class="nama">${item.nama}</td>
                      <td class="harga_table text-center">Rp ${item.harga.toLocaleString()}</td>
                      <td class="text-center banyak_table">${item.banyak}</td>
                      <td class="jumlah_table text-center">Rp ${item.jumlah.toLocaleString()}</td>
                      <td class="text-center">
                            <button class="btn-edit" value="edit">
                                <svg class="icon-edit" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.91 4.15002C15.58 6.54002 17.45 8.41002 19.85 9.09002" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                Edit</button>
                            <button class="btn-delete" id="delete-data-${item.id}">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 5.98C17.67 5.65 14.32 5.48 10.98 5.48C9 5.48 7.02 5.58 5.04 5.78L3 5.98" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.85 9.14L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79C6 22 5.91 20.78 5.8 19.21L5.15 9.14" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.33 16.5H13.66" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9.5 12.5H14.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                Hapus</button>
                        </td>
                    </tr>`;
                    $('#table-body').append(row); // Menambahkan baris ke dalam tbody
                });
                if ($('#table-body').length == 0) {
                    $('.reset').prop('disabled', true)
                }

                updateTotalJumlah();
            }
            render();

            function updateTotalJumlah() {
                let total = 0;

                // Loop untuk menjumlahkan nilai "jumlah" di setiap baris
                $('.jumlah_table').each(function() {
                    let jumlahText = parseFloat($(this).text().replace('Rp ', '').replace(/\./g, ''));
                    total += parseInt(jumlahText);
                });

                // Menampilkan total jumlah di elemen dengan id 'totalJumlah'
                $('.total').text(`Rp ${total.toLocaleString()}`);
            }

            $(document).on('click', '[id^="delete-data-"]', function() {
                $(this).removeData('row');
                const row = $(this).closest("tr");
                const index = row.find('.id').data('id'); // Mendapatkan indeks baris index
                datas = datas.filter(item => item.id != index);
                render(); // Mengupdate table
            })

            $(document).on('click', '.btn-edit', function() {
                const row = $(this).closest("tr");
                const banyakCell = row.find(".banyak_table");
                const hargaCell = row.find("td:nth-child(3)"); // Harga ada di kolom ke-3

                const banyakValue = banyakCell.text().trim();
                banyakCell.html(
                    `<input type="text" value="${banyakValue}" class="input-banyak">`);

                $('.input-banyak').focus()
                $('.input-banyak').select()
                $(this).removeClass('btn-edit');
                $(this).addClass('btn-done');
                $(this).html(
                    `<svg class="icon-done" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.75 12L10.58 14.83L16.25 9.17" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg> Done`
                );
                $(this).css({
                    background: '#00bd00'
                })
            });

            $(document).on('click', '.btn-done', function() {
                const row = $(this).closest("tr");
                const banyakCell = row.find(".banyak_table");
                const jumlahCell = row.find(".jumlah_table");
                const hargaCell = row.find("td:nth-child(3)");
                const rowID = row.find('.id').text().trim();
                // Mendapatkan nilai dari input setelah pengeditan
                const newBanyak = parseInt(banyakCell.find("input").val(), 10);
                const hargaValue = parseFloat(hargaCell.text().replace('Rp ', '').replace(/\./g, ''));
                const newJumlah = hargaValue * newBanyak;

                // Mengembalikan cell "Banyak" ke tampilan teks dan memperbarui "Jumlah"
                banyakCell.text(newBanyak);
                jumlahCell.text(`Rp ${newJumlah.toLocaleString()}`);

                // Mengupdate data di JSON
                let item = datas.find(item => item.id == rowID);
                item.banyak = newBanyak;
                item.jumlah = newJumlah;
                // Render ulang tabel dan update total
                render();

                $(this).html(`
                <svg class="icon-edit" width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.91 4.15002C15.58 6.54002 17.45 8.41002 19.85 9.09002" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Edit
                `);
                $(this).css({
                    background: '#204bdc'
                })
            });
        });
    </script>
@endpush
