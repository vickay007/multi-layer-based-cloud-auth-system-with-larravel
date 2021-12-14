@extends('admin.layouts.master')

@section('content')
 
 <div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>{{ $page_name }}</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <a href="/back/project/create" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">
                              {{ $message }}
                            </div>
                        @endif
                        <div class="datatable-wrapper table-responsive">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<th>#</th>
                                        <th>Project Name</th>
                                        <th>Supervisors Name</th>
                                        <th>Year</th>
                                        <th>Department</th>
                                        <th>Document</th>
                                        <th>Created By</th>
                                        <th>Access</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($data as $i=>$row)
                                    <tr>
                                    	<td>{{ ++$i }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->s_name }}</td>
                                        <td>{{ $row->year }}</td>
                                        <td>{{ $row->department }}</td>
                                        <td>{{ $row->document }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        
                                        <td>
                                            @if(Auth::user()->type === 1 )
                                            @permission(['All'])

                                        	{!! Form::open(['method' => 'PUT', 'url' => ['/back/project/approval_status/'.$row->id], 'style' => 'display:inline' ]) !!}

                                                @if($row->approval_status === 1)
                                                  {{ Form::submit('unapprove', ['class' => 'btn btn-danger']) }}
                                                @else
                                                  {{ Form::submit('approve', ['class' => 'btn btn-success']) }}
                                                @endif

                                            {!! Form::close() !!}

                                            @endpermission

                                            @else
                                            @permission(['user_permission'])
                                            {!! Form::open(['method' => 'PUT', 'url' => ['/back/project/approval_status/'.$row->id], 'style' => 'display:inline' ]) !!}

                                                @if($row->approval_status === 1)
                                                  {{ Form::submit('Approved', ['class' => 'btn btn-success', 'disabled']) }}
                                                @else
                                                  {{ Form::submit('Pending', ['class' => 'btn btn-danger', 'disabled']) }}
                                                @endif

                                            {!! Form::close() !!}
                                            @endpermission
                                            @endif
                                        </td>
                                        <td>

                                            @if(Auth::user()->type === 1 && Auth::user()->id === $row->user_id)
                                            @permission(['All'])
                                            <a href="/back/project/edit/{{$row->id}}" class="btn btn-primary">Edit</a>
                                            @endpermission
                                            @else
                                            @permission(['user_permission'])
                                            <a href="/back/project/edit/{{$row->id}}" class="btn btn-primary">Edit</a>
                                            @endpermission
                                            @endif
                                            

                                        	{!! Form::open(['method' => 'DELETE', 'route' => ['project-delete', $row->id], 'style' => 'display:inline' ]) !!}

                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

@endsection