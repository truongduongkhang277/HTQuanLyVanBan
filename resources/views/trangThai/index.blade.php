@extends('master')

@section('title', 'Danh sách trạng thái')
@section('main')

    
    <form action="" class="form-inline" >
    
        <div class="form-group">
            <input class="form-control" name="key" placeholder="Tìm kiếm bằng tên trạng thái">
        </div>       

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>

        <!-- Dựa vào chức năng toàn màn hình, sửa thành chức năng thêm -->
        <ul class="navbar-nav ml-auto">
            <a href="{{route('trangThai.create')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i>
            </a>
        </ul>
    </form>
    
    <hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã trạng thái</th>
                <th>Tên trạng thái</th>
                <th>Ngày tạo</th>
                <th class="text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $trangthai)
            <tr>
                <td>{{$trangthai->id}}</td>
                <td>{{$trangthai->trang_thai}}</td>
                <td>{{$trangthai->created_at->format('d-m-Y')}}</td>
                <td class="text-right">
                    <form method="POST" action="{{route('trangThai.destroy', $trangthai->id)}}">
                        @csrf @method('DELETE')
                        <a class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
   

    <hr>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-6">
            {{$data->appends(request()->all())->links()}}
        </div>  
    </div>   

@stop();
