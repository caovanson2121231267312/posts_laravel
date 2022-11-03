@extends('admin.layouts.app')

@section('title')
<title>
    Users
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
                        <div class="card-body">
                          <div class="flex flex-between">
                            <div>
                              <a href="{{route('categories.create')}}" class="btn btn-outline-primary" type="button" data-tippy-content="">
                                <i class="fas fa-plus"></i>
                              </a>
                              <button class="btn btn-outline-success-1" type="button" id="reload_table" data-tippy-content="">
                                <i class="fas fa-undo"></i>
                              </button>
                              <button class="btn btn-outline-danger" type="button" id="delete_select" data-url="" data-tippy-content="">
                                <i class="fas fa-trash-alt"></i>
                              </button>
                              <button class="btn btn-outline-success" type="button" id="excel" data-url="" data-tippy-content="">
                                <i class="fas fa-table"></i>
                              </button>
                              <button class="btn btn-outline-warning" type="button" id="truncate" data-url="{{route('categories.truncate')}}" data-tippy-content="">
                                <i class="fas fa-ban"></i>
                              </button>
                            </div>
                            <div>
                              <form class="p-r" id="search" data-url="{{route('categories')}}">
                                <input class="form-control-search" type="text" placeholder="search by name" name="name">
                                <button type="submit" class="btn btn-primary-1 btn-search-ad"  data-url="{{route('categories')}}">
                                  <i class="fas fa-search"></i>
                                </button>
                              </form>
                            </div>
                          </div>
                            <div class="table-responsive">
                                <table class="mt-3 mb-3 table table-hover table-border">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input class="input-danger toggle_check" type="checkbox" id="check_book">
                                            </th>
                                            <th>Ảnh đại diện</th>
                                            <th>Họ Và Tên</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                            <tr>
                                                <th>
                                                    <input class="item-id" type="checkbox" id="check_book" name="foo" data-id="{{$value->id}}">
                                                </th>
                                                <th>
                                                    @if($value->avatar)
                                                        <img style="width: 100px; height: 100px;" class="img-fluid img-thumbnail lazyload" src="" alt="{{ $value->name }}"   data-src="{{asset('assets/images/users/'.$value->avatar)}}" >
                                                    @else
                                                        <img style="width: 100px; height: 100px;" class="img-fluid img-thumbnail lazyload" src="" alt="{{ $value->name }}"   data-src="{{asset('assets/images/users/avatar.png')}}" >
                                                    @endif
                                                </th>
                                                <th>{{ $value->name }}</th>
                                                <th>{{ $value->email }}</th>
                                                <th>
                                                    <div class="role">
                                                        @foreach($value->roles as $role)
                                                            <span class="badge badge-info right" data-id="{{$value->id}}">
                                                                {{ $role->name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </th>
                                                <th>
                                                    <div>
                                                        <a class="btn btn-success" href="{{route("users.show", $value->id )}}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-warning" href="{{route("users.edit", $value->id )}}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger" href="{{route("users.destroy", $value->id )}}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagelist">{!! $data->links() !!}</div>
                            </div>

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



@if(session('mess'))
    <script type="text/javascript">
        console.log("{{session('mess')}}")
        // alertDone("{{session('title')}}","{{session('mess')}}");
    </script>
@endif

<script>
  
</script>
@endsection