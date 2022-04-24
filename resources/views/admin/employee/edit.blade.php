@extends('layouts.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="wizard-content">
        <form class="tab-wizard wizard-circle wizard clearfix" action="{{ route('employees.update',$employee->id) }}"
            method="POST" role="application" id="steps-uid-0">
            @csrf
            @method('PUT')
            <div class="content clearfix">
                <h5 id="steps-uid-0-h-0" tabindex="-1" class="title current">Edit Employee Information</h5>
                <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current"
                    aria-hidden="false">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name : <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $employee->first_name }}"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name : <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $employee->last_name }}"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" value="{{ $employee->email }}" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number :</label>
                                <input type="text" value="{{ $employee->phone }}" class="form-control" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Company : <span class="text-danger">*</span></label>
                                <select class="custom-select form-control @error('company_id') is-invalid @enderror"
                                    name="company_id">
                                    <option value="" selected disabled>Select Company..</option>
                                    @foreach ($companies as $company)
                                    <option @if ($employee->company_id==$company->id )
                                        selected
                                        @endif value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="actions clearfix">
                <button type="submit" class="btn btn-info float-right">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection