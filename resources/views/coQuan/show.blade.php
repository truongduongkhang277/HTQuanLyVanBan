@extends('layouts.admin')

@section('title')
    Hiển thị cơ quan
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hiển thị cơ quan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hiển thị cơ quan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <form action="" method="POST" role="form">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="">Tên cơ quan</label>
                                <input type="text" class="form-control" name="ten_co_quan"
                                    value="{{ $coQuan->ten_co_quan }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ cơ quan</label>
                                <input type="text" class="form-control" name="dia_chi" value="{{ $coQuan->dia_chi }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <input type="text" class="form-control" name="trang_thai"
                                    value="{{ $coQuan->trang_thai }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <input type="text" class="form-control" name="ghi_chu" value="{{ $coQuan->ghi_chu }}"
                                    disabled>
                            </div>
                            <div class="d-grid gap-2 col-2 mx-auto">
                                <div class="col">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
