@extends('layouts.master_tables')

@section('title', 'Productlines')

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
                    <h5>Productlines Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <a href="{{ route('productlines.create') }}" class="btn btn-success">New Productline</a>
                            <tbody>
                            @foreach ($productlines as $key => $productline)
                                <tr class="gradeX">
                                    <td class="text-center">{{ $productline->id }}</td>
                                    <td class="text-center">{{ $productline->name }}</td>
                                    <td class="text-center">{{ $productline->email }}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center">
                                        <a class="btn btn-info"
                                           href="{{ route('productlines.show',$productline->id) }}">
                                            <i class="fa fa-external-link"></i> Show</a>
                                        <a class="btn btn-primary"
                                           href="{{ route('productlines.edit',$productline->id) }}"><i
                                                    class="fa fa-edit"></i>
                                            Edit</a>
                                        <form action="{{ url('productlines/'.$productline->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $productline->id }}"
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
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Roles</th>
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

