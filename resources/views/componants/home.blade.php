@extends('layouts.home')

@section('home')
    <div class="home-page">
        <div class="container-fluid px-5 py-5">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center d-md-flex d-none">
                    <img src="{{asset('images/bg-home.jpg')}}" alt="" class="img-fluid" srcset="">
                </div>
                <div class="col-md-6 py-5 text-center text-md-start">
                    <h1 class="text-color-primar">Book your order now</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ipsam distinctio ducimus sunt ipsum alias veniam dolores vero, excepturi aliquam!</p>
                    <ul class="list-unstyled text-color-secondary px-4 d-md-block d-grid">
                        <li class="pointer"><i class="bi bi-save"></i> Goods safety guarantee.</li>
                        <li><i class="bi bi-clock"></i> Available 24 in day.</li>
                        <li><i class="bi bi-speedometer"></i> Delivery speed.</li>
                        <li><i class="bi bi-piggy-bank"></i> Affordable.</li>
                    </ul>
                    <button type="button" class="btn btn-warning text-light">Book your order now</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('ourInfo')
    <div class="our-info">
        <div class="container-fluid py-5">
            <div class="row justify-content-center text-center">
                <div class="col-sm-12 col-lg-3 col-md-4 cardBox p-0 p-md-2">
                    <div class="card px-0 px-sm-4 bg-color-secondary text-color-primary">
                        <div class="card-body">
                            <div class="card-icon text-center"><i class="fa fa-plane"></i></div>
                            <h5 class="card-title font-size-22 fw-bold text-uppercase">air</h5>
                            <h6 class="card-subtitle mb-0 text-muted">airline</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, nesciunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-4 cardBox p-0 p-md-2">
                    <div class="card px-0 px-sm-4 bg-color-yellow text-color-primary">
                        <div class="card-body">
                            <div class="card-icon text-center"><i class="fa">&#xf21a;</i></div>
                            <h5 class="card-title font-size-22 fw-bold text-uppercase">sea</h5>
                            <h6 class="card-subtitle text-muted mb-0">airline</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, nesciunt.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-4 cardBox p-0 p-md-2">
                    <div class="card px-0 px-sm-4 bg-color-secondary text-color-primary">
                        <div class="card-body">
                            <div class="card-icon text-center"><i class="bi bi-truck"></i></div>
                            <h5 class="card-title font-size-22 fw-bold text-uppercase">land</h5>
                            <h6 class="card-subtitle text-muted mb-0">wild road</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, nesciunt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('order')
    <!-- Form order -->
    <section class="order" id="order">
            <div class="container py-5">
                <div class="row px-auto">
                    <div class="col-lg-6 col-11 m-auto mb-5">
                        <div class="m-auto m-lg-0 itemshh">
                            <h2>Order Form 
                            </h2>
                            <form action="" method="post">
                                @csrf
                                <!-- Sender -->
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">Sender information</label>
                                    <input type="text" id="sender_info" name="sender_name" value="{{(auth()->user()) ? (auth()->user()->fname .' '. auth()->user()->lname) : ''}}" class="form-control mb-2 w-auto d-inline-block w-sm-100" id="name" placeholder="name" required {{(auth()->user()) ? 'disabled' : ''}}>
                                    @error('sender_name')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="email" id="sender_info" name="sender_email" value="{{auth()->user()->email ?? ''}}" class="form-control mb-2 w-auto d-inline-block w-sm-100" id="email" placeholder="email" required {{(auth()->user()) ? 'disabled' : ''}}>
                                    @error('sender_email')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="text" id="sender_info" name="sender_phone" value="{{auth()->user()->phone ?? ''}}" class="form-control mb-2 free" id="location" placeholder="phone" required {{(auth()->user()) ? 'disabled' : ''}}>
                                    @error('sender_phone')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="text" id="sender_info" name="sender_address" value="{{auth()->user()->address ?? ''}}" class="form-control mb-2 free" id="location" placeholder="location" required {{(auth()->user()) ? 'disabled' : ''}}>
                                    @error('sender_address')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Future -->
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">future information</label>
                                    <input type="text" name="future_name" value="" class="form-control mb-2 w-auto d-inline-block w-sm-100" id="name" placeholder="name" required>
                                    @error('future_name')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="email" name="future_email" value="" class="form-control mb-2 w-auto d-inline-block w-sm-100" id="email" placeholder="email" required>
                                    @error('future_email')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="text" name="future_phone" value="" class="form-control mb-2 free" id="location" placeholder="phone" required>
                                    @error('future_phone')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="text" name="future_address" value="" class="form-control mb-2 free" id="location" placeholder="location" required>
                                    @error('future_address')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">Order information <span class="text-muted">(discretionary)</span></label>
                                    <input type="number" id="order_info" name="order_width" min="0" value="" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="email" placeholder="width (cm)" required>
                                    @error('order_width')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="number" id="order_info" name="order_height" min="0" value="" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="email" placeholder="length (cm)" required>
                                    @error('order_height')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <span class="d-none d-sm-block"></span>
                                    <input type="number" id="order_info" name="order_thickness" min="0" value="" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="name" placeholder="height (cm)" required>
                                    @error('order_length')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="number" id="order_info weight" name="order_weight" min="0" value="" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="name" placeholder="weight (g)" required>
                                    @error('order_weight')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-1 ms-3">
                                    <div for="" class="">Cost : $<span class="cost_value">0</span><span class="text-muted"> (well be cut from your belance)</span>
                                    <span class="text-color-red d-block">Tip : transportation cost per 1 kg is $5</span></div>
                                </div>
                                <div class="form-check ms-3 mb-3">
                                    <label class="form-check-label text-warning font-size-14" style="font-weight:600" for="defaultCheck1">
                                        I agree to the order 
                                    </label>
                                    <input class="form-check-input" name="agree_trans" type="checkbox" value="" id="defaultCheck1">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">Notes</label>
                                    <textarea class="form-control" name="order_notes" placeholder="write notes ..."></textarea>
                                </div>
                                <input type="submit" name="order_request" class="btn bg-color-secondary btn-hover text-light" id="sub" value="Confirm">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-none d-lg-flex mt-5 m-md-0 justify-content-center align-items-center text-center">
                        <img src="{{asset('images/c.jpg')}}" class="img-fluid m-auto" alt="" srcset="">
                    </div>
                </div>
            </div>
    </section>
    <script>
        $(document).ready(function(){
            // Add event [keyup] on input [order weight]
            $("[name=order_weight]").keyup(function(event){
                // get value input [order weight] 
                const val=$("[name=order_weight]").val() ?? 0;
                // view transportation cost
                $(".cost_value").text(val*5);
            });
        });
    </script>
