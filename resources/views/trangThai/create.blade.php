@extends('layouts.master')
@section('title', 'Thêm trạng thái mới')
@section('main')
<form action="{{route('trangThai.store')}}" method="POST" role="form">
    @csrf
    <div class="form-group">
        <label for="">Tên trạng thái</label>
        <input type="text" class="form-control" name="trang_thai" placeholder="Nhập tên trạng thái">
        @error('trang_thai')
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