@extends('master')

@section('title', 'Thêm độ khẩn mới')
@section('main')

    
    <form action="{{route('doKhan.store')}}" method="POST" role="form">
        @csrf 
        <div class="form-group">
            <label for="">Độ khẩm</label>
            <input type="text" class="form-control" name="do_khan" placeholder="Nhập độ khẩn">
            @error('do_khan')
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