@endsection

@section('money')
    <!-- Form order -->
    <section class="order" id="order_money">
            <div class="container py-5">
                <div class="row px-auto">       
                    <div class="col-lg-6 col-12 d-none d-lg-flex mt-5 m-md-0 align-items-center text-center">    
                        <!-- <img src="https://betterspider.com/wp-content/uploads/2020/03/Alipay_social_square.gif" class="img-fluid w-100" alt="" srcset=""> -->
                        <img src="{{asset('images/money-transfer.svg')}}" class="img-fluid w-100" alt="" srcset="">
                    </div>
                    <div class="col-lg-6 col-11 m-auto mb-5">
                        <div class="m-auto itemshh">
                            <h2>Money transfer 
                            </h2>
                            <form action="{{route('money')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">Sender email</label>
                                    <input type="email" id="sender_info" name="sender_email_trans" value="{{auth()->user()->email ?? ''}}" class="form-control mb-2 d-inline-block w-sm-100" id="email" placeholder="email" require  {{(auth()->user()) ? 'disabled' : ''}}>
                                    @error('sender_email_trans')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">future email</label>
                                    <input type="email" name="future_email_trans" value="" class="form-control mb-2 d-inline-block w-sm-100" id="email" placeholder="email" require>
                                    @error('future_email_trans')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label for="name" class="form-label d-block">Amount to be transferred <span class="text-muted">(The smallest amount is $5)</span></label>
                                    <input type="number" name="amount_transfer" value="" min='5' class="form-control d-inline-block mb-2 w-sm-100" id="email" placeholder="amount" require>
                                    @error('amount_transfer')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-check mb-3 ms-2">
                                    <input class="form-check-input" name="agree_trans" type="checkbox" value="" id="defaultCheck2">
                                    <label class="form-check-label text-warning font-size-14" style="font-weight:600" for="defaultCheck2">
                                        I agree to the transformation 
                                    </label>
                                </div>
                                <div class="my-2">
                                    <div for="" class="">Conversion cost : $<span class="Conversion_cost_value">0</span><span class="text-muted"> (well be cut from your belance)</span></div>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">Notes</label>
                                    <textarea class="form-control" name="transfer_notes" placeholder="write notes ..."></textarea>
                                </div>
                                <input type="submit" name="order_request_trans" class="btn bg-color-secondary btn-hover text-light" id="sub" value="Confirm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script>
        /* Calculation of transportation cost */
        $(document).ready(function(){
            // Add event [keyup] on input [order weight]
            $("[name=amount_transfer]").keyup(function(event){
                // get value input [order weight] 
                const val=$("[name=amount_transfer]").val() ?? 0;
                // view transportation cost
                if (val>=1000){
                    $(".Conversion_cost_value").text(((val/100)*1).toFixed(2));
                }else{
                    $(".Conversion_cost_value").text(((val/100)*2).toFixed(2));
                }
            });
        });
    </script>
