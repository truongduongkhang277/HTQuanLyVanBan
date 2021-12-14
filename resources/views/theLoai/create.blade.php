@extends('layouts.admin')

@section('title', 'Thêm thể loại mới')
@section('main')

    
    <form action="{{route('theLoai.store')}}" method="POST" role="form">
        @csrf 
        <div class="form-group">
            <label for="">Tên thể loại</label>
            <input type="text" class="form-control" name="ten_loai" placeholder="Nhập tên thể loại">
            @error('the_loai')
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