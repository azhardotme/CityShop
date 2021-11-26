@extends('frontend.master')
@section('content')


<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
<div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Shipping address</h3>
                    </div>
                    <form action="{{url('/save-shipping-address')}}" method="POST">
                        @csrf
                    <div class="form-group">
                        <input class="input" type="text" name="name" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="country" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="zipcode" placeholder="ZIP Code">
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="mobile" placeholder="Mobile">
                    </div>

                    <input type="button" class="btn btn-primary" value="Next" style="float: right">
                </form>
                </div>
                <!-- /Billing Details -->

                <!-- Shiping Details -->
                {{-- <div class="shiping-details">

                    <div class="input-checkbox">
                        <input type="checkbox" id="shiping-address">

                        <div class="caption">
                            <div class="form-group">
                                <input class="input" type="text" name="name" placeholder="Full Name">
                            </div>

                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="mobile" placeholder="Mobile">
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /Shiping Details -->

                <!-- Order notes -->

                <!-- /Order notes -->
            </div>
            <div class="col-md-2"></div>
            <!-- Order Details -->

            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


@endsection
