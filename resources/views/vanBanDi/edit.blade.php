@extends('layouts.admin')

@section('title')
    Chỉnh sửa văn bản đi
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
                        <h1 class="m-0">Chỉnh sửa văn bản đi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa văn bản đi</li>
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
                        <form action="{{ route('vanBanDi.update', $vanBanDi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf                                    
                            @include('partials.alert')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Số văn bản đi</label>
                                        <input class="form-control" type="text" name="so_vb_di"
                                            value="{{ $vanBanDi->so_vb_di }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Loại văn bản</label>
                                        <select class="form-control" type="text" name="loai">
                                            @foreach ($theloai as $the_loai)
                                                @if ($the_loai->id == $vanBanDi->loai)
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
                                        <label for="my-input">Ngày ban hành</label>
                                        <input class="form-control" type="text" name="ngay_gui"
                                            value="{{ $vanBanDi->ngay_gui }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Số trang</label>
                                        <input class="form-control" type="text" name="so_trang"
                                            value="{{ $vanBanDi->so_trang }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Số kí hiệu</label>
                                        <input class="form-control" type="text" name="ki_hieu"
                                            value="{{ $vanBanDi->ki_hieu }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hình thức văn bản</label>
                                        <select class="form-control" type="text" name="hinh_thuc">
                                            @foreach ($hinhthuc as $hinh_thuc)
                                                @if ($hinh_thuc->id == $vanBanDi->hinh_thuc)
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
                                    <div class="form-group">
                                        <label for="my-input">Lĩnh vực</label>
                                        <select class="form-control" type="text" name="linh_vuc">
                                            @foreach ($linhvuc as $linh_vuc)
                                                @if ($linh_vuc->id == $vanBanDi->linh_vuc)
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
                                        <label for="my-input">Số lượng bản phát hành</label>
                                        <input class="form-control" type="text" name="so_luong"
                                            value="{{ $vanBanDi->so_luong }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="my-input">Trích yếu</label>
                                        <textarea class="form-control" type="text" name="trich_yeu"
                                            rows="3">{{ $vanBanDi->trich_yeu }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Người ký</label>
                                        <select class="form-control" type="text" name="nguoi_ky">
                                            @foreach ($nguoidung as $nguoi_ky)
                                                @if ($nguoi_ky->id == $vanBanDi->nguoi_ky)
                                                    <option value="{{ $nguoi_ky->id }}" selected>{{ $nguoi_ky->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $nguoi_ky->id }}">{{ $nguoi_ky->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="my-input">Nhân viên phát hành</label>
                                        <input class="form-control" type="text" name="nv_phathanh">
                                        <select class="form-control" type="text" name="nv_phathanh" required>
                                            <option value="">Chọn một</option>
                                            @foreach ($nguoidung as $nv_phathanh)
                                                <option value="{{ $nv_phathanh->id }}">{{ $nv_phathanh->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="my-input">Độ khẩn</label>
                                        <select class="form-control" type="text" name="do_khan">
                                            @foreach ($dokhan as $do_khan)
                                                @if ($do_khan->id == $vanBanDi->do_khan)
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
                                        <label for="my-input">Cơ quan nhận</label>
                                        <select class="form-control" type="text" name="noi_nhan">
                                            @foreach ($coquan as $co_quan)
                                                @if ($co_quan->id == $vanBanDi->noi_nhan)
                                                    <option value="{{ $co_quan->id }}" selected>
                                                        {{ $co_quan->ten_co_quan }} </option>
                                                @else
                                                    <option value="{{ $co_quan->id }}">
                                                        {{ $co_quan->ten_co_quan }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">File đính kèm</label>
                                        <input class="form-control-file" type="file" name="ds_file">
                                        <a>{{ $vanBanDi->ds_file }}</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input">Chức vụ người ký</label>
                                        <select class="form-control" type="text" name="chuc_vu">
                                            @foreach ($vaiTro as $chuc_danh)
                                                @if ($chuc_danh->id == $vanBanDi->chuc_vu)
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
                                        <label for="my-input">Hình thức sao lưu</label>
                                        <select class="form-control" type="text" name="hinh_thuc_luu" required>
                                            <option value="">Chọn một</option>
                                            @foreach ($hinhthucluu as $hinh_thuc_luu)
                                                @if ($hinh_thuc_luu->id == $vanBanDi->hinh_thuc_luu)
                                                    <option value="{{ $hinh_thuc_luu->id }}" selected>
                                                        {{ $hinh_thuc_luu->hinh_thuc_luu }}</option>
                                                @else
                                                    <option value="{{ $hinh_thuc_luu->id }}">
                                                        {{ $hinh_thuc_luu->hinh_thuc_luu }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Cơ quan gửi</label>
                                        <select class="form-control" type="text" name="noi_gui">
                                            @foreach ($coquan as $co_quan)
                                                @if ($co_quan->id == $vanBanDi->noi_gui)
                                                    <option value="{{ $co_quan->id }}" selected>
                                                        {{ $co_quan->ten_co_quan }} </option>
                                                @else
                                                    <option value="{{ $co_quan->id }}">
                                                        {{ $co_quan->ten_co_quan }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="my-input">Hạn xử lý</label>
                                        <input class="form-control" type="text" name="han_xu_ly"
                                            value="{{ $vanBanDi->han_xu_ly }}">
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
