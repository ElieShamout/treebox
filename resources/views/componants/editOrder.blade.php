@extends('layouts.home')

@section('order')
    <!-- Form order -->


    <section class="order" id="order">
            <div class="container py-5">
                <div class="row px-auto">
                    <div class="col-lg-6 col-11 m-auto mb-5">
                        <div class="m-auto m-lg-0 itemshh">
                            <h2>Order Form 
                            </h2>
                            <form action="{{route('updateOrder')}}" method="post">
                                @csrf
                                <!-- Sender -->
                                <input type="hidden" name="id" value="{{$order->id}}">
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
                                    <input type="text" name="future_name" value="{{$order->future_name}}" class="form-control mb-2 w-auto d-inline-block w-sm-100" id="name" placeholder="name" required>
                                    @error('future_name')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="email" name="future_email" value="{{$order->future_email}}" class="form-control mb-2 w-auto d-inline-block w-sm-100" id="email" placeholder="email" required>
                                    @error('future_email')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="text" name="future_phone" value="{{$order->future_phone}}" class="form-control mb-2 free" id="location" placeholder="phone" required>
                                    @error('future_phone')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="text" name="future_address" value="{{$order->future_address}}" class="form-control mb-2 free" id="location" placeholder="location" required>
                                    @error('future_address')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">Order information <span class="text-muted">(discretionary)</span></label>
                                    <input type="number" id="order_info" name="order_width" min="0" value="{{$order->width}}" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="email" placeholder="width (cm)" required>
                                    @error('order_width')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="number" id="order_info" name="order_height" min="0" value="{{$order->height}}" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="email" placeholder="length (cm)" required>
                                    @error('order_height')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <span class="d-none d-sm-block"></span>
                                    <input type="number" id="order_info" name="order_thickness" min="0" value="{{$order->thickness}}" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="name" placeholder="height (cm)" required>
                                    @error('order_length')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <input type="number" id="order_info weight" name="order_weight" min="0" value="{{$order->weight}}" class="form-control w-auto d-inline-block mb-2 w-sm-100" id="name" placeholder="weight (g)" required>
                                    @error('order_weight')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-1 ms-3">
                                    <div for="" class="">Cost : $<span class="cost_value">{{$order->cost}}</span><span class="text-muted"> (well be cut from your belance)</span>
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
                                    <textarea class="form-control" name="order_notes" placeholder="write notes ...">{{$order->note}}</textarea>
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