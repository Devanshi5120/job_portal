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
                <h6 class="m-0 font-weight-bold text-primary">Applies</h6>
            </div>
            {{-- <div class="col-md-6 text-right">
                <a href="{{ route('contactinfo.create') }}" class="btn btn-primary" >Add ContactInfo</a>
            </div> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Email</th>
            
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apply as $apply)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $apply->fname }}</td>
                        <td>{{ $apply->lname }}</td>
                        <td>{{ $apply->gender }}</td>
                        <td>{{ $apply->contact }}</td>
                        <td>{{ $apply->email }}</td>
            

                        
                        <td>
                            {{-- <a href="{{ route('apply.edit', $apply->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a> --}}
                            <a href="{{ route('apply.show', $apply->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['apply.destroy', $apply->id], 'style' => 'display:inline']) !!}

                            <a href= "{{asset('files/'.$apply->file)}}" class="btn btn-primary" id="btnExport" value="Export" download= ><i class="fa-solid fa-download"></i> </a>

                            <i class="fa-regular fa-folder-arrow-down"></i>

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