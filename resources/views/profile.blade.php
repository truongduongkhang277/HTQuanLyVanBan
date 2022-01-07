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
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (!empty(auth()->user()->file_path))
                                        <img src="{{ auth()->user()->file_path }}"
                                            class="profile-user-img img-fluid img-circle" alt="User Image">
                                    @else
                                        <img src="{{ asset('adminlte/dist/img/noimage.png') }}"
                                            class="profile-user-img img-fluid img-circle" alt="User Image">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                                <a href="#" class="btn btn-primary btn-block"><b>Đổi ảnh đại diện</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#info"
                                            data-toggle="tab">Thông tin cá nhân</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#change_password"
                                            data-toggle="tab">Đổi mật khẩu</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="info">
                                        <form class="form-horizontal" method="POST"
                                            action="{{ route('nguoiDung.updateInfo') }}" id="infoForm">
                                            @csrf @method('PUT')                                            
                                            @include('partials.alert')
                                            <div class="form-group row">
                                                <label for="my-input" class="col-sm-2 col-form-label">Họ và tên</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ auth()->user()->name }}">
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="my-input" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10"><input class="form-control" type="email"
                                                        name="email" value="{{ auth()->user()->email }}">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="my-input" class="col-sm-2 col-form-label">Sđt</label>
                                                <div class="col-sm-10"><input class="form-control" type="text"
                                                        name="so_dt" value="{{ auth()->user()->so_dt }}">
                                                    <span class="text-danger error-text so_dt_error"></span>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success">Cập nhật thông tin</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="change_password">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="my-input" class="col-sm-3 col-form-label">Mật khẩu hiện
                                                    tại</label>
                                                <div class="col-sm-9"><input class="form-control" type="password"
                                                        name="password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="my-input" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                                                <div class="col-sm-9"><input class="form-control" type="password"
                                                        name="new_password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="my-input" class="col-sm-3 col-form-label">Nhập lại mật khẩu
                                                    mới</label>
                                                <div class="col-sm-9"><input class="form-control" type="password"
                                                        name="confirm_password">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success">Cập nhật mật khẩu</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
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
