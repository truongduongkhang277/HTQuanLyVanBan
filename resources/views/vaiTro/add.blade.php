@extends('layouts.admin')

@section('title')
    Thêm vai trò mới
@endsection

@section('css')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm vai trò mới</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm vai trò mới</li>
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
                        <form action="{{ route('vaiTro.store') }}" method="POST" role="form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Vai trò</label>
                                    <input type="text" class="form-control" name="vai_tro" placeholder="Nhập tên vai trò">
                                    @error('vai_tro')
                                        <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Trạng thái</label>
                                    <select class="form-control select2" name="trang_thai" id="input" style="width: 100%;">
                                        <option selected="selected" value="1">Kích hoạt</option>
                                        <option value="0"> Ngừng sử dụng</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Ghi chú</label>
                                    <input type="text" class="form-control" name="ghi_chu" placeholder="Ghi chú">
                                    @error('ghi_chu')
                                        <small class="help-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach ($quyenTruyCapParent as $quyenTruyCapParentItem)
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <label>
                                                    <input type="checkbox" id="" value="" class="checkbox_wrapper">
                                                </label>
                                                Module {{ $quyenTruyCapParentItem->quyen_truy_cap }}
                                            </div>
                                            <div class="row">
                                                @foreach ($quyenTruyCapParentItem->permissionChildren as $permissionChildrenItem)
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <label for="">
                                                                <input type="checkbox" name="quyenTruyCap_id" class="checkbox_children"
                                                                    value="{{ $permissionChildrenItem->id }}">
                                                            </label>
                                                            {{ $permissionChildrenItem->quyen_truy_cap }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    @endforeach
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="d-grid gap-2 col-2 mx-auto">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Lưu</button>
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

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.checkbox_wrapper').on('click', function() {
            $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection
