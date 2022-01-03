@extends('layouts.admin')

@section('title')
    Hiển thị bộ phận
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hiển thị bộ phận</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hiển thị bộ phận</li>
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
                                <label for="">Tên bộ phận</label>
                                <input type="text" class="form-control" name="bo_phan" value="{{ $boPhan->bo_phan }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Kí hiệu</label>
                                <input type="text" class="form-control" name="ki_hieu" value="{{ $boPhan->ki_hieu }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="my-input">Trưởng bộ phận</label>
                                <input type="text" class="form-control" name="truong_bo_phan"
                                    value="{{ optional($boPhan->truongBoPhan)->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <input type="text" class="form-control" name="trang_thai" disabled
                                    @if ($boPhan->trang_thai == 1) value="Kích hoạt" @else value="Ngừng hoạt động" @endif>
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <input type="text" class="form-control" name="ghi_chu" value="{{ $boPhan->ghi_chu }}"
                                    disabled>
                            </div>
                            <div class="d-grid gap-2 col-4 mx-auto">
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
