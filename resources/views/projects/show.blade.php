@extends('layouts.master')

@section('title', 'View Project')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Project Info</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">E-mail</label>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Role</label>
                            @if(!empty($user->roles))
                                @foreach($user->roles as $role)
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
