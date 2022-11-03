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
                          <form class="col-8 form-validation" method="POST" id="form-validation" action="{{route('news.update', $data->id)}}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu đề:</label>
                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="VD : tin thể thao, ..." value="{{$data->title}}">
                                        <small class="text-danger"> {{ $errors->first('name') ?? '' }} </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ảnh:</label>
                                        <input type="file" class="form-control" name="image" id="exampleInputEmail1" placeholder="VD : tin thể thao, ...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Danh mục bài viết</label>
                                        <select name="category[]" class="form-control select2 select2-danger" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @foreach($data->categories as $value)
                                                        @if($category->id == $value->id)
                                                            {{'selected="selected"'}}
                                                        @endif
                                                    @endforeach
                                                >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Từ khóa tìm kiếm:</label>
                                        <select name="keyword[]" class="select2-danger form-control select2" multiple>
                                            @foreach($keywords as $keyword)
                                                <option value="{{ $keyword->id }}"
                                                    @foreach($data->keywords as $value)
                                                        @if($keyword->id == $value->id)
                                                            {{'selected="selected"'}}
                                                        @endif
                                                    @endforeach
                                                >{{ $keyword->name }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả:</label>
                                        <textarea id="" class="form-control" name="description" style="height: 100px">{{ $data->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nội dung:</label>
                                        <textarea id="compose-textarea" name="content" class="form-control">{{ $data->content }}</textarea>
                                    </div>
                                      
                                    <button type="submit" class="btn btn-primary">Sửa</button>
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
        <style>
            .CodeMirror {
                border: 1px solid #eee;
                height: 100%!important;
                width: 100%!important;
                overflow: visible;
            }
        </style>
        <!-- /.container-fluid -->
    </section>
</div>

@endsection