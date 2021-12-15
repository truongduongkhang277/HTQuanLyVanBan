@extends('master')

@section('title', 'Danh sách độ mật')
@section('main')

    
    <form action="" class="form-inline" >
    
        <div class="form-group">
            <input class="form-control" name="key" placeholder="Tìm kiếm bằng độ mật">
        </div>       

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>

        <!-- Dựa vào chức năng toàn màn hình, sửa thành chức năng thêm -->
        <ul class="navbar-nav ml-auto">
            <a href="{{route('doMat.create')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i>
            </a>
        </ul>
    </form>
    
    <hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Độ mật</th>
                <th>Ngày tạo</th>
                <th class="text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $domat)
            <tr>
                <td>{{$domat->id}}</td>
                <td>{{$domat->do_mat}}</td>
                <td>{{$domat->created_at->format('d-m-Y')}}</td>
                <td class="text-right">
                    <form method="POST" action="{{route('doMat.destroy', $domat->id)}}">
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
    <div>
        {{$data->appends(request()->all())->links()}}
    </div>    

@stop();
