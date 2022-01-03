@extends('layouts.admin')

@section('title')
    Hiển thị hình thức lưu
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hiển thị hình thức lưu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hiển thị hình thức lưu</li>
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
                                <label for="">Hình thức lưu</label>
                                <input type="text" class="form-control" name="hinh_thuc_luu"
                                    value="{{ $hinhThucLuu->hinh_thuc_luu }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <input type="text" class="form-control" name="trang_thai" disabled
                                    @if ($hinhThucLuu->trang_thai == 1) : value="Kích hoạt" @else value="Ngừng hoạt động" @endif>
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <input type="text" class="form-control" name="ghi_chu"
                                    value="{{ $hinhThucLuu->ghi_chu }}" disabled>
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
