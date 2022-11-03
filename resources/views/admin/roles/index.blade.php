@extends('admin.layouts.app')

@section('title')
    <title>List Roles</title>
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

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h2 class="card-title">Roles Management</h2>
            <div class="card-tools">
                <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fas fa-plus-square"></i> New Role</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">  
            <table class="table table-striped table-bordered">
                <tr class="bg-blue text-center">
                    <th width="50px">No</th>
                    <th>Name</th>
                    <th width="250px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td class="text-center">{{ ++$key }}</td>
                    <td class="text-center">{{ $role->name }}</td>
                    <td class="text-center">
                        
                        @hasanyrole('Super-Admin')
                            <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                        @else
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-ban"></i> Edit
                            </button>
                        @endhasanyrole

                        @hasanyrole('Super-Admin')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger delete_confirm']) !!}
                            {!! Form::close() !!}
                        @else
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-ban"></i> Delete
                            </button>
                        @endhasanyrole
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $roles->render() !!}
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="float-left">
                <div class="dataTables_info">
                    Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} entries
                </div>
            </div>
            <div class="float-right">
                {{ $roles->links() }}
            </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
</div>

<script type="text/javascript">
$(function () {
    $('.delete_confirm').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal.fire({
            title: 'Are you sure you want to delete this record?',
            text: "If you delete this, it will be gone forever.",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showDenyButton: true,
            denyButtonText: 'Cancel',
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit();
             } else if (result.isDenied) {
                Swal.fire('Your record is safe', '', 'info')
            }
            
        });
    });
});
</script>

@endsection 