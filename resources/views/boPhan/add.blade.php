@extends('layouts.admin')

@section('title')
    Thêm bộ phận mới
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm bộ phận mới</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm bộ phận mới</li>
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
                        <form action="{{ route('boPhan.store') }}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên bộ phận</label>
                                <input type="text" class="form-control" name="bo_phan" placeholder="Nhập tên bộ phận">
                                @error('bo_phan')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Kí hiệu</label>
                                <input type="text" class="form-control" name="ki_hieu" placeholder="Nhập kí hiệu">
                                @error('ki_hieu')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="my-input">Trưởng bộ phận</label>
                                <select class="form-control" type="text" name="truong_bo_phan" required>
                                    <option value="">Chọn một</option>
                                    @foreach ($nguoidung as $truong_bo_phan)
                                        <option value="{{ $truong_bo_phan->id }}">{{ $truong_bo_phan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control select2" name="trang_thai" id="input" style="width: 100%;">
                                    <option selected="selected" value="1">Đang hoạt động</option>
                                    <option value="0"> Ngừng hoạt động</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <input type="text" class="form-control" name="ghi_chu" placeholder="Ghi chú">
                                @error('ghi_chu')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Hủy</a>
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
