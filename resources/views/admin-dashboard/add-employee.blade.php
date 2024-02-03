@extends('layouts.admin_layout')

@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Employee Details</h3>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <label class for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Choose Company</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">First Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Last Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Mobile No.</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
