@extends('layouts.admin_layout')

@section('content')


    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single_element">
                        <div class="quick_activity">
                            <div class="row">
                                <div class="col-12">
                                    <div class="quick_activity_wrap">
                                        <div class="single_quick_activity">
                                            <h4>Total Income</h4>
                                            <h3>$ <span class="counter">5,79,000</span> </h3>
                                            <p>Saved 25%</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Total Expences</h4>
                                            <h3>$ <span class="counter">79,000</span> </h3>
                                            <p>Saved 25%</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Cash on Hand</h4>
                                            <h3>$ <span class="counter">92,000</span> </h3>
                                            <p>Saved 25%</p>
                                        </div>
                                        <div class="single_quick_activity">
                                            <h4>Net Profit Margin</h4>
                                            <h3>$ <span class="counter">1,79,000</span> </h3>
                                            <p>Saved 65%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="white_box mb_30 min_430">
                        <div class="box_header  box_header_block ">
                            <div class="main-title">
                                <h3 class="mb-0">AP and AR Balance</h3>
                                <span>Avg. $5,309</span>
                            </div>
                            <div class="box_select d-flex">
                                <select class="nice_Select2 mr_5">
                                    <option value="1">Monthly</option>
                                    <option value="1">Monthly</option>
                                </select>
                                <select class="nice_Select2 ">
                                    <option value="1">Last Year</option>
                                    <option value="1">this Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="bar_active"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 ">
                    <div class="white_box mb_30 min_430">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">% of Income Budget</h3>
                            </div>
                        </div>
                        <div id="radial_2"></div>
                        <div class="radial_footer">
                            <div class="radial_footer_inner d-flex justify-content-between">
                                <div class="left_footer">
                                    <h5> <span style="background-color: #EDECFE;"></span> Blance</h5>
                                    <p>-$18,570</p>
                                </div>
                                <div class="left_footer">
                                    <h5> <span style="background-color: #A4A1FB;"></span> Blance</h5>
                                    <p>$31,430</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="white_box min_430">
                        <div class="box_header  box_header_block">
                            <div class="main-title">
                                <h3 class="mb-0">% of Expenses Budget</h3>
                            </div>
                        </div>
                        <div id="radial_1"></div>
                        <div class="radial_footer">
                            <div class="radial_footer_inner d-flex justify-content-between">
                                <div class="left_footer">
                                    <h5> <span style="background-color: #EDECFE;"></span> Blance</h5>
                                    <p>-$18,570</p>
                                </div>
                                <div class="left_footer">
                                    <h5> <span style="background-color: #A4A1FB;"></span> Blance</h5>
                                    <p>$31,430</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')

    @endsection