@extends('layouts.master_tables')

@section('title', 'Projects')

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
                    <h5>Projects Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Productline</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">Delivery Date</th>
                                <th class="text-center">P.O Number</th>
                                <th class="text-center">Is Invoiced?</th>
                                <th class="text-center">Created By</th>
                                <th class="text-center">Updated By</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <a href="{{ route('projects.create') }}" class="btn btn-success">New Project</a>
                            <tbody>
                            @foreach ($projects as $key => $project)
                                <tr class="gradeX">
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('projects.show',$project->id) }}">
                                            <i class="fa fa-external-link"></i> {{ "pro_".$project->id }}</a>
                                    </td>
                                    <td class="text-center">{{ $project->name }}</td>
                                    <td class="text-center">{{ $project->customer()->name }}</td>
                                    <td class="text-center">{{ $project->productline->name }}</td>
                                    <td class="text-center">{{ $project->start_date }}</td>
                                    <td class="text-center">{{ $project->end_date }}</td>
                                    <td class="text-center">{{ $project->po_number }}</td>
                                    <td class="text-center">{{ $project->is_invoiced?"YES":"NO" }}</td>
                                    <td class="text-center">{{ "created" }}</td>
                                    <td class="text-center">{{ "updated" }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('projects.show',$project->id) }}"><i
                                                    class="fa fa-external-link"></i> </a>
                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('projects.edit',$project->id) }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('projects/'.$project->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $project->id }}"
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
                                <th class="text-center">Customer</th>
                                <th class="text-center">Productline</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">Delivery Date</th>
                                <th class="text-center">P.O Number</th>
                                <th class="text-center">Is Invoiced?</th>
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

