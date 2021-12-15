@extends('master')

@section('title', 'Thêm mới văn bản đến')
@section('main')

    
    <form action="{{route('vanBanDen.store')}}" method="POST" enctype="multipart/form-data">       
    @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Số văn bản đến</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Số kí hiệu</label>
                    <input class="form-control" type="text" name="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Ngày đến</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Đơn vị ban hành</label>
                    <select class="form-control" type="text" name="co_quan" required>
                        <option value="">Chọn một</option>
                        @foreach($coquan as $co_quan)
                            <option value="{{$co_quan->id}}">{{$co_quan->ten_co_quan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Hình thức</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Ngày văn bản</label>
                    <input class="form-control" type="text" name="">
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
                    <select class="form-control" type="text" name="the_loai" required>
                        <option value="">Chọn một</option>
                        @foreach($theloai as $the_loai)
                            <option value="{{$the_loai->id}}">{{$the_loai->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Lĩnh vực</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                    <label for="my-input">Người kí</label>
                    <input class="form-control" type="text" name="">
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
                    <select class="form-control" type="text" name="chuc_danh" required>
                        <option value="">Chọn một</option>
                        @foreach($chucdanh as $chuc_danh)
                            <option value="{{$chuc_danh->id}}">{{$chuc_danh->ten_quyen}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Hình thức chuyển</label>
                    <input class="form-control" type="text" name="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="my-input">Hình thức sao lưu</label>
                    <select class="form-control" type="text" name="hinh_thuc" required>
                        <option value="">Chọn một</option>
                        @foreach($hinhthuc as $hinh_thuc)
                            <option value="{{$hinh_thuc->id}}">{{$hinh_thuc->hinh_thuc}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Người nhận</label>
                    <select class="form-control" type="text" name="nguoi_ki" required>
                        <option value="">Chọn một</option>
                        @foreach($nguoidung as $nguoi_ki)
                            <option value="{{$nguoi_ki->id}}">{{$nguoi_ki->ten_dang_nhap}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="my-input">Hạn xử lý</label>
                    <input class="form-control" type="text" name="">
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
    
    
@stop();