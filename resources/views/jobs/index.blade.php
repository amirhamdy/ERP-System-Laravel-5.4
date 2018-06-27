@extends('layouts.master_tables')

@section('title', 'Jobs')

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
                    <h5>Jobs Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Industry</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Region</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Updated By</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <a href="{{ route('jobs.create') }}" class="btn btn-success">New Job</a>
                            <tbody>
                            @foreach ($jobs as $key => $job)
                                <tr class="gradeX">
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('jobs.show',$job->id) }}">
                                            <i class="fa fa-external-link"></i> {{ "cus_".$job->id }}</a>
                                    </td>
                                    <td class="text-center">{{ $job->name }}</td>
                                    <td class="text-center">{{ $job->email }}</td>
                                    <td class="text-center">{{ $job->status }}</td>
                                    <td class="text-center">{{ $job->industry->name }}</td>
                                    <td class="text-center">{{ $job->rating }}</td>
                                    <td class="text-center">{{ $job->region->name }}</td>
                                    <td class="text-center">{{ $job->country->name }}</td>
                                    <td class="text-center">{{ "created" }}</td>
                                    <td class="text-center">{{ "updated" }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('jobs.show',$job->id) }}"><i
                                                    class="fa fa-external-link"></i> </a>
                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('jobs.edit',$job->id) }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('jobs/'.$job->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $job->id }}"
                                                    class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Industry</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Region</th>
                                <th class="text-center">Country</th>
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

