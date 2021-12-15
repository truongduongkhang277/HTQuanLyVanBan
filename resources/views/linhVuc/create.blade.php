@extends('master')

@section('title', 'Thêm lĩnh vực mới')
@section('main')

    
    <form action="{{route('linhVuc.store')}}" method="POST" role="form">
        @csrf 
        <div class="form-group">
            <label for="">Tên lĩnh vực</label>
            <input type="text" class="form-control" name="linh_vuc" placeholder="Nhập tên lĩnh vực">
            @error('linh_vuc')
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