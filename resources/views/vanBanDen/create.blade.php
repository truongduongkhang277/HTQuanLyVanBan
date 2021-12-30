@extends('layouts.master')
@section('title', 'Thêm mới văn bản đến')
@section('main')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">   
<div>
    <form action="{{route('vanBanDen.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Số văn bản đến</label>
                    <input class="form-control" type="text" name="so_vb_den">
                </div>
                <div class="form-group">
                    <label for="my-input">Số kí hiệu</label>
                    <input class="form-control" type="text" name="ki_hieu">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Ngày đến</label>
                    <input class="form-control" type="text" name="ngay_nhan">
                </div>
                <div class="form-group">
                    <label for="my-input">Đơn vị ban hành</label>
                    <select class="form-control" type="text" name="don_vi_ban_hanh" required>
                        <option value="">Chọn một</option>
                        @foreach($don_vi_ban_hanh as $co_quan)
                        <option value="{{$co_quan->id}}">{{$co_quan->ten_co_quan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Hình thức</label>
                    <select class="form-control" type="text" name="hinh_thuc" required>
                        <option value="">Chọn một</option>
                        @foreach($hinhthuc as $hinh_thuc)
                        <option value="{{$hinh_thuc->id}}">{{$hinh_thuc->hinh_thuc}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Ngày văn bản</label>
                    <input class="form-control" type="text" name="ngay_vb">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="my-input">Trích yếu</label>
                    <textarea class="form-control" type="text" name="trich_yeu" rows="3" placeholder="Trích yếu của văn bản đến"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Loại văn bản</label>
                    <select class="form-control" type="text" name="loai" required>
                        <option value="">Chọn một</option>
                        @foreach($theloai as $the_loai)
                        <option value="{{$the_loai->id}}">{{$the_loai->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Lĩnh vực</label>
                    <select class="form-control" type="text" name="linh_vuc" required>
                        <option value="">Chọn một</option>
                        @foreach($linhvuc as $linh_vuc)
                        <option value="{{$linh_vuc->id}}">{{$linh_vuc->linh_vuc}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Người ký</label>
                    <select class="form-control" type="text" name="nguoi_ky" required>
                        <option value="">Chọn một</option>
                        @foreach($nguoidung as $nguoi_ky)
                        <option value="{{$nguoi_ky->id}}">{{$nguoi_ky->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">File đính kèm</label>
                    <input class="form-control" type="file" name="ds_file">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Độ mật</label>
                    <select class="form-control" type="text" name="do_mat" required>
                        <option value="">Chọn một</option>
                        @foreach($domat as $do_mat)
                        <option value="{{$do_mat->id}}">{{$do_mat->do_mat}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Độ khẩn</label>
                    <select class="form-control" type="text" name="do_khan" required>
                        <option value="">Chọn một</option>
                        @foreach($dokhan as $do_khan)
                        <option value="{{$do_khan->id}}">{{$do_khan->do_khan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Chức vụ</label>
                    <select class="form-control" type="text" name="chuc_vu" required>
                        <option value="">Chọn một</option>
                        @foreach($chucdanh as $chuc_danh)
                        <option value="{{$chuc_danh->id}}">{{$chuc_danh->ten_quyen}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Hình thức chuyển</label>
                    <select class="form-control" type="text" name="hinh_thuc_chuyen" required>
                        <option value="">Chọn một</option>
                        @foreach($hinhthucchuyen as $hinh_thuc_chuyen)
                        <option value="{{$hinh_thuc_chuyen->id}}">{{$hinh_thuc_chuyen->hinh_thuc_chuyen}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Hình thức sao lưu</label>
                    <select class="form-control" type="text" name="hinh_thuc_luu" required>
                        <option value="">Chọn một</option>
                        @foreach($hinhthucluu as $hinh_thuc_luu)
                        <option value="{{$hinh_thuc_luu->id}}">{{$hinh_thuc_luu->hinh_thuc_luu}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Người nhận</label>
                    <select class="form-control" type="text" name="nv_nhan" required>
                        <option value="">Chọn một</option>
                        @foreach($nguoidung as $nv_nhan)
                        <option value="{{$nv_nhan->id}}">{{$nv_nhan->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Hạn xử lý</label>
                    <input class="form-control" type="text" name="han_xu_ly">
                </div>
            </div>
        </div>
        <div class="cpl-md-12">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="submit" class="btn btn-primary">Trình lãnh đạo đơn vị</button>
            <button type="submit" class="btn btn-primary">Chuyển xử lý</button>
            <button type="submit" class="btn btn-primary">Đóng</button>
        </div>
    </form>
</div>
     
</div><!-- /.container-fluid -->
</section>
</div>

<!-- /.content-wrapper -->
@stop();