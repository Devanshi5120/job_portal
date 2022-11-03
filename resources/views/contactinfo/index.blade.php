@extends('layouts.app')
@section('styles')
    <style>
        .btn-danger{
            background: red
        }
    </style>
@endsection
@section('content')

@if( Session::has( 'success' ))
<div class="alert alert-success" role="alert">
        {{ Session::get( 'success' ) }}
  </div>
     
@elseif( Session::has( 'failed' ))
<div class="alert alert-danger" role="alert">
    {{ Session::get( 'failed' ) }} <!-- here to 'withWarning()' -->
  </div>
@endif

  

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">ContactInfo</h6>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('contactinfo.create') }}" class="btn btn-primary" >Add ContactInfo</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th> Address</th>
                        <th>Email</th>
                        <th>Mobile No</th>
            
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactinfo as $contactinfo)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $contactinfo->address }}</td>
                        <td>{{ $contactinfo->email }}</td>
                        <td>{{ $contactinfo->mobileno }}</td>
            

                        
                        <td>
                            <a href="{{ route('contactinfo.edit', $contactinfo->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('contactinfo.show', $contactinfo->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['contactinfo.destroy', $contactinfo->id], 'style' => 'display:inline']) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit','class' => 'btn btn-danger','onclick'=>'return confirm("Confirm delete?")')) !!}

                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection