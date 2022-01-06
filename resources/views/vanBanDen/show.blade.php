@extends('layouts.admin')

@section('title')
    Hiển thị văn bản đến
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hiển thị văn bản đến</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hiển thị văn bản đến</li>
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf @method("PUT")
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Số văn bản đến</label>
                                        <input class="form-control" type="text" name="so_vb_den"
                                            value="{{ $vanBanDen->so_vb_den }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Ngày đến</label>
                                        <input class="form-control" type="text" name="ngay_nhan"
                                            value="{{ $vanBanDen->ngay_nhan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Ngày văn bản</label>
                                        <input class="form-control" type="text" name="ngay_vb"
                                            value="{{ $vanBanDen->ngay_vb }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Số kí hiệu</label>
                                        <input class="form-control" type="text" name="ki_hieu"
                                            value="{{ $vanBanDen->ki_hieu }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Đơn vị ban hành</label>
                                        <input class="form-control" type="text" name="don_vi_ban_hanh"
                                            value="{{ optional($vanBanDen->dvBanHanh)->ten_co_quan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức</label>
                                        <input class="form-control" type="text" name="don_vi_ban_hanh"
                                            value="{{ optional($vanBanDen->hinhThuc)->hinh_thuc }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="my-input">Trích yếu</label>
                                        <textarea class="form-control" type="text" name="trich_yeu" rows="3"
                                            placeholder="Trích yếu của văn bản đến"
                                            disabled> {{ $vanBanDen->trich_yeu }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Loại văn bản</label>
                                        <input class="form-control" type="text" name="loai"
                                            value="{{ optional($vanBanDen->loaiVB)->ten_loai }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Độ mật</label>
                                        <input class="form-control" type="text" name="do_mat"
                                            value="{{ optional($vanBanDen->doMat)->do_mat }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="my-input">Hình thức sao lưu</label>
                                        <input class="form-control" type="text" name="hinh_thuc_luu"
                                            value="{{ optional($vanBanDen->hinhThucLuu)->hinh_thuc_luu }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Người ký</label>
                                        <input class="form-control" type="text" name="nguoi_ky"
                                            value="{{ $vanBanDen->nguoi_ky }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">File đính kèm</label>
                                        <input class="form-control" type="text" name="ds_file"
                                            value="{{ $vanBanDen->ds_file }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Lĩnh vực</label>
                                        <input class="form-control" type="text" name="linh_vuc"
                                            value="{{ optional($vanBanDen->linhVuc)->linh_vuc }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Độ khẩn</label>
                                        <input class="form-control" type="text" name="do_khan"
                                            value="{{ optional($vanBanDen->doKhan)->do_khan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức chuyển</label>
                                        <input class="form-control" type="text" name="hinh_thuc_chuyen"
                                            value="{{ optional($vanBanDen->hinhThucChuyen)->hinh_thuc_chuyen }}"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Chức vụ</label>
                                        <input class="form-control" type="text" name="chuc_vu"
                                            value="{{ optional($vanBanDen->vaiTro)->vai_tro }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hạn xử lý</label>
                                        <input class="form-control" type="text" name="han_xu_ly"
                                            value="{{ $vanBanDen->han_xu_ly }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="my-input">Người nhận</label>
                                        <input class="form-control" type="text" name="nv_nhan"
                                            value="{{ optional($vanBanDen->nguoiNhan)->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
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

@section('js')

    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
