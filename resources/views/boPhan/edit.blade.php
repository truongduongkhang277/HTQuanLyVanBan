@extends('layouts.master')
@section('title', 'Sửa thông tin bộ phận')
@section('main')
<div class="panel panel-primary">
    <div class="panel-body">
        <form action="{{route('bophan.update', $boPhan->id)}}" method="POST" role="form">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Tên bộ phận</label>
                <input type="text" class="form-control" name="bo_phan" value="{{$boPhan->bo_phan}}">
                @error('bo_phan')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Kí hiệu</label>
                <input type="text" class="form-control" name="ki_hieu" value="{{$boPhan->ki_hieu}}">
                @error('ki_hieu')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="my-input">Trưởng bộ phận</label>
                <select class="form-control" type="text" name="truong_bo_phan" required>
                    <option value="">Chọn một</option>
                    @foreach($nguoidung as $truong_bo_phan)
                    <option value="{{$truong_bo_phan->id}}">{{$truong_bo_phan->name}}</option>
                    @endforeach
                </select>
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
                <input type="text" class="form-control" name="ghi_chu" value="{{$boPhan->ghi_chu}}">
                @error('ghi_chu')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@stop()
@section('js')
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@stop()