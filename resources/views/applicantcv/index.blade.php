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
                <h6 class="m-0 font-weight-bold text-primary"> CV</h6>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('applicantcv.create') }}" class="btn btn-primary" >Add CV</a>
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
                        <th>Job Seeker</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applicantcv as $applicantcv)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $applicantcv->jobcategory->name}}</td>
                        <td>{{ $applicantcv->recruiter->name }}</td>
                        <td>{{ $applicantcv->jobseeker->name}}</td>
                   
                        
                        {{-- <td> "{{asset('files/'.$applicantcv->file)}}" </td> --}}
                        
                        <td>
                            {{-- <a href="{{ route('applicantcv.edit', $applicantcv->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a> --}}
                            <a href="{{ route('applicantcv.show', $applicantcv->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['applicantcv.destroy', $applicantcv->id], 'style' => 'display:inline']) !!}
                            
                            {{-- Download Cv link --}}
                            <a href= "{{asset('files/'.$applicantcv->file)}}" class="btn btn-primary" id="btnExport" value="Export" download= ><i class="fa-solid fa-download"></i> </a>
                            <i class="fa-regular fa-folder-arrow-down"></i>
                          
                            {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit','class' => 'btn btn-danger','onclick'=>'Cv confirm("Confirm delete?")')) !!}

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

{{-- Download pdf Script  --}}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#tblCustomers')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download(".pdf");
                }
            });
        });
    </script>
    
@endsection