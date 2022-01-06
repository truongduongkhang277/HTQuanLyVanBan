@extends('layouts.admin')

@section('title')
    Liên hệ
@endsection

@section('css')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liên hệ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Liên hệ</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="col-8 d-flex justify-content-center mx-auto">
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        Thông tin liên hệ
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2><b>Trương Dương Khang</b></h2>
                                                <p class="text-muted "><b>MSSV: </b> 1811546141 </p>
                                                <p class="text-muted "> Lớp 18DTH2C - Khoa CNTT - Đại học Nguyễn Tất Thành <p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li><span class="fa-li"><i
                                                                class="fas fa-lg fa-building"></i></span> Địa chỉ: Đường 34,
                                                        Phường Linh Đông, Thành phố Thủ Đức, Thành phố Hồ Chí Minh</li>
                                                        <br/>
                                                    <li><span class="fa-li"><i
                                                                class="fas fa-lg fa-phone"></i></span> SĐT: 0888 780 807
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{ asset('adminlte/dist/img/admin.jpg') }}" alt="user-avatar"
                                                    class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('js')
@endsection
