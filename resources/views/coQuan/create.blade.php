@extends('master.main')

@section('title', 'Thêm cơ quan mới')
@section('main')

    
    <form action="{{route('coQuan.store')}}" method="POST" role="form">
        @csrf
        <div class="form-group">
            <label for="">Tên cơ quan</label>
            <input type="text" class="form-control" name="ten_co_quan" placeholder="Nhập tên cơ quan">
            @error('ten_co_quan')
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Địa chỉ cơ quan</label>
            <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ cơ quan">
            @error('dia_chi')
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