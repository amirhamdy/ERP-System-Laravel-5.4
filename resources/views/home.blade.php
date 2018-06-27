@extends('layouts.master')

@section('title', 'Home')

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

                You are logged in!

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

