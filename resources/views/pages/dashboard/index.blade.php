@extends('base.admin')
@section('title', __('Dashboard'))

@section('content')
    <div class="p-dashboard">
        @include('components.sidebar')
        <div class="wrapper">
            @include('components.header', ['title' => 'Dashboard'])
            <div class="content-dashboard">
                <div class="detail-top two-dashboard">
                    <div class="chart-container-dashboard">
                        <div class="bg-wrapper">
                            <div class="heading">
                                <div class="text">
                                    <p style="font-size:13;color:#aeaeae;" class="mb-1">Total Pengeluaran</p>
                                    <h1 id="total_pengeluaran" style="font-size:20;color:#000;font-weight: 600;">Rp
                                        0</h1>
                                </div>
                                <div class="actions">
                                    <div class="filter-group">
                                        <div class="item one">

                                        </div>
                                    </div>
                                    <div class="filter-group">
                                        <div class="item one">
                                            <div class="select-wrapper no-border">
                                                <select name="" id="yearPengeluaran"
                                                    class="no-icon mr-5 no-border wt-bg" style="height: 29px">
                                                    {{-- @foreach ($years as $year)
                                                        @if ($year == $currentYear)
                                                            <option value="{{ $year }}" selected>{{ $year }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                        @endif
                                                    @endforeach --}}
                                                    <option value="2024">2024</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2024">2024</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('pages.dashboard.chart.line')
                        </div>
                    </div>
                    <div class="right-container">
                        <div class="top-container">
                            <div class="bg-wrapper g-25">
                                <div class="heading">
                                    <div class="text">
                                        <p class="judul">Total Budget</p>
                                        <h3 id="total_budget" style="font-size: 18px; font-weight:600">Rp 0</h3>
                                    </div>
                                    <div class="actions">
                                        <div class="filter-group">
                                            <div class="item one">
                                                <div class="select-wrapper" style="margin-bottom: 20px;">
                                                    <select name="" id="monthBudget"
                                                        class="no-icon no-border wt-bg mr-4" style="height: 29px;">
                                                        {{-- @for ($month = 1; $month <= 12; $month++)
                                                            @php
                                                                $monthName = DateTime::createFromFormat(
                                                                    '!m',
                                                                    $month,
                                                                )->format('F');
                                                            @endphp
                                                            <option value="{{ $month }}"
                                                                {{ $month == date('n') ? 'selected' : '' }}>
                                                                {{ $monthName }}
                                                            </option>
                                                        @endfor --}}
                                                        <option value="">Januari</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="progress">
                                        <div class="progress-bar oren"></div>
                                    </div>
                                    <div class="text-bot">
                                        <p class="light">Pengeluaran</p>
                                        <p class="light">Sisa Budget</p>
                                    </div>
                                    <div class="text-bot">
                                        <span id="pengeluaran_budget">Rp 0</span>
                                        <span id="sisa_budget">Rp 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-container" style="margin-top:0px">
                            <div class="bottom-container-inner">
                                <!-- Top container for Total Shipping and select options -->
                                <div class="top-section wt-dash-border">
                                    <div class="text">
                                        <p>Total Shipping</p>
                                    </div>
                                    <div class="actions">
                                        <div class="filter-group">
                                            <div class="item one">
                                                <div class="select-wrapper">
                                                    <select name="" id="monthShipping"
                                                        class="no-icon no-border wt-bg mr-4" style="height: 29px">
                                                        {{-- @for ($month = 1; $month <= 12; $month++)
                                                            @php
                                                                $monthName = DateTime::createFromFormat(
                                                                    '!m',
                                                                    $month,
                                                                )->format('F');
                                                            @endphp
                                                            <option value="{{ $month }}"
                                                                {{ $month == date('n') ? 'selected' : '' }}>
                                                                {{ $monthName }}
                                                            </option>
                                                        @endfor --}}
                                                        <option value="">Maret</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-group">
                                            <div class="item one">
                                                <div class="select-wrapper">
                                                    <select name="" id="yearShipping"
                                                        class="no-icon no-border wt-bg mr-4" style="height: 29px">
                                                        {{-- @foreach ($years as $year)
                                                            @if ($year == $currentYear)
                                                                <option value="{{ $year }}" selected>
                                                                    {{ $year }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $year }}">{{ $year }}
                                                                </option>
                                                            @endif
                                                        @endforeach --}}
                                                        <option value="2024">2024</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bottom container for 150+ and shipping icon -->
                                <div class="bottom-info">
                                    <div class="bg-group-dash">
                                        <img src="{{ asset('assets/images/group-dashboard.png') }}" alt="">
                                    </div>
                                    <div class="left-text">
                                        <h1 id="text_shipping">0</h1>
                                        <p>Shipping</p>
                                    </div>
                                    <div class="shipping-icon radius-yellow">
                                        <img src="{{ asset('assets/svg/truck-fast.svg') }}" alt="Shipping icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-top two-dashboard">
                    <!-- Left Side Content -->
                    <div class="bg-wrapper left-content">
                        <div class="heading">
                            <div class="text">
                                <img src="{{ asset('assets/svg/crown.svg') }}" alt="head-icon"><span
                                    class="chart-head">Produk Aktivitas Tertinggi</span>
                            </div>
                            <div class="actions">
                                <a href="" class="download-all" style="color: #000;">Selengkapnya ></a>
                            </div>
                        </div>
                        <div class="file-list no-gap">
                            {{-- @foreach ($products_activity as $index => $product) --}}
                            <div class="file-item border-bottom">
                                <div class="wrapp-kiri align-items-center">
                                    <div class="d-flex">
                                        {{-- <div class="number @if ($i >= 3) last @endif"> --}}
                                        <div class="number">
                                            {{-- {{ $index + 1 }} --}}
                                            1
                                        </div>
                                        <img src="" alt="product-icon">
                                    </div>
                                    <p class="nama">Produk A</p>
                                </div>
                                {{-- <div class="badge-number @if ($index >= 3) last @endif"> --}}
                                <div class="badge-number ">
                                    {{-- {{ $product->projects_count }} --}}
                                    5
                                </div>
                            </div>
                            {{-- @endforeach --}}

                        </div>
                    </div>

                    <!-- Right Side Content -->
                    <div class="bg-wrapper right-content">
                        <div class="heading">

                            <img src="{{ asset('assets/svg/chart-line.svg') }}">

                            <div class="flex-start">
                                <span class="text-head" style="color:#000">Statistik Karyawan</span>
                                <p class="sub-text-head" style="margin-left:5px" id="total_karyawan">0 Karyawan</p>
                            </div>
                        </div>
                        <div class="file-list" id="statistik_karyawan">
                        </div>
                    </div>
                </div>

                <div class="detail-top two-dashboard">
                    <div class="card-tabel">
                        <div class="title">
                            <div class="wrapp-left">
                                <img src="{{ asset('assets/svg/chart-line.svg') }}" alt="head-icon" class="w-24">
                                <p class="text-left">Pengeluaran Tertinggi</p>
                            </div>
                            <a href="" class="wrapp-right">
                                <p class="text-right">Selengkapnya</p>
                                <img src="{{ asset('assets/svg/arrow-right-black.svg') }}" alt="404">
                            </a>
                        </div>
                        <div class="card-datatable page-card">
                            <table id="table-pengeluaran-tertinggi" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-start">Influencer</th>
                                        <th class="text-start">Total Pengeluaran</th>
                                        <th class="text-center">Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Right Side Content -->
                    <div class="bg-wrapper right-content justify-content-start">
                        <!-- <div class="bg-wrapper mt-3"> -->
                        <div class="heading">
                            <div class="text">
                                <img src="{{ asset('assets/svg/chart-line.svg') }}" alt=""
                                    style="padding-right: 10px"><span>Statistic Aktivitas</span>
                            </div>

                        </div>
                        @include('pages.dashboard.chart.dougnout')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
