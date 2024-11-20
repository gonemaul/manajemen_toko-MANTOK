<div class="wrapp-filter {{ $classWF }}">
    <div class="input-wrapper">
        <div class="inner-input with-icon">
            <img class="icon-prefix" src="{{ asset('assets/svg/search.svg') }}" alt="404">
            <input id="{{ $idSearch }}" type="search" placeholder="Search ...">
        </div>
    </div>



    @if (isset($filterSelect))
        <div class="input-wrapper">
            <div class="select-wrapper-arrow">
                <select class="" name="" id="statusProduk">
                    <option value="">{{ $filterSelect['text'] }}</option>
                    <option value="active">Active </option>
                    <option value="inactive">Deactive </option>
                </select>
            </div>
        </div>
    @endif

    @if (isset($filterSelect2))
        <div class="input-wrapper">
            <div class="select-wrapper-arrow">
                <select class="" name="" id="selectCreator">
                    <option value="">{{ $filterSelect2['text'] }}</option>
                    @foreach ($options as $select)
                        <option value="{{ $select['key'] }}">{{ $select['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if (isset($filterDate))
        <div class="input-wrapper">
            <div class="inner-input">
                <input type="date" name="" id="{{ $filterDate }}" class="" placeholder="">
            </div>
        </div>
    @endif

    @if (isset($filterExport))
        <div class="input-wrapper btn-export">
            <button class="button-export" onclick="window.location.href='{{ route('backoffice.product.export') }}'">
                Export
                <img src="{{ asset('assets/svg/ic-export.svg') }}" alt="">
            </button>
        </div>
    @endif

    @if (isset($filterBtnModal))
        <div class="input-wrapper btn-add">
            <button class="button-add" data-toggle="modal" data-target="#AddProduct" id="button_add">
                + Tambah Produk
            </button>
        </div>
    @endif

</div>
@push('script')
    <script>
        $(document).ready(function() {
            $('#multiple-select-field-status').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });
        });
    </script>
@endpush
