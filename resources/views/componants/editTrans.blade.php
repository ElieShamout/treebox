@extends('layouts.home')

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
                            <form action="{{route('updateTransMoney')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$trans->id}}">
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
                                    <input type="email" name="future_email_trans" value="{{$trans->future_email}}" class="form-control mb-2 d-inline-block w-sm-100" id="email" placeholder="email" require>
                                    @error('future_email_trans')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label for="name" class="form-label d-block">Amount to be transferred <span class="text-muted">(The smallest amount is $5)</span></label>
                                    <input type="number" name="amount_transfer" value="{{$trans->amount}}" min='5' class="form-control d-inline-block mb-2 w-sm-100" id="email" placeholder="amount" require>
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
                                    <div for="" class="">Conversion cost : $<span class="Conversion_cost_value">{{$trans->cost}}</span><span class="text-muted"> (well be cut from your belance)</span></div>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-block">Notes</label>
                                    <textarea class="form-control" name="transfer_notes" placeholder="write notes ...">{{$trans->note}}</textarea>
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
    </script>
@endsection