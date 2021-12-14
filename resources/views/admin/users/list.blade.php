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
                    <!-- <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Tables
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Data Table</li>
                            </ol>
                        </nav>
                    </div> -->
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role</th>
                                        @permission(['All'])
                                        <th>Access</th>
                                        @endpermission
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($data as $i=>$row)
                                    <tr>
                                    	<td>{{ ++$i }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        
                                        <td>
                                            @if($row->roles()->get())
                                                <ul style="list-style: none;">
                                                  @foreach($row->roles()->get() as $roles)
                                                    <li>{{ $roles->name }}</li>
                                                  @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        @permission(['All'])
                                        <td>
                                        	{!! Form::open(['method' => 'PUT', 'url' => ['/back/users/approval_status/'.$row->id], 'style' => 'display:inline' ]) !!}

                                                @if($row->approval_status === 1)
                                                  {{ Form::submit('unapprove', ['class' => 'btn btn-danger']) }}
                                                @else
                                                  {{ Form::submit('approve', ['class' => 'btn btn-success']) }}
                                                @endif

                                            {!! Form::close() !!}
                                        </td>
                                        @endpermission
                                        <td>

                                            @if(Auth::user()->type === 1 && Auth::user()->id === $row->id)
                                            @permission(['All'])
                                            <a href="/back/users/edit/{{$row->id}}" class="btn btn-primary">Edit</a>
                                            @endpermission
                                            @else
                                            @permission(['user_permission'])
                                            <a href="/back/users/edit/{{$row->id}}" class="btn btn-primary">Edit</a>
                                            @endpermission
                                            @endif
                                           

                                        	{!! Form::open(['method' => 'DELETE', 'route' => ['user-delete', $row->id], 'style' => 'display:inline' ]) !!}

                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Phone Number</th>
                                        <th>Image</th>
                                        <th>Approve</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>
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