@extends('layouts.master')
@section('title', 'Thêm hình thức lưu mới')
@section('main')
<form action="{{route('hinhThucLuu.store')}}" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label for="">Tên hình thức lưu</label>
        <input type="text" class="form-control" name="hinh_thuc_luu" placeholder="Nhập tên hình thức lưu">
        @error('hinh_thuc_luu')
        <small class="help-block">{{$message}}</small>
        @enderror
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