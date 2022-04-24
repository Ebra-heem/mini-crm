@extends('layouts.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <div class="wizard-content">
        <form class="tab-wizard wizard-circle wizard clearfix" action="{{ route('companies.store') }}" method="POST"
            enctype="multipart/form-data" role="application" id="steps-uid-0">
            @csrf
            <div class="content clearfix">
                <h5 id="steps-uid-0-h-0" tabindex="-1" class="title current">Create Company Information</h5>
                <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current"
                    aria-hidden="false">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name :<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Logo :<small>(minimum 100*100 px)</small></label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website :</label>
                                <input type="text" class="form-control" name="website">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="actions clearfix">
                <button type="submit" class="btn btn-success float-right">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection