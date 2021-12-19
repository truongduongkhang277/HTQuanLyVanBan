@extends('master')

@section('title', 'Thêm chức danh mới')
@section('main')

    
    <form action="{{route('chucDanh.store')}}" method="POST" role="form">
        @csrf 
        <div class="form-group">
            <label for="">Tên quyền</label>
            <input type="text" class="form-control" name="ten_quyen" placeholder="Nhập tên quyền">
            @error('ten_quyen')
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
        <label for="">Quyền truy cập</label>  
        <div class="row">
            <div class="form-group col-3">
                <label for="">Văn bản đến</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="vanBanDen.index">
                        Danh sách văn bản đến
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="vanBanDen.create">
                        Thêm văn bản đến
                    </label>
                </div>
                <hr/>
                <label for="">Văn bản đi</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="vanBanDi.index">
                        Danh sách văn bản đi
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="vanBanDi.create">
                        Thêm văn bản đi
                    </label>
                </div>
                <hr/>
                <label for="">Bộ phận</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="bophan.index">
                        Danh sách bộ phận
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="bophan.create">
                        Thêm mới bộ phận
                    </label>
                </div>
            </div>
            <div class="form-group col-3">
                <label for="">Thể loại</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="theLoai.index">
                        Danh sách thể loại
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="theLoai.create">
                        Thêm mới thể loại
                    </label>
                </div>
                <hr/>
                <label for="">Lĩnh vực</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="linhVuc.index">
                        Danh sách lĩnh vực
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="linhVuc.create">
                        Thêm mới lĩnh vực
                    </label>
                </div>
                <hr/>
                <label for="">Hình thức</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="hinhThuc.index">
                        Danh sách hình thức
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="hinhThuc.create">
                        Thêm mới hình thức
                    </label>
                </div>
            </div>
            <div class="form-group col-3">
                <label for="">Hình thức chuyển</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="hinhThucChuyen.index">
                        Danh sách Hình thức chuyển
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="hinhThucChuyen.create">
                        Thêm mới hình thức chuyển
                    </label>
                </div>
                <hr/>
                <label for="">Hình thức lưu</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="hinhThucLuu.index">
                        Danh sách hình thức lưu
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="hinhThucLuu.create">
                        Thêm hình thức lưu
                    </label>
                </div>
                <hr/>
                <label for="">Độ mật</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="doMat.index">
                        Danh sách độ mật
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="doMat.create">
                        Thêm độ mật
                    </label>
                </div>
            </div>
            <div class="form-group col-3">
                <label for="">Độ khẩn</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="doKhan.index">
                        Danh sách độ khẩn
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="doKhan.create">
                        Thêm độ khẩn
                    </label>
                </div>
                <hr/>
                <label for="">Cơ quan</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="coQuan.index">
                        Danh sách cơ quan
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="coQuan.create">
                        Thêm cơ quan
                    </label>
                </div>
                <hr/>
                <label for="">Chức danh</label>            
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="chucDanh.index">
                        Danh sách chức danh
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="quyen_truy_cap[]" value="chucDanh.create">
                        Thêm chức danh
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Ghi chú</label>
            <input type="text" class="form-control" name="ghi_chu" placeholder="Ghi chú">
            @error('ghi_chu')
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
        
    
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>   
    
@stop();