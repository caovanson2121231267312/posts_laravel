@extends('admin.layouts.app')

@section('title')
<title>
    Bài Viết
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
                          <form class="col-8 form-validation" id="form-validation" action="{{route('news.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                              <div class="">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề:</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="VD : tin thể thao, ...">
                                    <small class="text-danger"> {{ $errors->first('title') ?? '' }} </small>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh:</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputEmail1">
                                    <small class="text-danger"> {{ $errors->first('image') ?? '' }} </small>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục bài viết</label>
                                    <select name="category[]" class="form-control select2 select2-danger" multiple>
                                        @foreach($categories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-danger"> {{ $errors->first('category') ?? '' }} </small>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa tìm kiếm:</label>
                                    <select name="keyword[]" class="select2-danger form-control select2" multiple>
                                        @foreach($keywords as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả:</label>
                                    <textarea id="" class="form-control" name="description" style="height: 100px"></textarea>
                                    <small class="text-danger"> {{ $errors->first('description') ?? '' }} </small>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung:</label>
                                    <textarea id="compose-textarea" name="content" class="form-control"></textarea>
                                    <small class="text-danger"> {{ $errors->first('content') ?? '' }} </small>
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