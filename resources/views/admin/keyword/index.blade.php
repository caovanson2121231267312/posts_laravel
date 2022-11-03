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
                        <div class="card-body">
                          <div class="flex flex-between">
                            <div>
                              <a href="{{route('keywords.create')}}" class="btn btn-outline-primary" type="button" data-tippy-content="">
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
                              <button class="btn btn-outline-warning" type="button" id="truncate" data-url="" data-tippy-content="">
                                <i class="fas fa-ban"></i>
                              </button>
                            </div>
                            <div>
                              <form class="p-r" id="search" data-url="">
                                <input class="form-control-search" type="text" placeholder="search by name" name="name">
                                <button type="submit" class="btn btn-primary-1 btn-search-ad"  data-url="">
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
                                            <th>Name</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                            <tr>
                                                <th>
                                                    <input class="item-id" type="checkbox" id="check_book" name="foo" data-id="{{$value->id}}">
                                                </th>
                                                <th>{{ $value->name }}</th>
                                                <th>{{ $value->created_at }}</th>
                                                <th>
                                                    <div>
                                                        <a class="btn btn-success" href="{{route("keywords.show",$value->id)}}" data-tippy-content="{{ __('messages.detail') }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-warning" href="{{route("keywords.edit",$value->id)}}" data-tippy-content="{{ __('messages.edit') }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form id="delete" action="{{route("keywords.destroy",$value->id)}}"
                                                            class="d-inline mb-1" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
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