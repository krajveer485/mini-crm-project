@extends('layouts.admin_layout')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Employee Detailsdd</h3>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        
                        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <label class for="inputGroupSelect01">Options</label>
                                </div>
                                <select class="form-select" name="company" id="inputGroupSelect01">
                                    <option value="">Choose Company</option>
                                    @if($companies)
                                    @foreach($companies as $val)
                                    <option value="{{ $val->id }}" {{ ($employee->company_id) == $val->id ? 'selected' : '' }}>{{ $val->name }}</option>
                                    @endforeach
                                    @endif
                                    
                                </select>
                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">First Name</label>
                                        <input type="text" value="{{ ($employee->first_name) ? $employee->first_name :  old('first_name') }}" name="first_name" class="form-control" id="exampleFormControlInput1"
                                            placeholder="">
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Last Name</label>
                                        <input type="text" value="{{ ($employee->last_name) ? $employee->last_name : old('last_name') }}" name="last_name" class="form-control" id="exampleFormControlInput1"
                                            placeholder="">
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
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Email</label>
                                        <input type="email" value="{{ ($employee->email) ? $employee->email :  old('email') }}" name="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Mobile No.</label>
                                        <input type="number" value="{{($employee->phone) ? $employee->phone : old('mobile_no') }}" name="mobile_no" class="form-control" id="exampleFormControlInput1"
                                            placeholder="">
                                            @error('mobile_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
