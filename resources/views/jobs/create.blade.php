@extends('layouts.master')

@section('title', 'Create Job')

@section('css')
    <link href="{{ asset('css/plugins/touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Job</div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('jobs') }}">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <legend class="section">Basic Info</legend>
                            <div class="form-group required{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                                <label for="customer_id" class="col-md-4 control-label">Customer</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="customer_id" name="customer_id"
                                            onchange="getProductlines(this.value)" required>
                                        <option></option>
                                        @foreach ($customers as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('customer_id'))
                                        <span class="help-block"><strong>{{ $errors->first('customer_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('productline_id') ? ' has-error' : '' }}">
                                <label for="productline_id" class="col-md-4 control-label">Productline</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="productline_id" name="productline_id"
                                            onchange="getProjects(this.value)" required>
                                        <option></option>
                                    </select>
                                    @if ($errors->has('productline_id'))
                                        <span class="help-block"><strong>{{ $errors->first('productline_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('project_id') ? ' has-error' : '' }}">
                                <label for="project_id" class="col-md-4 control-label">Project</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="project_id" name="project_id" required>
                                        <option></option>
                                    </select>
                                    @if ($errors->has('project_id'))
                                        <span class="help-block"><strong>{{ $errors->first('project_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Job Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <legend class="section"></legend>
                            <div class="form-group required{{ $errors->has('source_language_id') ? ' has-error' : '' }}">
                                <label for="source_language_id" class="col-md-4 control-label">Source Language</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="source_language_id" name="source_language_id"
                                            required>
                                        <option></option>
                                        @foreach ($languages as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('source_language_id'))
                                        <span class="help-block"><strong>{{ $errors->first('source_language_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('target_language_id') ? ' has-error' : '' }}">
                                <label for="target_language_id" class="col-md-4 control-label">Target Language</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="target_language_id" name="target_language_id"
                                            required>
                                        <option></option>
                                        @foreach ($languages as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('target_language_id'))
                                        <span class="help-block"><strong>{{ $errors->first('target_language_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <legend class="section"></legend>
                            <div class="form-group required{{ $errors->has('subject_matter_id') ? ' has-error' : '' }}">
                                <label for="subject_matter_id" class="col-md-4 control-label">Subject Matter</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="subject_matter_id" name="subject_matter_id"
                                            required>
                                        <option></option>
                                        @foreach ($subjectMatters as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('subject_matter_id'))
                                        <span class="help-block"><strong>{{ $errors->first('subject_matter_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('job_type_id') ? ' has-error' : '' }}">
                                <label for="job_type_id" class="col-md-4 control-label">Job Type</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="job_type_id" name="job_type_id" required>
                                        <option></option>
                                        @foreach ($jobTypes as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('job_type_id'))
                                        <span class="help-block"><strong>{{ $errors->first('job_type_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('unit_id') ? ' has-error' : '' }}">
                                <label for="unit_id" class="col-md-4 control-label">Job Unit</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="unit_id" name="unit_id" required>
                                        <option></option>
                                        @foreach ($units as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('unit_id'))
                                        <span class="help-block"><strong>{{ $errors->first('unit_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label for="amount" class="col-md-4 control-label">Job Amount</label>
                                <div class="col-md-6">
                                    <input class="touchspin2 form-control" type="text" id="amount" name="amount"
                                           value="{{ old('amount') }}" onchange="calculateJobPrice()" required
                                           style="display: block;">
                                    @if ($errors->has('amount'))
                                        <span class="help-block"><strong>{{ $errors->first('amount') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" id="result" style="display: none;">
                            <legend class="section">
                                <i class="fa fa-spinner fa-spin"></i> Calculating Job Cost
                            </legend>
                            <div class="ibox">
                                <div class="ibox-content" id="jobPrice2">
                                    <div class="spiner-example" id="spiners">
                                        <div class="sk-spinner sk-spinner-wandering-cubes">
                                            <div class="sk-cube1"></div>
                                            <div class="sk-cube2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="jobPrice2">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button id="calculate" class="btn btn-success"> Preview</button>
                                <button type="submit" class="btn btn-primary"> Save</button>
                                <a class="btn btn-link" href="{{ url('jobs') }}"> Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Select2 -->
    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>
    <!-- TouchSpin -->
    <script src="{{ asset('js/plugins/touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script>
        //document.getElementById("calculate").addEventListener("click", calculateJobPrice);

        $(document).ready(function () {
            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });

            $(".touchspin2").TouchSpin({
                min: 0,
                max: 1000000,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });
        });

    </script>

    @include('layouts.more_scripts')
@endsection
