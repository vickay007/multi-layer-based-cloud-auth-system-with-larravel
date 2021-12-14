@extends('admin.layouts.master')
@section('content')
   <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-6 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>Encrypted Profile</h1>
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
                                
                                <div class="col-xl-12 col-md-12 col-12 border-t border-right">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">Input Encryption key to view your Profile</h5>
                                        </div>
                                        <!-- @if(count($errors) > 0)
                                            <div class="alert alert-danger">
                                              <ul>
                                                @foreach($errors->all() as $error)
                                                <ul>
                                                    <li>{{ $error }}</li>
                                                </ul>
                                                @endforeach
                                              </ul>
                                            </div>
                                        @endif -->

                                        @if($message = Session::get('success'))
                                            <div class="alert alert-success">
                                              {{ $message }}
                                            </div>
                                        @endif

                                        @if($message = Session::get('error'))
                                            <div class="alert alert-danger">
                                              {{ $message }}
                                            </div>
                                        @endif

                                        <div class="p-4">
                                            {!! Form::model($user, ['route' => ['user-decrypt', $user->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                                               <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('key', 'Enter Key') }}

                                                        {{ Form::text('d_key', null, ['class' => 'form-control', 'id' => 'key', 'placeholder' => '']) }}
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('name', 'Full Name') }}

                                                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name1', 'placeholder' => '']) }}
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('phone', 'Phone Number') }}

                                                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                                    </div>
                                                    

                                                    <div class="form-group col-md-12">
                                                      <!-- {{ Form::label('roles', 'Roles', ['class' => 'control-label mb-1']) }} -->
                                                  
                                                      {{ Form::select('roles[]', $roles, null, ['class' => 'form-control myselect']) }}           
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Decrypt</button>
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