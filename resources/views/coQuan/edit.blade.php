@extends('layouts.admin')

@section('title')
    Chỉnh sửa cơ quan
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chỉnh sửa cơ quan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa cơ quan</li>
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
                        <form action="{{ route('coQuan.update', $coQuan->id) }}" method="POST" role="form">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="">Tên cơ quan</label>
                                <input type="text" class="form-control" name="ten_co_quan"
                                    value="{{ $coQuan->ten_co_quan }}">
                                @error('ten_co_quan')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ cơ quan</label>
                                <input type="text" class="form-control" name="dia_chi" value="{{ $coQuan->dia_chi }}">
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
                                <input type="text" class="form-control" name="ghi_chu" value="{{ $coQuan->ghi_chu }}">
                                @error('ghi_chu')
                                    <small class="help-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Cập nhật</button>
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
