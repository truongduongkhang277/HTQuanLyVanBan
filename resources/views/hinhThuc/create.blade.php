@extends('layouts.admin')

@section('title', 'Thêm hình thức mới')
@section('main')

    
    <form action="{{route('hinhThuc.store')}}" method="POST" role="form">
        @csrf
        <div class="form-group">
            <label for="">Tên hình thức</label>
            <input type="text" class="form-control" name="hinh_thuc" placeholder="Nhập tên hình thức">
            @error('hinh_thuc')
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