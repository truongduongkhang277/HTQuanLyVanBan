@extends('layouts.admin')

@section('title')
    Thêm cơ quan mới
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm cơ quan mới</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm cơ quan mới</li>
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
                        <form action="{{ route('coQuan.store') }}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên cơ quan</label>
                                <input type="text" class="form-control" name="ten_co_quan" placeholder="Nhập tên cơ quan">
                                @error('ten_co_quan')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ cơ quan</label>
                                <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ cơ quan">
                                @error('dia_chi')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control select2" name="trang_thai" id="input" style="width: 100%;">
                                    <option selected="selected" value="1">Kích hoạt</option>
                                    <option value="0"> Ngừng sử dụng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <input type="text" class="form-control" name="ghi_chu" placeholder="Ghi chú">
                                @error('ghi_chu')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-grid gap-2 col-4 mx-auto">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                    <button type="submit" class="btn btn-danger">Hủy</button>
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
