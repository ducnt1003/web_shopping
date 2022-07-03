@extends('main')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Checkout</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="page-wrapper">
    <div class="checkout shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="block billing-details">
                        @include('alert.alert')
                        @if(count($products)!=0)
                            <h4 class="widget-title">Billing Details</h4>
                        @else
                            <h4 class="widget-title">Customer Register</h4>
                        @endif
                        @if(Auth::User())
                        @endif
                        <form method="post" class="checkout-form">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="name" class="form-control" id="full_name"
                                value = "{{Auth::User()?Auth::User()->name:''}}"  required>
                            </div>
                            <div class="form-group">
                                <label for="user_country">Email</label>
                                <input type="text" name="email" class="form-control" id="email" 
                                value = "{{Auth::User()?Auth::User()->email:''}}"required>
                            </div>
                            <div class="form-group">
                                <label for="user_country">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" 
                                value = "{{Auth::User()?Auth::User()->phone:''}}"required>
                            </div>
                            <div class="form-group">
                                <label for="user_address">Address</label>
                                <input type="text" name="address" class="form-control" id="user_address" 
                                value = "{{Auth::User()?Auth::User()->adress:''}}"required>
                            </div>
                            @foreach($products as $key=>$product)
                            <div class="form-group">
                                <input type="hidden" name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">
                            </div>
                            @endforeach
                            @if(count($products)!=0)
                            <button class="btn btn-main mt-20">Place Order</button >
                            @else
                                <button class="btn btn-main mt-20">Register</button >
                            @endif
                            @csrf
                        </form>
                    </div>
                </div>
                @if(count($products)!=0)
                <div class="col-md-4">
                    <div class="product-checkout-details">
                        <div class="block">
                            @php $total = 0; @endphp
                            <h4 class="widget-title">Order Summary</h4>
                            @foreach($products as $key=>$product)
                                @php
                                    $endprice  = $product->price * $carts[$product->id];
                                    $total += $endprice;
                                @endphp
                            <div class="media product-card">
                                <a class="pull-left" href="{{route('product',$product->id)}}">
                                    <img class="media-object" src="{{$product->photo}}" alt="{{$product->name}}" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{route('product',$product->id)}}">{{$product->name}}</a></h4>
                                    <p class="price">{{$carts[$product->id]}} x ${{number_format($product->price)}}</p>
                                </div>
                            </div>
                            @endforeach
                            <ul class="summary-prices">
                                <li>
                                    <span>Subtotal:</span>
                                    <span class="price">$ {{ number_format($total) }}</span>
                                </li>
                                <li>
                                    <span>Shipping:</span>
                                    <span>Free</span>
                                </li>
                            </ul>
                            <div class="summary-total">
                                <span>Total</span>
                                <span>$ {{ number_format($total) }}</span>
                            </div>
                            <div class="verified-icon">
                                <img src="template/web/images/shop/verified.png">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
