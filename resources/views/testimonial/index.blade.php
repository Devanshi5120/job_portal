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
                <h6 class="m-0 font-weight-bold text-primary">Testimonial</h6>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('testimonial.create') }}" class="btn btn-primary" >Add Testimonial</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Specialist</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonial as $testimonial)
                    <tr>
                        <td>{{ ++$i }}</td>
                
                        <td>
                            <img height="100" width="100" src="{{asset('files/'.$testimonial->image)}}" alt="" srcset="">
                        </td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->specialist }}</td>
                        <td>{{ $testimonial->description }}</td>
                        <td>
                            <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('testimonial.show', $testimonial->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                           
                            {!! Form::open(['method' => 'DELETE', 'route' => ['testimonial.destroy', $testimonial->id], 'style' => 'display:inline']) !!}
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