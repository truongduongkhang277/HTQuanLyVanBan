@extends('master')

@section('title', 'Sửa thông tin tài khoản')
@section('main')

<div class="panel panel-primary">
      <div class="panel-body">
            
            <form action="{{route('nguoiDung.update')}}" method="PUT" role="form">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label >Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="{{$nguoiDung->name}}">
                        </div>
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control" name="email" value="{{$nguoiDung->email}}" disabled>
                        </div>
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="ngay_sinh" placeholder= "dd/mm/yyyy">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->                          
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="so_dt" value="{{$nguoiDung->so_dt}}">
                        </div>                         
                        <!-- radio 
                        <div class="form-group">
                            <label for="">Giới tính</label>
                            <div class="form-check">                                
                                <input class="form-check-input" type="radio" name="radio1">
                                <label class="form-check-label">Nam</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" checked>
                                <label class="form-check-label">Nữ</label>
                            </div>
                        </div> 
                        -->                   

                    </div>
                    <div class="col-md-6">                      
                        
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" name="dia_chi" value="{{$nguoiDung->dia_chi}}">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputFile">Ảnh đại diện</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="anh" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Quyền</label>                            
                            <select class="form-control select2" name="chuc_danh[]" id="input"style="width: 100%;">
                            @foreach($chucDanh as $chucdanh)
                                <option selected="selected" value="{{$chucdanh->id}}">{{$chucdanh->ten_quyen}}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="">Bộ phận</label>                            
                            <select class="form-control select2" name="bo_phan[]" id="input"style="width: 100%;">
                                @foreach($boPhan as $bophan)
                                <option selected="selected" value="{{$bophan->id}}">{{$bophan->bo_phan}}</option>
                                @endforeach
                            </select>
                        </div>    
                        <!-- radio -->
                        <div class="form-group">
                            <label for="">Trạng thái</label>
                            <div class="form-check">                                
                                <input class="form-check-input" type="radio" name="radio1">
                                <label class="form-check-label">Hoạt động</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" checked>
                                <label class="form-check-label">Ngưng hoạt động</label>
                            </div>
                        </div>
                                                            
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
      </div>
</div>

@stop()

@section('js')
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@stop()
