@extends('master')

@section('title', 'Danh sách văn bản đến')
@section('main')

    
    <form action="" class="form-inline" >
    
        <div class="form-group">
            <input class="form-control" name="key" placeholder="Tìm kiếm bằng tên văn bản đến">
        </div>       

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>

        <!-- Dựa vào chức năng toàn màn hình, sửa thành chức năng thêm -->
        <ul class="navbar-nav ml-auto">
            <a href="{{route('vanBanDen.create')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i>
            </a>
        </ul>
    </form>
    
    <hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ngày nhận</th>
                <th>Số VB đến</th>
                <th>ĐVBH</th>
                <th>Ký hiệu</th>
                <th>Ngày VB</th>
                <th>Trích yếu</th>
                <th>Người kí</th>
                <th class="text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $vanbanden)
            <tr>
                <td>{{$vanbanden->ngay_nhan}}</td>
                <td>{{$vanbanden->so_vb_den}}</td>
                <td>{{$vanbanden->don_vi_ban_hanh}}</td>
                <td>{{$vanbanden->ki_hieu}}</td>
                <td>{{$vanbanden->ngay_vb}}</td>
                <td>{{$vanbanden->trich_yeu}}</td>
                <td>{{$vanbanden->nguoi_ky}}</td>
                <td class="text-right">
                    <form method="POST" action="{{route('vanBanDen.destroy', $vanbanden->id)}}">
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
        <div class="col-4"></div>
        <div class="col-6">
            {{$data->appends(request()->all())->links()}}
        </div>  
    </div>   

@stop();
