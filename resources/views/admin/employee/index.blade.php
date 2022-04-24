@extends('layouts.master')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20 mb-30">
        <h4 class="text-blue h4">Companies Information</h4>
        <p><a class="float-right btn btn-primary" href="{{ route('employees.create') }}"><i
                    class="icon-copy fa fa-plus-circle" aria-hidden="true"></i> Add Employee</a></p>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap mt-30">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">First Name</th>
                    <th>Last Name</th>
                    <th>Comapny</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($employees)>0)
                @foreach ($employees as $employee)
                <tr>
                    <td class="table-plus">{{ $employee->first_name }}</td>
                    <td class="table-plus">{{ $employee->last_name }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }} </td>
                    <td>{{ $employee->phone }} </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                                    <a class="dropdown-item" href="{{ route('employees.edit',$employee->id) }}"><i
                                            class="dw dw-edit2"></i> Edit</a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="dropdown-item"><i class="dw dw-delete-3"></i>
                                        Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan=6>No Data Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('extra-js')

<!-- Datatable Setting js -->
<script src="{{ asset('/admin') }}/vendors/scripts/datatable-setting.js"></script>
@endsection