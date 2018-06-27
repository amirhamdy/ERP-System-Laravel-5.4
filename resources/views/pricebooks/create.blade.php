@extends('layouts.master')

@section('title', 'Create Pricebook')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Pricebook</div>

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('pricebooks') }}">
                        {{ csrf_field() }}
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('currency_id') ? ' has-error' : '' }}">
                                <label for="currency_id" class="col-md-4 control-label">Currency</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" id="currency_id" name="currency_id">
                                        @foreach ($currencies as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('currency_id'))
                                        <span class="help-block"><strong>{{ $errors->first('currency_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th>Source Language</th>
                                        <th>Target Language</th>
                                        <th>Subject Matter</th>
                                        <th>Job Type</th>
                                        <th>Job Unit</th>
                                        <th>Unit Price</th>
                                        <th>Minimum Charge</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group required{{ $errors->has('source_language_id') ? ' has-error' : '' }}">
                                                <div class="col-sm-12">
                                                    <select class="form-control m-b" id="source_language_id"
                                                            name="source_language_id[]" required>
                                                        <option value=""></option>
                                                        @foreach ($languages as $key => $value)
                                                            {{--    <option value="{{$key}}">{{$value}}</option>--}}
                                                            <option value="{{$key}}" {{ (old("source_language_id") == $key ? "selected":"") }}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group required{{ $errors->has('target_language_id') ? ' has-error' : '' }}">
                                                <div class="col-sm-12">
                                                    <select class="form-control m-b" id="target_language_id"
                                                            name="target_language_id[]" required>
                                                        <option value=""></option>
                                                        @foreach ($languages as $key => $value)
                                                            <option value="{{$key}}" {{ (old("target_language_id") == $key ? "selected":"") }}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group required{{ $errors->has('subject_matter') ? ' has-error' : '' }}">
                                                <div class="col-sm-12">
                                                    <select class="form-control m-b" id="subject_matter"
                                                            name="subject_matter[]" required>
                                                        <option value=""></option>
                                                        @foreach ($subjectMatters as $key => $value)
                                                            <option value="{{$key}}" {{ (old("subject_matter") == $key ? "selected":"") }}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group required{{ $errors->has('job_type_id') ? ' has-error' : '' }}">
                                                <div class="col-sm-12">
                                                    <select class="form-control m-b" id="job_type_id"
                                                            name="job_type_id[]"
                                                            required>
                                                        <option value=""></option>
                                                        @foreach ($jobTypes as $key => $value)
                                                            <option value="{{$key}}" {{ (old("job_type_id") == $key ? "selected":"") }}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group required{{ $errors->has('unit_id') ? ' has-error' : '' }}">
                                                <div class="col-sm-12">
                                                    <select class="form-control m-b" id="unit_id" name="unit_id[]"
                                                            required>
                                                        <option value=""></option>
                                                        @foreach ($units as $key => $value)
                                                            <option value="{{$key}}" {{ (old("unit_id") == $key ? "selected":"") }}>{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group required{{ $errors->has('unit_price') ? ' has-error' : '' }}">
                                                <div class="col-md-12">
                                                    <input id="unit_price" type="number" class="form-control"
                                                           name="unit_price[]"
                                                           min="0" step="0.1"
                                                           value="{{ old('unit_price')?old('unit_price'):"0" }}"
                                                           required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group{{ $errors->has('minimum_charge') ? ' has-error' : '' }}">
                                                <div class="col-md-12">
                                                    <input id="minimum_charge" type="number" class="form-control"
                                                           name="minimum_charge[]"
                                                           min="0" step="0.1"
                                                           value="{{ old('minimum_charge')?old('minimum_charge'):"0" }}"
                                                           required>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="button" class="btn btn-info" id="addrow" value="Add Row"/>
                                <button type="submit" class="btn btn-primary"> Save</button>
                                <a class="btn btn-link" href="{{ url('pricebooks') }}"> Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var counter = 0;

            $("#addrow").on("click", function () {
                var newRow = $("<tr>");
                var cols = "";

                /*
                                cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';
                */

                cols += "<td><div class=\"form-group required{{ $errors->has('source_language_id') ? ' has-error' : '' }}\">" +
                    "<div class=\"col-sm-12\">" +
                    "<select class=\"form-control m-b\"" +
                    "name=\"source_language_id[]\" required>" +
                    "<option value=" +
                    "></option>" +
                    "@foreach ($languages as $key => $value)" +
                    "<option value=\"{{$key}}\">{{$value}}</option>" +
                    "@endforeach" +
                    "</select>" +
                    "</div></div></td>";

                cols += "<td>\n" +
                    "<div class=\"form-group required{{ $errors->has('target_language_id') ? ' has-error' : '' }}\">\n" +
                    "<div class=\"col-sm-12\">\n" +
                    "<select class=\"form-control m-b\"\n" +
                    "name=\"target_language_id[]\" required>\n" +
                    "<option value=\"\"></option>\n" +
                    "@foreach ($languages as $key => $value)\n" +
                    "<option value=\"{{$key}}\">{{$value}}</option>\n" +
                    "@endforeach\n" +
                    "</select>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</td>\n";

                cols += "<td>\n" +
                    "<div class=\"form-group required{{ $errors->has('subject_matter') ? ' has-error' : '' }}\">\n" +
                    "<div class=\"col-sm-12\">\n" +
                    "<select class=\"form-control m-b\"\n" +
                    "name=\"subject_matter[]\">\n" +
                    "<option value=\"\"></option>\n" +
                    "@foreach ($subjectMatters as $key => $value)\n" +
                    "<option value=\"{{$key}}\">{{$value}}</option>\n" +
                    "@endforeach\n" +
                    "</select>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</td>\n";

                cols += "<td>\n" +
                    "<div class=\"form-group required{{ $errors->has('job_type_id') ? ' has-error' : '' }}\">\n" +
                    "<div class=\"col-sm-12\">\n" +
                    "<select class=\"form-control m-b\" name=\"job_type_id[]\" required>\n" +
                    "<option value=\"\"></option>\n" +
                    "@foreach ($jobTypes as $key => $value)\n" +
                    "<option value=\"{{$key}}\">{{$value}}</option>\n" +
                    "@endforeach\n" +
                    "</select>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</td>\n";

                cols += "<td>\n" +
                    "<div class=\"form-group required{{ $errors->has('unit_id') ? ' has-error' : '' }}\">\n" +
                    "<div class=\"col-sm-12\">\n" +
                    "<select class=\"form-control m-b\" name=\"unit_id[]\" required>\n" +
                    "<option value=\"\"></option>\n" +
                    "@foreach ($units as $key => $value)\n" +
                    "<option value=\"{{$key}}\">{{$value}}</option>\n" +
                    "@endforeach\n" +
                    "</select>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</td>\n";

                cols += "<td>\n" +
                    "<div class=\"form-group required{{ $errors->has('unit_price') ? ' has-error' : '' }}\">\n" +
                    "<div class=\"col-md-12\">\n" +
                    "<input type=\"number\" class=\"form-control\" name=\"unit_price[]\"\n" +
                    "min=\"0\" step=\"0.1\" value=\"{{ old('unit_price')?old('minimum_charge'): 0 }}\" required>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</td>\n";

                cols += "<td>\n" +
                    "<div class=\"form-group required{{ $errors->has('minimum_charge') ? ' has-error' : '' }}\">\n" +
                    "<div class=\"col-md-12\">\n" +
                    "<input type=\"number\" class=\"form-control\" name=\"minimum_charge[]\"\n" +
                    "min=\"0\" step=\"0.1\" value=\"{{ old('minimum_charge')?old('minimum_charge'): 0 }}\" required>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</td>\n";

                cols += '<td><input type="button" class="ibtnDel btn btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.table-sm").append(newRow);
                counter++;
            });


            $("table.table-sm").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        });
    </script>
@endsection