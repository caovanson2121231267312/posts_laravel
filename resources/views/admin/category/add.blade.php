@extends('admin.layouts.app')

@section('title')
<title>
    category
</title>
<meta name="description" content="" />
<meta name="keywords" content="">
<meta name="author" content="Codedthemes" />
@endsection

@section('body')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body row">
                          <form class="col-8" action="{{route('categories.add')}}" method="post">
                                @csrf
                              <div class="">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục:</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="VD : tin thể thao, ...">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục cha</label>
                                    <select name="parent_id" class="form-control select2 select2-hidden-accessible">
                                        <option value="0" selected>Danh mục cha</option>
                                        {!! $html !!}
                                      </select>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                          </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
@endsection