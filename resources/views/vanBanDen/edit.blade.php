@extends('layouts.admin')

@section('title')
    Chỉnh sửa văn bản đến mới
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chỉnh sửa văn bản đến mới</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa văn bản đến mới</li>
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
                    <div class="col-md-11 mx-auto">
                        <form action="{{ route('nguoiDung.update', $nguoiDung->id) }}" method="POST" role="form">
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
                                        <select class="form-control select2" name="gioi_tinh" id="input"
                                            style="width: 100%;">
                                            <option selected="selected" value="1">[M] Nam</option>
                                            <option value="0"> [F] Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" class="form-control" name="dia_chi"
                                            value="{{ $nguoiDung->dia_chi }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh đại diện</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="anh" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile"
                                                    value="{{ $nguoiDung->anh }}"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Quyền</label>
                                        <select class="form-control select2" name="chuc_danh[]" id="input"
                                            style="width: 100%;">
                                            @foreach ($chucDanh as $chucdanh)
                                                <option selected="selected" value="{{ $chucdanh->id }}">
                                                    {{ $chucdanh->ten_quyen }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bộ phận</label>
                                        <select class="form-control select2" name="bo_phan[]" id="input"
                                            style="width: 100%;">
                                            @foreach ($boPhan as $bophan)
                                                <option selected="selected" value="{{ $bophan->id }}">
                                                    {{ $bophan->bo_phan }}</option>
                                            @endforeach
                                        </select>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
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
