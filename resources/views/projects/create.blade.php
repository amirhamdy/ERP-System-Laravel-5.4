@extends('layouts.master')

@section('title', 'Create Project')

@section('css')
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Project</div>

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('projects') }}">
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
                                    <select class="form-control m-b" id="productline_id" name="productline_id" required>
                                    </select>
                                    @if ($errors->has('productline_id'))
                                        <span class="help-block"><strong>{{ $errors->first('productline_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Project Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <legend class="section">Other Info</legend>
                            <div id="data_1"
                                 class="form-group required{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-4 control-label">Start Date</label>
                                <div class="col-md-6 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" id="start_date" name="start_date" required>
                                    @if ($errors->has('start_date'))
                                        <span class="help-block"><strong>{{ $errors->first('start_date') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div id="data_1"
                                 class="form-group required{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">Delivery Date</label>
                                <div class="col-md-6 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" id="end_date" name="end_date" required>
                                    @if ($errors->has('end_date'))
                                        <span class="help-block"><strong>{{ $errors->first('end_date') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <legend class="section"></legend>
                            {{--
                                                        <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }}">
                                                            <label for="currency_id" class="col-md-4 control-label">Currency *</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control m-b" id="currency_id" name="currency_id" required>
                                                                    @foreach ($currencies as $key => $value)
                                                                        <option value="{{$key}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('currency_id'))
                                                                    <span class="help-block"><strong>{{ $errors->first('currency_id') }}</strong></span>
                                                                @endif
                                                            </div>
                                                        </div>
                            --}}
                            <div class="form-group{{ $errors->has('po_number') ? ' has-error' : '' }}">
                                <label for="po_number" class="col-md-4 control-label">P.O Number</label>
                                <div class="col-md-6">
                                    <input id="po_number" type="text" class="form-control" name="po_number"
                                           value="{{ old('po_number') }}">
                                    @if ($errors->has('po_number'))
                                        <span class="help-block"><strong>{{ $errors->first('po_number') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Save</button>
                                <a class="btn btn-link" href="{{ url('projects') }}"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Data picker -->
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy/mm/dd'
            });
        });
    </script>

    @include('layouts.more_scripts')
@endsection