@extends('layouts.master')

@section('title', 'View Job')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Job Info</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            {{ $job->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">E-mail</label>
                            {{ $job->email }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Role</label>
                            @if(!empty($job->roles))
                                @foreach($job->roles as $role)
                                    <label class="label label-success">{{ $role->display_name }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