@endsection

@section('our-center')
    <!-- our centers -->
    <section class="our-centers">
        <div class="container py-5">
            <div class="row">
                <h1 class="ms-2 ms-sm-0">Our centers</h1>
                <div class="col-lg-5 col-11 m-auto mb-3 accordion-map-info">
                    <div class="accordion accordion-flush accordion-map mt-3" id="accordionFlushExample">
                    </div> 
                </div>
                <div class="col-lg-7 col-11 m-auto mt-3">
                    <div id='map'></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <!-- Footer -->
    <secion class="footer d-block bg-color-yellow">
        <div class="container py-5">
            <div class="row mx-0">
                <div class="col-lg-3 col-md-6 m-lg-0 mt-5 text-dark">
                    <div class="itemshh">
                    <h2>Contact</h2>
                    <div class="row fw-bold">
                            <ul class="list-group ps-3 list-unstyled">
                                <li class="list-item">
                                    <i class="bi bi-facebook"></i>
                                    TreeBox@facebook.com
                                </li>
                                <li class="list-item"><i class="bi bi-telegram"></i> (+963) 949 727 174 - 938 926 391</li>
                                <li class="list-item"><i class="bi bi-whatsapp"></i> (+963) 949 727 174</li>
                                <li class="list-item"><i class="bi bi-telephone-fill"></i> (+963) 949 727 174</li>
                            </ul>
                        </div>
                        </div>
                </div>
                <div class="col-lg-3 col-md-6 m-lg-0 mt-5 text-dark">
                    <div class="itemshh">
                    <h2>Services</h2>
                    <div class="row fw-bold">
                        <ul class="list-group ps-3 list-unstyled">
                            <li class="list-item"><i class="bi bi-cash-stack"></i> Money Orders.</li>
                            <li class="list-item"><i class="bi bi-truck"></i> Goods transfers.</li>
                            <div class="px-2">
                                <span class="text-muted">Soon</span>
                                <li class="list-item"><i class="bi bi-credit-card-2-front-fill"></i> Purchase via the site.</li>
                                <li class="list-item"><i class="fa fa-plane"></i> Travel reservations.</li>
                            </div>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 m-lg-0 mt-5 text-dark">
                    <div class="itemshh">
                        <h2>Our other companies</h2>
                        <div class="row fw-bold">
                            <ul class="list-group ps-3 list-unstyled">
                                <li class="list-item"><i class="bi bi-server"></i> TreeWebHosting.com <span class="text-muted">(web hosting)</span></li>
                                <li class="list-item"><i class="bi bi-file-earmark-code-fill"></i> TreeWebDevelopment.com <span class="text-muted">(Website development)</span></li>
                            </ul>
                        </div>
                        <div class="row mt-4">
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-1.png')}}" class="img-fluid" alt="" srcset=""></div>
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-2.png')}}" class="img-fluid" alt="" srcset=""></div>
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-3.png')}}" class="img-fluid" alt="" srcset=""></div>
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-4.png')}}" class="img-fluid" alt="" srcset=""></div>
                                <span class="d-md-block d-none"></span>
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-5.png')}}" class="img-fluid" alt="" srcset=""></div>
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-6.png')}}" class="img-fluid" alt="" srcset=""></div>
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-7.png')}}" class="img-fluid" alt="" srcset=""></div>
                                <div class="col-4 m-auto m-lg-0  col-md-2"><img src="{{asset('images/client-8.png')}}" class="img-fluid" alt="" srcset=""></div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </secion>
@endsection