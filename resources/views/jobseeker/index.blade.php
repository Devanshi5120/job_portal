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
                <h6 class="m-0 font-weight-bold text-primary"> Job Seeker</h6>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('jobseeker.create') }}" class="btn btn-primary" >Add Seeker</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Job Category</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Contact</th>  
                        <th>Email</th>
                        <th>Education</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobseekers as $jobseeker)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $jobseeker->jobcategory->name}}</td>
                        <td>{{ $jobseeker->name }}</td>
                        <td>{{ $jobseeker->gender }}</td>
                        <td>{{ $jobseeker->contact }}</td>
                        <td>{{ $jobseeker->email }}</td>
                        <td>{{ $jobseeker->education }}</td>
                        <td>{{ $jobseeker->status }}</td>
                        <td><img height="100" width="100" src="{{asset('files/'.$jobseeker->image)}}" alt="" srcset=""></td>
                        
                        <td>
                            <a href="{{ route('jobseeker.edit', $jobseeker->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('jobseeker.show', $jobseeker->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['jobseeker.destroy', $jobseeker->id], 'style' => 'display:inline']) !!}
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