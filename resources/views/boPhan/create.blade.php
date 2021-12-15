@extends('master')

@section('title', 'Thêm mới bộ phận')
@section('main')

    
    <form action="{{route('bophan.store')}}" method="POST" role="form">
        @csrf 
        <div class="form-group">
            <label for="">Tên bộ phận</label>
            <input type="text" class="form-control" name="bo_phan" placeholder="Nhập tên bộ phận">
            @error('bo_phan')
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