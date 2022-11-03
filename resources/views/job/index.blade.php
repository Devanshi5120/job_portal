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
                <h6 class="m-0 font-weight-bold text-primary"> Job </h6>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('job.create') }}" class="btn btn-primary" >Add Job</a>
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
                        <th>Recruiter</th>
                        <th>Title</th>
                        <th>Descrption</th>  
                        <th>Type</th>
                        <th>Vacancy</th>
                        <th>Qualification</th>
                        <th>Designation</th>
                        <th>Skill </th>
                        <th>Experience </th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $job->jobcategory->name}}</td>
                        <td>{{ $job->recruiter->name }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->description }}</td>
                        <td>{{ $job->type }}</td>
                        <td>{{ $job->vacancy }}</td>
                        <td>{{ $job->qualification }}</td>
                        <td>{{ $job->designation }}</td>
                        <td>{{ $job->skill }}</td>
                        <td>{{ $job->experience}}</td>
                     <td><img height="100" width="100" src="{{asset('files/'.$job->image)}}" alt="" srcset=""></td>

                        
                        <td>
                            <a href="{{ route('job.edit', $job->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('job.show', $job->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id], 'style' => 'display:inline']) !!}
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