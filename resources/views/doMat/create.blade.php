@extends('master')

@section('title', 'Thêm độ mật mới')
@section('main')

    
    <form action="{{route('doMat.store')}}" method="POST" role="form">
        @csrf 
        <div class="form-group">
            <label for="">Độ mật</label>
            <input type="text" class="form-control" name="do_mat" placeholder="Nhập độ mật">
            @error('do_mat')
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