@extends('layouts.admin')

@section('title')
    Thông tin cá nhân
@endsection

@section('css')

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (!empty(auth()->user()->file_path))
                                        <img src="{{ auth()->user()->file_path }}"
                                            class="profile-user-img img-fluid img-circle" alt="User Image">
                                    @else
                                        <img src="{{ asset('adminlte/dist/img/noimage.png') }}"
                                            class="profile-user-img img-fluid img-circle" alt="User Image">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                                <a href="#" class="btn btn-primary btn-block"><b>Đổi ảnh đại diện</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline"
                                            data-toggle="tab">Timeline</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="form-group">
                                            <label for="my-input">Số văn bản đi</label>
                                            <input class="form-control" type="text" name="so_vb_di">
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Số văn bản đi</label>
                                            <input class="form-control" type="text" name="so_vb_di">
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Số văn bản đi</label>
                                            <input class="form-control" type="text" name="so_vb_di">
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <div class="form-group">
                                            <label for="my-input">Số văn bản đi</label>
                                            <input class="form-control" type="text" name="so_vb_di">
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Số văn bản đi</label>
                                            <input class="form-control" type="text" name="so_vb_di">
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Số văn bản đi</label>
                                            <input class="form-control" type="text" name="so_vb_di">
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('js')

@endsection
