@extends('layouts.admin')

@section('title')
    Chỉnh sửa lĩnh vực
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chỉnh sửa lĩnh vực</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa lĩnh vực</li>
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
                        <form action="{{ route('nguoiDung.update', $nguoiDung->id) }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Họ và tên</label>
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
                                        <select class="form-control select2" name="gioi_tinh" id="input"
                                            style="width: 100%;">
                                            <option selected="selected" value="1">[M] Nam</option>
                                            <option value="0"> [F] Nữ</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" class="form-control" name="dia_chi"
                                            value="{{ $nguoiDung->dia_chi }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Ảnh đại diện</label>
                                        <input class="form-control-file" type="file" name="anh">
                                        @if (!empty($nguoidung->file_path))
                                            <img style="width: 180px; height= 180px; object-fit:cover"
                                                src="{{ $nguoidung->file_path }}" alt="{{ $nguoidung->anh }}">
                                        @else
                                            <img style="width: 180px; height= 180px; object-fit:cover"
                                                src="{{ asset('adminlte/dist/img/noimage.png') }}" alt="No Image">
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="">Quyền</label>
                                        <input type="text" class="form-control" 
                                        value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bộ phận</label>
                                        <input type="text" class="form-control"
                                        value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>
                                        <select class="form-control select2" name="trang_thai" id="input"
                                            style="width: 100%;">
                                            <option selected="selected" value="1">Kích hoạt</option>
                                            <option value="0"> Ngừng sử dụng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 col-3 mx-auto">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-danger">Hủy</a>
                                    </div>
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
