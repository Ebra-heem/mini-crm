@extends('layouts.master')
@section('content')
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20 mb-30">
        <h4 class="text-blue h4">Companies Information</h4>
        <p><a class="float-right btn btn-primary" href="{{ route('companies.create') }}"><i
                    class="icon-copy fa fa-plus-circle" aria-hidden="true"></i> Add Company</a></p>
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
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($companies)>0)
                @foreach ($companies as $company)
                <tr>
                    <td class="table-plus">{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td> <img src="{{@App::make('url')->to('/').'/'. $company->logo }}"
                            style="height: 100px;width:100px;" /></td>
                    <td>{{ $company->website }} </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                    <a class="dropdown-item" href="{{ route('companies.edit',$company->id) }}"><i
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
                    <td colspan="5">No Data Found</td>
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