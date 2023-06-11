@extends('layouts.header')

<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand text-warning" href="{{ url('/') }}">
            {{ config('app.name', 'TreeBox') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </ul>
            <div class="dropdown d-flex justify-content-end me-2 me-sm-0">
                <button class="btn text-light position-relative" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill font-size-22"></i>
                    <span class="qty-message">
                        50+
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark w-100" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Home Control -->
<div class="home mt-0 p-0">
    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="col-12 col-lg-8 col-md-7 justify-content-center my-2">
                <!-- order view -->
                <div class="order-goods mx-2 mx-sm-3">
                    <div class="header-title d-flex justify-content-between px-2 mb-3 align-items-center bg-light">
                        <h2 class='text-dark bg-light px-2 px-sm-2 mt-2'>Ordres goods</h2>
                        <a href="{{route('home')}}" class="btn btn-primary">new order</a>
                    </div>
                    <div class="accordion w-100 px-3 px-sm-5" id="accordionExample">
                        <h4 class='mb-3'>Outgoing Orders</h4>
                        @if($outGoingOrdersCount==0)
                            <div class='w-100 d-grid align-items-center justify-content-center'>
                                <img src="{{asset('images/empty_cart.png')}}" style='max-width:150px' class='m-auto'>
                                <div class='w-100 text-center text-danger font-size-20'>There are no requests sent</div>
                            </div>
                        @else
                            @foreach($outGoingOrders as $outOrder)
                                <div class="accordion w-100 px-2" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#outgoing-order-{{$outOrder->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$outOrder->id .' '. $outOrder->sender->fname .' '. $outOrder->sender->lname}}
                                        </button>
                                        </h2>
                                        <div id="outgoing-order-{{$outOrder->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                    <div class="header-order d-flex justify-content-between align-items-center">
                                                        <span class="font-size-20 fw-bold">Future info</span>
                                                        <span>
                                                            <!-- Edit -->
                                                            <a href="{{route('editOrder',$outOrder->id)}}" class="text-dark mx-2"><i class='bi bi-pencil-square'></i></a>
                                                            <!-- Delete -->
                                                            <a href="index.php?order_id={{$outOrder->id}}" class="text-danger mx-2"><i class='bi bi-trash3-fill'></i></a>
                                                        </span>
                                                    </div>
                                                    <div class="container-fluid mt-2">
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Name :</span> 
                                                                <span class="sender">{{$outOrder->sender->fname .' '. $outOrder->sender->lname}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Phone :</span>
                                                                <span class="sender">{{$outOrder->future_phone}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Email :</span> 
                                                                <span class="sender">{{$outOrder->future_email}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Cost :</span> 
                                                                <span class="sender">${{$outOrder->cost}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mb-1">
                                                            <div class="col-12">
                                                                <span class="font-size-16 fw-bold">Address :</span> 
                                                                <span class="sender">{{$outOrder->future_address}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Date :</span> 
                                                                <span class="sender">{{$outOrder->created_at}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <span class="font-size-20 fw-bold">Notes </span>
                                                            </div>
                                                            <div class="col-12 px-4 mt-1">
                                                                <span class="sender">{{$outOrder->note}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">State :</span> 
                                                                <span class="sender text-success">{{$outOrder->state}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6"><span class="font-size-16 fw-bold">Tip :</span> <span class="sender text-success">sent delivered handed</span></div>
                                                        </div>  
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>


                    <div class="accordion w-100 px-3 px-sm-5" id="accordionExample">
                        <h4 class='mt-5 mb-3'>Incoming Orders</h4>
                        @if($inComingOrdersCount==0)
                            <div class='w-100 d-grid align-items-center justify-content-center'>
                                <img src="{{asset('images/empty_cart.png')}}" style='max-width:150px' class='m-auto'>
                                <div class='w-100 text-center text-danger font-size-20'>There are no requests received</div>
                            </div>
                        @else
                            @foreach($inComingOrders as $inOrder)
                                <div class="accordion w-100 px-2" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#outgoing-order-{{$inOrder->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$inOrder->id .' '. $inOrder->sender->fname .' '. $inOrder->sender->lname}}
                                        </button>
                                        </h2>
                                        <div id="outgoing-order-{{$inOrder->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                    <div class="header-order d-flex justify-content-between align-items-center">
                                                        <span class="font-size-20 fw-bold">Sender info</span>
                                                        <span>
                                                            <a href="index.php?order_id={{$inOrder->id}}" class="text-danger mx-2"><i class='bi bi-trash3-fill'></i></a>
                                                        </span>
                                                    </div>
                                                    <div class="container-fluid mt-2">
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Name :</span> 
                                                                <span class="sender">{{$inOrder->sender->fname .' '. $inOrder->sender->lname}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Phone :</span>
                                                                <span class="sender">{{$inOrder->sender->phone}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Email :</span> 
                                                                <span class="sender">{{$inOrder->sender->email}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Cost :</span> 
                                                                <span class="sender">${{$inOrder->cost}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mb-1">
                                                            <div class="col-12">
                                                                <span class="font-size-16 fw-bold">Address :</span> 
                                                                <span class="sender">{{$inOrder->sender->address}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Date :</span> 
                                                                <span class="sender">{{$inOrder->created_at}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <span class="font-size-20 fw-bold">Notes </span>
                                                            </div>
                                                            <div class="col-12 px-4 mt-1">
                                                                <span class="sender">{{$inOrder->note}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">State :</span> 
                                                                <span class="sender text-success">{{$inOrder->state}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6"><span class="font-size-16 fw-bold">Tip :</span> <span class="sender text-success">sent delivered handed</span></div>
                                                        </div>  
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <hr class="my-5">
                <!-- money transfer view -->
                <div class="money-goods mx-2 mx-sm-3">
                    <div class="header-title d-flex justify-content-between px-2 align-items-center bg-light">
                        <h2 class='text-dark px-2 px-sm-2 mt-2 bg-light'>Money Transfer</h2>
                        <a href="index.php?#order_money" class="btn btn-primary">new order</a>
                    </div>
                    <div class="accordion w-100 px-2 px-sm-5" id="accordionExample">
                        <h4 class='mt-5 mb-3'>Outgoing Money</h4>
                        @if($outGoingRemittancesCount==0)
                            <div class='w-100 d-grid align-items-center justify-content-center'>
                                <img src="{{asset('images/money_empty.svg')}}" style='max-width:100px' class='m-auto'>
                                <div class='w-100 text-center text-danger font-size-20'>There are no remittances sent</div>
                            </div>
                        @else
                            @foreach($outGoingMoney as $outMoney)
                            <div class="accordion w-100 px-2" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#outgoing-money-{{$outMoney->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$outMoney->id .' '. $outMoney->future->fname .' '. $outMoney->future->lname}}
                                        </button>
                                        </h2>
                                        <div id="outgoing-money-{{$outMoney->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                    <div class="header-order d-flex justify-content-between align-items-center">
                                                        <span class="font-size-20 fw-bold">Future info</span>
                                                        <span>
                                                            <a href="{{route('editTransMoney',$outMoney->id)}}" class="text-dark mx-2"><i class='bi bi-pencil-square'></i></a>
                                                            <a href="index.php?order_id={{$outMoney->id}}" class="text-danger mx-2"><i class='bi bi-trash3-fill'></i></a>
                                                        </span>
                                                    </div>
                                                    <div class="container-fluid mt-2">
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Name :</span> 
                                                                <span class="sender">{{$outMoney->future->fname .' '. $outMoney->future->lname}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Phone :</span>
                                                                <span class="sender">{{$outMoney->future->phone}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12">
                                                                <span class="font-size-16 fw-bold">Email :</span> 
                                                                <span class="sender">{{$outMoney->future->email}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Amount :</span> 
                                                                <span class="sender">$ {{$outMoney->amount}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Cost :</span> 
                                                                <span class="sender">$ {{$outMoney->cost}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mb-1">
                                                            <div class="col-12">
                                                                <span class="font-size-16 fw-bold">Address :</span> 
                                                                <span class="sender">{{$outMoney->future->address}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Date :</span> 
                                                                <span class="sender">{{$outMoney->created_at}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <span class="font-size-20 fw-bold">Notes </span>
                                                            </div>
                                                            <div class="col-12 px-4 mt-1">
                                                                <span class="sender">{{$outMoney->note}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">State :</span> 
                                                                <span class="sender text-success">{{$outMoney->state}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6"><span class="font-size-16 fw-bold">Tip :</span> <span class="sender text-success">sent delivered handed</span></div>
                                                        </div>  
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="accordion w-100 px-2 px-sm-5" id="accordionExample">
                        <h4 class='mt-5 mb-3'>Incoming  Money</h4>
                        @if($inComingRemittancesCount==0)
                            <div class='w-100 d-grid align-items-center justify-content-center'>
                                <img src="{{asset('images/money_empty.svg')}}" style='max-width:100px' class='m-auto'>
                                <div class='w-100 text-center text-danger font-size-20'>There are no remittances sent</div>
                            </div>
                        @else
                            @foreach($inComingMoney as $inTrans)
                                <div class="accordion w-100 px-2" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#incoming-money-{{$inTrans->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$inTrans->id .' '. $inTrans->future->fname .' '. $inTrans->future->lname}}
                                        </button>
                                        </h2>
                                        <div id="incoming-money-{{$inTrans->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                    <div class="header-order d-flex justify-content-between align-items-center">
                                                        <span class="font-size-20 fw-bold">Sender info</span>
                                                        <span>
                                                            <a href="index.php?order_id={{$inTrans->id}}" class="text-danger mx-2"><i class='bi bi-trash3-fill'></i></a>
                                                        </span>
                                                    </div>
                                                    <div class="container-fluid mt-2">
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Name :</span> 
                                                                <span class="sender">{{$inTrans->future->fname .' '. $inTrans->future->lname}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Phone :</span>
                                                                <span class="sender">{{$inTrans->future->phone}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Email :</span> 
                                                                <span class="sender">{{$inTrans->sender->email}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Cost :</span> 
                                                                <span class="sender">${{$inTrans->cost}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mb-1">
                                                            <div class="col-12">
                                                                <span class="font-size-16 fw-bold">Address :</span> 
                                                                <span class="sender">{{$inTrans->sender->address}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">Date :</span> 
                                                                <span class="sender">{{$inTrans->created_at}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <span class="font-size-20 fw-bold">Notes </span>
                                                            </div>
                                                            <div class="col-12 px-4 mt-1">
                                                                <span class="sender">{{$inTrans->note}}</span>
                                                            </div>
                                                        </div>  
                                                        <div class="row mt-3">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="font-size-16 fw-bold">State :</span> 
                                                                <span class="sender text-success">{{$inTrans->state}}</span>
                                                            </div>
                                                            <div class="col-12 col-lg-6"><span class="font-size-16 fw-bold">Tip :</span> <span class="sender text-success">sent delivered handed</span></div>
                                                        </div>  
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 px-5 px-md-4 col-lg-4 col-md-5 border py-3">
                <!-- Belance info -->
                <div class="item-box py-4">
                    <h6 class='title'>Current Balance</h6>
                    <table class="ms-4">
                        <tr>
                            <td><span class="">Current Balance</span></td>
                            <td class="ps-5 text-danger">$
                                <span class="current-balance-val">
                                    {{$balance}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="">Outgoing remittances</span></td>
                            <td class="ps-5 text-danger">$
                                <span class="current-balance-val">
                                    {{$outgoingRemittancesCost}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="">Incoming remittances</span></td>
                            <td class="ps-5 text-danger">$
                                <span class="current-balance-val">
                                        {{$incomingRemittancesCost}}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- request count -->
                <div class="item-box py-4">
                    <h6 class='title'>Parcel Requests</h6>
                    <table class="ms-4">
                        <tr class=""><td class="text-dark">Ordres goods</td></tr>
                        <tr>
                            <td>
                                <span class="ms-4 text-muted">
                                    Outgoing : {{$outGoingOrdersCount}}
                                </span>
                                <span class="outgoing-orders text-danger">
                                    
                                </span> 
                                <span class="ms-4 text-muted">
                                    Incoming : {{$inComingOrdersCount}}
                                </span>
                                <span class="incoming-requests text-danger">
                                    
                                </span>
                            </td>
                        </tr>
                    </table>
                    <table class="ms-4 mt-2">
                        <tr class=""><td class="text-dark">Money Transfer</td></tr>
                        <tr>
                            <td>
                                <span class="ms-4 text-muted">
                                    Outgoing : {{count(auth()->user()->outGoingTrans)}}
                                </span>
                                <span class="outgoing-orders text-danger">
                                    
                                </span> 
                                <span class="ms-4 text-muted">
                                    Incoming : {{count(auth()->user()->outGoingTrans)}}
                                </span>
                                <span class="incoming-requests text-danger">
                                    
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- account info -->
                <div class="item-box py-4">
                    <h6 class='title'>Account</h6>
                    <table class="ms-4">
                        <tr>
                            <td><span class="">User Name</span></td>
                            <td class="ps-5">
                                <span class="user-name text-danger">
                                    {{$user->fname}}
                                    {{$user->lname}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="">Email</span></td>
                            <td class="ps-5">
                                <span class="user-email text-danger">
                                    {{$user->email}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="">Phone </span></td>
                            <td class="ps-5">
                                <span class="user-phone text-danger">
                                    {{$user->phone}}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="">Address </span></td>
                            <td class="ps-5">
                                <span class="address text-danger">
                                    {{$user->address}}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.footer')