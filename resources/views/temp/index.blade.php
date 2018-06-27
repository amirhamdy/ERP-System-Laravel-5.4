@extends('layouts.master_tables')

@section('title', 'Temps')

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
                    <h5>Temps Table Data</h5>
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
                            <a href="{{ route('customers.create') }}" class="btn btn-success">New Customer</a>
                            <tbody>
                            @foreach ($customers as $key => $customer)
                                <tr class="gradeX">
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('customers.show',$customer->id) }}">
                                            <i class="fa fa-external-link"></i> {{ "cus_".$customer->id }}</a>
                                    </td>
                                    <td class="text-center">{{ $customer->name }}</td>
                                    <td class="text-center">{{ $customer->email }}</td>
                                    <td class="text-center">{{ $customer->status }}</td>
                                    <td class="text-center">{{ $customer->industry->name }}</td>
                                    <td class="text-center">{{ $customer->rating }}</td>
                                    <td class="text-center">{{ $customer->region->name }}</td>
                                    <td class="text-center">{{ $customer->country->name }}</td>
                                    <td class="text-center">{{ "created" }}</td>
                                    <td class="text-center">{{ "updated" }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('customers.show',$customer->id) }}"><i
                                                    class="fa fa-external-link"></i> </a>
                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('customers.edit',$customer->id) }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('customers/'.$customer->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $customer->id }}"
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

