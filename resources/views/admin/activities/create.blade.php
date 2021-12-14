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
                                <div class="col-xl-12 col-md-12 col-12 border-t border-right">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">Please create your project</h5>
                                        </div>
                                        @if(count($errors) > 0)
                                            <div class="alert alert-danger">
                                              <ul>
                                                @foreach($errors->all() as $error)
                                                <ul>
                                                    <li style="list-style: none; color: white;">
                                                      {{ $error }}
                                                    </li>
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
                                            {!! Form::open(['url' => '/back/project/store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('name', 'Name of project') }}

                                                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name1', 'placeholder' => '']) }}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('s_name', 'Supervisors Name') }}

                                                        {{ Form::text('s_name', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('year', 'Year') }}

                                                        {{ Form::date('year', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('department', 'Department') }}

                                                        {{ Form::text('department', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('university', 'University/School') }}

                                                        {{ Form::text('school', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('doc', 'Upload File(doc,pdf)') }}

                                                        {{ Form::file('document', ['class' => 'form-control']) }}

                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('body', 'Body(E.g Abstract, Background of the research, Statement of the research, Objective of the study)') }}

                                                        {{ Form::textarea('body', null, ['class' => 'form-control ckeditor']) }}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('pages', 'No. of pages') }}

                                                        {{ Form::number('pages', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('chapters', 'chapters') }}

                                                        {{ Form::text('chapters', null, ['class' => 'form-control', 'placeholder' => '1 - 5']) }}
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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