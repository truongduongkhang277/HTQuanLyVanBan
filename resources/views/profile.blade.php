@extends('layouts.admin')

@section('title')
    Thông tin cá nhân
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
                        <h1>Thông tin tài khoản</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thông tin tài khoản</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="text-center">
                            @if (!empty(auth()->user()->file_path))
                                <img src="{{ auth()->user()->file_path }}"
                                    class="img-thumbnail" alt="User Image">
                            @else
                                <img src="{{ asset('adminlte/dist/img/noimage.png') }}"
                                    class="profile-user-img img-fluid img-circle" alt="User Image">
                            @endif
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ auth()->user()->name }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ auth()->user()->email }}" disabled>
                                </div>
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="ngay_sinh"
                                            value="{{ auth()->user()->ngay_sinh }}" disabled>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                            </div>
                            <div class="col-md-6">
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="so_dt"
                                        value="{{ auth()->user()->so_dt }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Bộ phận</label>
                                    <input type="text" class="form-control" name="bo_phan"
                                        value="{{ optional(auth()->user()->boPhan)->bo_phan }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Giới tính</label>
                                    <input type="text" class="form-control" name="gioi_tinh" @if (auth()->user()->gioi_tinh == 1) : value="Nam" @else value="Nữ" @endif
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi"
                                        value="{{ auth()->user()->dia_chi }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('nguoiDung.editInfo') }}" class="btn btn-success">Cập nhật thông tin</a>
                    <a href="{{ route('nguoiDung.changePassword') }}" class="btn btn-danger">Đổi mật khẩu</a>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('js')

@endsection
