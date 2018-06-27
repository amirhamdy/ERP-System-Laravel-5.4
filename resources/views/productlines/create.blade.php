@extends('layouts.master')

@section('title', 'Create Productline')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Productline</div>

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('productlines') }}">
                        {{ csrf_field() }}

                        <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group required{{ $errors->has('customer_id') ? ' has-error' : '' }}">
                            <label for="customer_id" class="col-md-4 control-label">Customer</label>
                            <div class="col-md-6">
                                <select class="form-control m-b" id="customer_id" name="customer_id" required>
                                    <option value=""></option>
                                    @foreach ($customers as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('customer_id'))
                                    <span class="help-block"><strong>{{ $errors->first('customer_id') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group required{{ $errors->has('currency_id') ? ' has-error' : '' }}">
                            <label for="currency_id" class="col-md-4 control-label">Currency</label>
                            <div class="col-md-6">
                                <select class="form-control m-b" id="currency_id" name="currency_id" required
                                        onchange="getPricebooks(this.value);">
                                    <option value=""></option>
                                    @foreach ($currencies as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('currency_id'))
                                    <span class="help-block"><strong>{{ $errors->first('currency_id') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group required{{ $errors->has('pricebook_id') ? ' has-error' : '' }}">
                            <label for="pricebook_id" class="col-md-4 control-label">Pricebook</label>
                            <div class="col-md-6">
                                <select class="form-control m-b" id="pricebook_id" name="pricebook_id" required>
                                    <option value=""></option>
                                </select>
                                @if ($errors->has('pricebook_id'))
                                    <span class="help-block"><strong>{{ $errors->first('pricebook_id') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Save</button>
                                <a class="btn btn-link" href="{{ url('productlines') }}"> Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('layouts.more_scripts')
@endsection