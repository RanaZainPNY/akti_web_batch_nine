@extends('web.webmaster')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="{{route('web-place-order')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input name='firstname' type="text" class="form-control" id="first_name" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input name='lastname' type="text" class="form-control" id="last_name" value="" required>
                                </div>


                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input name='address' type="text" class="form-control mb-3" id="street_address" value="">
                                </div>



                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input name='contact' type="number" class="form-control" id="phone_number" min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input name='email' type="email" class="form-control" id="email_address" value="">
                                </div>


                            </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>
                            @foreach ((array) session('cart') as $id => $details)
                            <li>
                                <span>{{ $details['name'] }}</span>
                                <span>{{ $details['quantity'] * $details['price'] }}</span>
                            </li>
                            @endforeach

                            @php
                            $subtotal = 0;
                            $cart = session('cart');
                            if ($cart) {
                                foreach ($cart as $id => $details) {
                                    $subtotal += $details['price'] * $details['quantity'];
                                }
                            }
                        @endphp

                            <li><span>Subtotal</span> <span>{{$subtotal}}</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span>Discount</span> <span>15%</span></li>
                            <li><span>Total</span> <span>{{$subtotal * 0.85}}</span></li>
                        </ul>

                        {{-- <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-circle-o mr-3"></i>credit card</a>
                                    </h6>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse quo sint repudiandae suscipit ab soluta delectus voluptate, vero vitae</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="fa fa-circle-o mr-3"></i>direct bank transfer</a>
                                    </h6>
                                </div>
                                <div id="collapseFour" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est cum autem eveniet saepe fugit, impedit magni.</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <button type="submit" class="btn essence-btn">Place Order</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

@endsection
