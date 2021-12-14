@extends('layouts.admin')

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