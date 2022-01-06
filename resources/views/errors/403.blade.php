@extends('layouts.admin')

@section('title')
    Không được cấp quyền truy cập trang
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Không sở hữu quyền truy cập</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Không sở hữu quyền truy cập</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i>Không thể truy cập trang</h3>

                    <p>
                        Bạn không được cấp quyền truy cập vào trang này.
                    </p>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <div class="col">
                            <a href="{{ url()->previous() }}" class="btn btn-danger">Quay lại</a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
