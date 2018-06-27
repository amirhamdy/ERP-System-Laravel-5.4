@extends('layouts.master')

@section('title', 'Create Customer')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Customer</div>
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('customers') }}">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <legend class="section">Basic & Contact Info</legend>
                            <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" class="form-control"
                                           value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="email" name="email" type="text" class="form-control"
                                           value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                                <label for="fax" class="col-md-4 control-label">Fax</label>
                                <div class="col-md-6">
                                    <input id="fax" name="fax" type="text" class="form-control"
                                           value="{{ old('fax') }}">
                                    @if ($errors->has('fax'))
                                        <span class="help-block"><strong>{{ $errors->first('fax') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                <label for="website" class="col-md-4 control-label">Website</label>
                                <div class="col-md-6">
                                    <input id="website" name="website" type="text" class="form-control"
                                           value="{{ old('website') }}">
                                    @if ($errors->has('website'))
                                        <span class="help-block"><strong>{{ $errors->first('website') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <legend class="section"></legend>
                            <div class="form-group required{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Status</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="status" name="status" required>
                                        <option value="Lead">Lead</option>
                                        <option value="Prospect">Prospect</option>
                                        <option value="Customer">Customer</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('industry_id') ? ' has-error' : '' }}">
                                <label for="industry_id" class="col-md-4 control-label">Industry</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="industry_id" name="industry_id" required>
                                        @foreach ($industries as $key => $industry_id)
                                            <option value="{{$key}}">{{$industry_id}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('industry_id'))
                                        <span class="help-block"><strong>{{ $errors->first('industry_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('rating') ? ' has-error' : '' }}">
                                <label for="rating" class="col-md-4 control-label">Rating</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="rating" name="rating" required>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Poor">Poor</option>
                                        <option value="Not Interested">Not Interested</option>
                                    </select>
                                    @if ($errors->has('rating'))
                                        <span class="help-block"><strong>{{ $errors->first('rating') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            {{--
                                                    <legend class="section">Assign Pricebook to this Customer</legend>
                                                        <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }}">
                                                            <label for="currency_id" class="col-md-4 control-label">Currency</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control m-b" id="currency_id" name="currency_id"
                                                                        onchange="getPricebooks(this.value);">
                                                                    @foreach ($currencies as $key => $currency_id)
                                                                        <option value="{{$key}}">{{$currency_id}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('currency_id'))
                                                                    <span class="help-block"><strong>{{ $errors->first('currency_id') }}</strong></span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('pricebook_id') ? ' has-error' : '' }}">
                                                            <label for="pricebook_id" class="col-md-4 control-label">Pricebook</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control m-b" id="pricebook_id" name="pricebook_id">
                                                                    <option></option>
                                                                </select>
                                                                @if ($errors->has('pricebook_id'))
                                                                    <span class="help-block"><strong>{{ $errors->first('pricebook_id') }}</strong></span>
                                                                @endif
                                                            </div>
                                                        </div>
                            --}}
                        </div>
                        <div class="col-md-6">
                            <legend class="section">Address Info</legend>
                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="col-md-4 control-label">Address Line 1</label>
                                <div class="col-md-6">
                                    <input id="address1" name="address1" type="text" class="form-control"
                                           value="{{ old('address1') }}">
                                    @if ($errors->has('address1'))
                                        <span class="help-block"><strong>{{ $errors->first('address1') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label for="address2" class="col-md-4 control-label">Address Line 2</label>
                                <div class="col-md-6">
                                    <input id="address2" name="address2" type="text" class="form-control"
                                           value="{{ old('address2') }}">
                                    @if ($errors->has('address2'))
                                        <span class="help-block"><strong>{{ $errors->first('address2') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                                <label for="postal_code" class="col-md-4 control-label">Postal Code</label>
                                <div class="col-md-6">
                                    <input id="postal_code" name="postal_code" type="text" class="form-control"
                                           value="{{ old('postal_code') }}">
                                    @if ($errors->has('postal_code'))
                                        <span class="help-block"><strong>{{ $errors->first('postal_code') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-4 control-label">City</label>
                                <div class="col-md-6">
                                    <input id="city" name="city" type="text" class="form-control"
                                           value="{{ old('city') }}">
                                    @if ($errors->has('city'))
                                        <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('billing_address') ? ' has-error' : '' }}">
                                <label for="billing_address" class="col-md-4 control-label">Billing Address</label>
                                <div class="col-md-6">
                                    <input id="billing_address" name="billing_address" type="text"
                                           class="form-control" value="{{ old('billing_address') }}">
                                    @if ($errors->has('billing_address'))
                                        <span class="help-block"><strong>{{ $errors->first('billing_address') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('country_id') ? ' has-error' : '' }}">
                                <label for="country_id" class="col-md-4 control-label">Country</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="country_id" name="country_id" required>
                                        <option value=""></option>
                                        @foreach ($countries as $key => $country_id)
                                            <option value="{{$key}}">{{$country_id}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span class="help-block"><strong>{{ $errors->first('country_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('region_id') ? ' has-error' : '' }}">
                                <label for="region_id" class="col-md-4 control-label">Region</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="region_id" name="region_id" required>
                                        @foreach ($regions as $key => $region_id)
                                            <option value="{{$key}}">{{$region_id}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('region_id'))
                                        <span class="help-block"><strong>{{ $errors->first('region_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Save</button>
                                <a class="btn btn-link" href="{{ url('customers') }}"> Cancel</a>
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