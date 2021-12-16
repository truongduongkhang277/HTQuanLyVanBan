@extends('master')

@section('title', 'Danh sách tài khoản')
@section('main')

    <div>   
        <form action="" class="form-inline" >
        
            <div class="form-group">
                <input class="form-control" name="key" placeholder="Tìm kiếm bằng họ tên tài khoản">
            </div>       

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>

            <!-- Dựa vào chức năng toàn màn hình, sửa thành chức năng thêm -->
            <ul class="navbar-nav ml-auto">
                <a href="{{route('chucDanh.create')}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i>
                </a>
            </ul>
        </form>        
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tên đăng nhập</th>
                    <th>Họ và tên</th>
                    <th>Ngày tạo</th>
                    <th class="text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $nguoidung)
                <tr>
                    <td>{{$nguoidung->ten_dang_nhap}}</td>
                    <td>{{$nguoidung->ho_ten}}</td>
                    <td>{{$nguoidung->created_at->format('d-m-Y')}}</td>
                    <td class="text-right">
                        <form method="POST" action="{{route('nguoiDung.destroy', $nguoidung->id)}}">
                            @csrf @method('DELETE')
                            <a class="btn btn-sm btn-success">
                                <i class="fas fa-user"></i>
                            </a>
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
            <div class="col-4"></div>
            <div class="col-6">
                {{$data->appends(request()->all())->links()}}
            </div>  
        </div>  
    </div> 
@stop();
