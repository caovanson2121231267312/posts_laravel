@extends('admin.layouts.app')

@section('body')
<!-- general form elements -->
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h2 class="card-title">Create New Role</h2>
                <div class="card-tools">
                <a class="btn btn-success" href="{{ route('roles.index') }}"><i class="fas fa-angle-double-left"></i> Back To Role List</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="card-body">          

            <div class="tab-pane" id="settings">
                <div class="form-horizontal">
                    <div class="form-group">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2 col-form-label">Name</label>
                        <div class="col-md-10">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="inputPermission" class="col-md-2 col-form-label">Permission</label>
                        <div class="col-md-10">
                            
                            <div class="row">                            
                                <?php 
                                    $abc ="";
                                    $len = count($permission);     
                                ?>
                                @foreach($permission as $key => $value)
                                
                                    <?php 
                                    
                                        if ($key === 0) {
                                            echo '<div class="col-lg-4">';
                                        }                                
                                        
                                        if ($abc != substr($value->name,0,strpos($value->name,"-")) && $key === 0){
                                            $abc = substr($value->name,0,strpos($value->name,"-"));
                                            
                                            echo '<label>'.$abc. '</label><div class="block">';

                                        }  else if($abc != substr($value->name,0,strpos($value->name,"-")) && $key !== 0){
                                            $abc = substr($value->name,0,strpos($value->name,"-"));
                                            echo '</div></div><div class="col-lg-4">';
                                            echo '<label>'.$abc. '</label><div class="block">';
                                        }  
                                            
                                    ?>
                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}
                                    <br />
                                    <?php
                                        if ($key === $len-1) {
                                            echo '</div></div>';
                                        }
                                    ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- /.tab-pane -->
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>        
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.card -->
</div>
@endsection 