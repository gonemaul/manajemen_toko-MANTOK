@extends('base.admin')
@section('title', __('Dashboard'))

@section('content')
    <div class="p-dashboard">
        @include('components.sidebar')
        <div class="wrapper">
            @include('components.header', ['title' => 'Data Barang'])
            <div class="content-wrapper"></div>
        </div>
    </div>
@endsection
