@extends('layouts.admin')

@section('title')
    Hiển thị lĩnh vực
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hiển thị lĩnh vực</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hiển thị lĩnh vực</li>
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
                    <div class="col-md-10 mx-auto">
                        <form action="" method="POST" role="form">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $nguoiDung->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $nguoiDung->email }}" disabled>
                                    </div>
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ngay_sinh"
                                                placeholder="dd/mm/yyyy" value="{{ $nguoiDung->ngay_sinh }}">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" class="form-control" name="so_dt"
                                            value="{{ $nguoiDung->so_dt }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giới tính</label>
                                        <input type="text" class="form-control" name="gioi_tinh"
                                        @if ($nguoiDung->gioi_tinh == 1) : value="Nam" @else value="Nữ" @endif>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" class="form-control" name="dia_chi"
                                            value="{{ $nguoiDung->dia_chi }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh đại diện</label><br/>
                                        <img src="{{ $nguoiDung->file_path }}" alt="{{ $nguoiDung->anh }}" style="width: 200px; height= 200px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Quyền</label>
                                        <input type="text" class="form-control" name="chuc_danh"
                                            value="{{ $nguoiDung->chuc_danh }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bộ phận</label>
                                        <input type="text" class="form-control" name="bo_phan"
                                            value="{{ $nguoiDung->bo_phan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <input type="text" class="form-control" name="trang_thai"
                                        @if ($nguoiDung->trang_thai == 1) : value="Kích hoạt" @else value="Ngừng hoạt động" @endif>
                                    </div>
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
