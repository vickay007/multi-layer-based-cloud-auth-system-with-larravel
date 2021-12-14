@extends('admin.layouts.master')
@section('content')
   <!-- begin app-main -->
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
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->

            <!--mail-Compose-contant-start-->
            <div class="row account-contant">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                
                                <div class="col-xl-12 col-md-6 col-12 border-t border-right">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">{{ $page_name }}</h5>
                                        </div>
                                        @if(count($errors) > 0)
                                            <div class="alert alert-danger">
                                              <ul>
                                                @foreach($errors->all() as $error)
                                                <ul>
                                                    <li>{{ $error }}</li>
                                                </ul>
                                                @endforeach
                                              </ul>
                                            </div>
                                        @endif

                                        @if($message = Session::get('success'))
                                            <div class="alert alert-success">
                                              {{ $message }}
                                            </div>
                                        @endif

                                        <div class="p-4">
                                            {!! Form::model($role, ['route' => ['role-update', $role->id], 'method' => 'put']) !!}
                                              <div class="form-group">
                                                  {{ Form::label('name', 'Name', ['class' => 'control-label mb-1']) }}
                                              
                                                  {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}           
                                              </div>

                                              <div class="form-group">
                                                  {{ Form::label('display_name', 'Display Name', ['class' => 'control-label mb-1']) }}
                                              
                                                  {{ Form::text('display_name', null, ['class' => 'form-control', 'id' => 'display_name']) }}           
                                              </div>

                                              <div class="form-group">
                                                  {{ Form::label('description', 'Description', ['class' => 'control-label mb-1']) }}
                                              
                                                  {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}           
                                              </div>

                                              <div class="form-group">
                                                  {{ Form::label('permission', 'Permission', ['class' => 'control-label mb-1']) }}
                                              
                                                  {{ Form::select('permission[]', $permission, $selectedPermission, ['class' => 'form-control myselect', 'data-placeholder' => 'Select Permission(s)', 'multiple']) }}            
                                              </div>
                                              <div>
                                                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                      <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                      <span id="payment-button-amount">Submit</span>
                                                      <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                  </button>
                                              </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--mail-Compose-contant-end-->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
@endsection