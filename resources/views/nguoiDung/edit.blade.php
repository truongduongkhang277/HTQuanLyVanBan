@extends('layouts.admin')

@section('title')
    Chỉnh sửa thông tin tài khoản
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <style>
        .select2-selection__choice {
            background-color: darkcyan !important
        }

    </style>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chỉnh sửa thông tin tài khoản</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa thông tin tài khoản</li>
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
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('nguoiDung.update', $nguoiDung->id) }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')                                    
                            @include('partials.alert')
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
                                        <div class="col-md-12">
                                            <div class="row">
                                                @if (!empty($nguoiDung->file_path))
                                                    <img style="width: 180px; height= 180px; object-fit:cover"
                                                        src="{{ $nguoiDung->file_path }}" alt="{{ $nguoiDung->anh }}">
                                                @else
                                                    <img style="width: 180px; height= 180px; object-fit:cover"
                                                        src="{{ asset('adminlte/dist/img/noimage.png') }}"
                                                        alt="No Image">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Vai trò</label>
                                        <select name="vai_tro[]" class="form-control select2_init" multiple>
                                            <option value=""></option>
                                            @foreach ($vaiTro as $vai_tro)
                                                <option
                                                    {{ $vaiTroNguoiDung->contains('id', $vai_tro->id) ? 'selected' : '' }}
                                                    value="{{ $vai_tro->id }}">{{ $vai_tro->vai_tro }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Bộ phận</label>
                                        <select class="form-control" type="text" name="bo_phan">
                                            @foreach ($boPhan as $bo_phan)
                                                @if ($bo_phan->id == $nguoiDung->bo_phan)
                                                    <option value="{{ $bo_phan->id }}" selected>
                                                        {{ $bo_phan->bo_phan }} </option>
                                                @else
                                                    <option value="{{ $bo_phan->id }}">{{ $bo_phan->bo_phan }}
                                                    </option>
                                                @endif
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
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                <a href="{{ route('nguoiDung.index') }}" class="btn btn-danger">Hủy</a>
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
@section('js')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder': 'Chọn vai trò'
        })
    </script>
@endsection
