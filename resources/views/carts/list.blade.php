@extends('main')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Cart</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="page-wrapper">
    <div class="cart shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="block">
                        <div class="product-list">
                            @if(count($products)!=0)
                            <form method="post">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="">Item Name</th>
                                        <th class="">Item Price</th>
                                        <th class="">Quantity</th>
                                        <th class="">Total</th>
                                        <th class="">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key => $product )
                                        @php
                                            $priceEnd = $product->price * $carts[$product->id];
                                        @endphp
                                    <tr class="">
                                        <td class="">
                                            <div class="product-info">
                                                <img width="80" src="{{$product->photo}}" alt="{{$product->name}}" />
                                                <a href="{{route('product',$product->id)}}">{{$product->name}}</a>
                                            </div>
                                        </td>
                                        <td class="">{{number_format($product->price)}}</td>
                                        <td style="width: 10px">
                                            <input name="num_product[{{$product->id}}]" type="number" value="{{$carts[$product->id]}}">
                                        </td>
                                        <td class="">{{number_format($priceEnd)}}</td>
                                        <td class="">
                                            <a class="product-remove" href="{{route('delete-cart',$product->id)}}">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a style="margin-left: 30px" href="{{route('checkout')}}" class="btn btn-main pull-right">Checkout</a>
                                <input type="submit" value="Update Cart" class="btn btn-main pull-right" formaction="{{route('update-cart')}}">
                                @csrf
                            </form>
                            @else
                            <div class="text-center"><h2>Empty Cart</h2></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
