<?php
$arr_01 = array(
    // type => "name",
    "text" => "customer",
    "text" => "productline",
    "text" => "currency",
    "text" => "name",
    "date" => "start_date",
    "date" => "end_date",
    "text" => "po_number",
);
$arr_02 = array();
?>
@extends('layouts.master')

@section('title', 'Temp')

@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach ($arr_01 as $type => $name)
                    @if($type == "list")
                    {{ $var ="
                        <div class=\"form-group{{ $errors->has('$name') ? ' has-error' : '' }}{{">
                        <label for=\"{{ $name }}{{" class=\"col-md-4 control-label">}}{{ $name }}</label>
                    <div class="col-md-6">
                        <select class="form-control m-b" id="{{ $name }}" name="{{ $name }}">
                            @foreach ($name.'s' as $key => $value )
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('$name'))
                            <span class="help-block"><strong>{{ $errors->first('$name') }}</strong></span>
                        @endif
                    </div>
            </div>
            }}
            {{ array_push($arr_02,$var) }}
            @endif
            @if($type == "text")
                <div class="form-group{{ $errors->has('$name') ? ' has-error' : '' }}">
                    <label for="{{ $name }}" class="col-md-4 control-label">{{ $name }}</label>
                    <div class="col-md-6">
                        <input id="{{ $name }}" name="{{ $name }}" type="text" class="form-control"
                               value="{{ old('$name') }}" required autofocus>
                        @if ($errors->has('$name'))
                            <span class="help-block"><strong>{{ $errors->first('$name') }}</strong></span>
                        @endif
                    </div>
                </div>
            @endif
            @if($type == "date")
                <div class="form-group{{ $errors->has('$name') ? ' has-error' : '' }}">
                    <label for="{{ $name }}" class="col-md-4 control-label">{{ $name }}</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input id="date_1" name="{{ $name }}" type="text" class="form-control"
                               value="{{ old('$name') }}" required>
                        @if ($errors->has('$name'))
                            <span class="help-block"><strong>{{ $errors->first('$name') }}</strong></span>
                        @endif
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
    </div>
@endsection

@section('scripts')
@endsection

