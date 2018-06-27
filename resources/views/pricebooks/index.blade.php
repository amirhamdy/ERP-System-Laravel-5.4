@extends('layouts.master_tables')

@section('title', 'Pricebooks')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="ibox-title">
                    <h5>Pricebooks Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Currency</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Updated By</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <a href="{{ route('pricebooks.create') }}" class="btn btn-success">New Pricebook</a>
                            <tbody>
                            @foreach ($pricebooks as $key => $pricebook)
                                <tr class="gradeX">
                                    <td class="text-center">{{ "pb_".$pricebook->id }}</td>
                                    <td class="text-center">{{ $pricebook->name }}</td>
                                    <td class="text-center">{{ $pricebook->currency->name }}</td>
                                    <td class="text-center">{{ $pricebook->userCreated }}</td>
                                    <td class="text-center">{{ $pricebook->userUpdated }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('pricebooks.show',$pricebook->id) }}">
                                            <i class="fa fa-external-link"></i> Show</a>
                                        <a class="btn btn-primary" href="{{ route('pricebooks.edit',$pricebook->id) }}"><i
                                                    class="fa fa-edit"></i>
                                            Edit</a>
                                        <form action="{{ url('pricebooks/'.$pricebook->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $pricebook->id }}"
                                                    class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Currency</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Updated By</th>
                                <th class="text-center"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

