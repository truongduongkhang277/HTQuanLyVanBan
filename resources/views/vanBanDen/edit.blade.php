@extends('layouts.admin')

@section('title')
    Chỉnh sửa văn bản đến
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
                        <h1 class="m-0">Chỉnh sửa văn bản đến</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa văn bản đến</li>
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
                        <form action="{{ route('vanBanDen.update', $vanBanDen->id) }}" method="POST"
                            enctype="multipart/form-data">
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
                                            value="{{ $vanBanDen->ngay_nhan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Ngày văn bản</label>
                                        <input class="form-control" type="text" name="ngay_vb"
                                            value="{{ $vanBanDen->ngay_vb }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Số kí hiệu</label>
                                        <input class="form-control" type="text" name="ki_hieu"
                                            value="{{ $vanBanDen->ki_hieu }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Đơn vị ban hành</label>
                                        <select class="form-control" type="text" name="don_vi_ban_hanh">
                                            @foreach ($don_vi_ban_hanh as $co_quan)
                                                @if ($co_quan->id == $vanBanDen->don_vi_ban_hanh)
                                                    <option value="{{ $co_quan->id }}" selected>
                                                        {{ $co_quan->ten_co_quan }}</option>
                                                @else
                                                    <option value="{{ $co_quan->id }}">{{ $co_quan->ten_co_quan }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức</label>
                                        <select class="form-control" type="text" name="hinh_thuc">
                                            @foreach ($hinhthuc as $hinh_thuc)
                                                @if ($hinh_thuc->id == $vanBanDen->hinh_thuc)
                                                    <option value="{{ $hinh_thuc->id }}" selected>
                                                        {{ $hinh_thuc->hinh_thuc }}
                                                    </option>
                                                @else
                                                    <option value="{{ $hinh_thuc->id }}">{{ $hinh_thuc->hinh_thuc }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="my-input">Trích yếu</label>
                                        <textarea class="form-control" type="text" name="trich_yeu" rows="3"
                                            placeholder="Trích yếu của văn bản đến"> {{ $vanBanDen->trich_yeu }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Loại văn bản</label>
                                        <select class="form-control" type="text" name="loai">
                                            @foreach ($theloai as $the_loai)
                                                @if ($the_loai->id == $vanBanDen->loai)
                                                    <option value="{{ $the_loai->id }}" selected>
                                                        {{ $the_loai->ten_loai }}</option>
                                                @else
                                                    <option value="{{ $the_loai->id }}">{{ $the_loai->ten_loai }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Độ mật</label>
                                        <select class="form-control" type="text" name="do_mat">
                                            @foreach ($domat as $do_mat)
                                                @if ($do_mat->id == $vanBanDen->do_mat)
                                                    <option value="{{ $do_mat->id }}" selected>
                                                        {{ $do_mat->do_mat }}</option>
                                                @else
                                                    <option value="{{ $do_mat->id }}">{{ $do_mat->do_mat }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức sao lưu</label>
                                        <select class="form-control" type="text" name="hinh_thuc_luu" required>
                                            <option value="">Chọn một</option>
                                            @foreach ($hinhthucluu as $hinh_thuc_luu)
                                                @if ($hinh_thuc_luu->id == $vanBanDen->hinh_thuc_luu)
                                                    <option value="{{ $hinh_thuc_luu->id }}" selected>
                                                        {{ $hinh_thuc_luu->hinh_thuc_luu }}</option>
                                                @else
                                                    <option value="{{ $hinh_thuc_luu->id }}">
                                                        {{ $hinh_thuc_luu->hinh_thuc_luu }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="my-input">Người nhận</label>
                                        <select class="form-control" type="text" name="nv_nhan" required>
                                            <option value="">Chọn một</option>
                                            @foreach ($nguoidung as $nv_nhan)
                                                <option value="{{ $nv_nhan->id }}">{{ $nv_nhan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="my-input">Người ký</label>
                                        <input class="form-control" type="text" name="ngay_vb"
                                            value="{{ $vanBanDen->nguoi_ky }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">File đính kèm</label>
                                        <input class="form-control-file" type="file" name="ds_file">
                                        <a>{{ $vanBanDen->ds_file }}</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Lĩnh vực</label>
                                        <select class="form-control" type="text" name="linh_vuc">
                                            @foreach ($linhvuc as $linh_vuc)
                                                @if ($linh_vuc->id == $vanBanDen->linh_vuc)
                                                    <option value="{{ $linh_vuc->id }}" selected>
                                                        {{ $linh_vuc->linh_vuc }}</option>
                                                @else
                                                    <option value="{{ $linh_vuc->id }}">{{ $linh_vuc->linh_vuc }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Độ khẩn</label>
                                        <select class="form-control" type="text" name="do_khan">
                                            @foreach ($dokhan as $do_khan)
                                                @if ($do_khan->id == $vanBanDen->do_khan)
                                                    <option value="{{ $do_khan->id }}" selected>
                                                        {{ $do_khan->do_khan }}</option>
                                                @else
                                                    <option value="{{ $do_khan->id }}">{{ $do_khan->do_khan }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức chuyển</label>
                                        <select class="form-control" type="text" name="hinh_thuc_chuyen" required>
                                            <option value="">Chọn một</option>
                                            @foreach ($hinhthucchuyen as $hinh_thuc_chuyen)
                                                @if ($hinh_thuc_chuyen->id == $vanBanDen->hinh_thuc_chuyen)
                                                    <option value="{{ $hinh_thuc_chuyen->id }}" selected>
                                                        {{ $hinh_thuc_chuyen->hinh_thuc_chuyen }}</option>
                                                @else
                                                    <option value="{{ $hinh_thuc_chuyen->id }}">
                                                        {{ $hinh_thuc_chuyen->hinh_thuc_chuyen }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Chức vụ</label>
                                        <select class="form-control" type="text" name="chuc_vu">
                                            @foreach ($vaiTro as $chuc_danh)
                                                @if ($chuc_danh->id == $vanBanDen->chuc_danh)
                                                    <option value="{{ $chuc_danh->id }} selected">
                                                        {{ $chuc_danh->vai_tro }}
                                                    </option>
                                                @else
                                                    <option value="{{ $chuc_danh->id }}">{{ $chuc_danh->vai_tro }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hạn xử lý</label>
                                        <input class="form-control" type="text" name="han_xu_ly"
                                            value="{{ $vanBanDen->han_xu_ly }}">
                                    </div>
                                </div>
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

@section('js')

    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
@endsection
