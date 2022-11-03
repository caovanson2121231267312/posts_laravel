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
                        <li class="breadcrumb-item"><a href="#">Edit user</a></li>
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
                          <form class="col-8" action="{{route('users.update', $data->id )}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                              <div class="">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và Tên:</label>
                                    <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="VD : tin thể thao, ...">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh đại diện:</label>
                                    <input type="file" class="form-control" name="avatar">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">email:</label>
                                    <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="VD : abc@gmail.com">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại:</label>
                                    <input type="text" class="form-control" name="phone" value="{{$data->phone}}" placeholder="VD : 0338910038">
                                  </div>
                                  @hasrole('Super-Admin')
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Quyền truy cập</label>
                                        <select name="roles[]" class="form-control select2 select2-hidden-accessible" multiple>
                                            @foreach($roles as $role)
                                                <option 
                                                @foreach($data->roles as $value)
                                                    @if($role->id == $value->id)
                                                       {{ "selected" }}
                                                    @endif
                                                @endforeach
                                                value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    @else
                                  @endhasrole
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả:</label>
                                    <textarea class="form-control" name="description" value="{{$data->description}}">{{$data->description}}</textarea>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary">Xác nhận</button>
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