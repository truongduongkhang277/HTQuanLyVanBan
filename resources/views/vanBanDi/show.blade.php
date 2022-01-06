@extends('layouts.admin')

@section('title')
    Hiển thị văn bản đi
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
                        <h1 class="m-0">Hiển thị văn bản đi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Hiển thị văn bản đi</li>
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
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Số văn bản đi</label>
                                        <input class="form-control" type="text" name="so_vb_di"
                                            value="{{ $vanBanDi->so_vb_di }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Loại văn bản</label>
                                        <input class="form-control" type="text" name="loai"
                                            value="{{ optional($vanBanDi->loaiVB)->ten_loai }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Ngày ban hành</label>
                                        <input class="form-control" type="text" name="ngay_gui"
                                            value="{{ $vanBanDi->ngay_gui }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Số trang</label>
                                        <input class="form-control" type="text" name="so_trang"
                                            value="{{ $vanBanDi->so_trang }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Số kí hiệu</label>
                                        <input class="form-control" type="text" name="ki_hieu"
                                            value="{{ $vanBanDi->ki_hieu }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức văn bản</label>
                                        <input class="form-control" type="text" name="hinh_thuc"
                                            value="{{ optional($vanBanDi->hinhThuc)->hinh_thuc }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Lĩnh vực</label>
                                        <input class="form-control" type="text" name="linh_vuc"
                                            value="{{ optional($vanBanDi->linhVuc)->linh_vuc }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Số lượng bản phát hành</label>
                                        <input class="form-control" type="text" name="so_luong"
                                            value="{{ $vanBanDi->so_luong }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="my-input">Trích yếu</label>
                                        <textarea class="form-control" type="text" name="trich_yeu" rows="3" disabled>
                                                    {{ $vanBanDi->trich_yeu }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="my-input">Nhân viên phát hành</label>
                                        <input class="form-control" type="text" name="nv_phathanh"
                                            value="{{ optional($vanBanDi->nvPhatHanh)->name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Người ký</label>
                                        <input class="form-control" type="text" name="nguoi_ky"
                                            value="{{ optional($vanBanDi->nguoiKy)->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Độ khẩn</label>
                                        <input class="form-control" type="text" name="do_khan"
                                            value="{{ optional($vanBanDi->doKhan)->do_khan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Cơ quan nhận</label>
                                        <input class="form-control" type="text" name="noi_nhan"
                                            value="{{ optional($vanBanDi->noiNhan)->ten_co_quan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">File đính kèm</label>
                                        <input class="form-control" type="text" name="ds_file"
                                            value="{{ $vanBanDi->ds_file }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Chức vụ người ký</label>
                                        <input class="form-control" type="text" name="chuc_vu"
                                            value="{{ optional($vanBanDi->chucVu)->ten_quyen }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức sao lưu</label>
                                        <input class="form-control" type="text" name="hinh_thuc_luu"
                                            value="{{ $vanBanDi->hinh_thuc_luu }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Cơ quan gửi</label>
                                        <input class="form-control" type="text" name="noi_gui"
                                            value="{{ optional($vanBanDi->noiGui)->ten_co_quan }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hạn xử lý</label>
                                        <input class="form-control" type="text" name="han_xu_ly"
                                            value="{{ $vanBanDi->han_xu_ly }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Trở về</a>
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
