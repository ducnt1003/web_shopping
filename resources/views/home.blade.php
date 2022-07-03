@extends('main')
@section('content')
<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(/template/web/images/slider/slider-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(/template/web/images/slider/slider-3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-left">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-category section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center">
                    <h2>Product Category</h2>
                </div>
            </div>
            <div class="col-md-6">
                @foreach($categories12 as $category12)
                <div class="category-box">
                    <a href="{{route('shop',$category12->id)}}">
                        <img src="{{ asset($category12->photo ? $category12->photo : '/template/images/shop/category/category-1.jpg') }}"></a>
                        <div class="content">
                            <h3>{{$category12->name}}</h3>
                            <p>{{$category12->description}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <div class="category-box category-box-2">
                    <a href="{{route('shop',$category3->id)}}">
                        <img src="{{ asset($category3->photo ? $category3->photo : '/template/images/shop/category/category-3.jpg') }}"></a>
                        <img src="{{$category3->photo}}" alt="{{$category3->name}}" />
                        <div class="content">
                            <h3>{{$category3->name}}</h3>
                            <p>{{$category3->description}}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products section bg-gray">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>Trendy Products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="{{ asset($product->photo ? $product->photo : '/template/images/shop/products/product-1.jpg') }}" alt="product-img" />
                    </div>
                    <div class="product-content">
                        <h4><a href="{{route('product',$product->id)}}">{{$product->name}}</a></h4>
                        <p class="price">{!! \App\Helpers\Helper::price($product->price) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach


            <!-- Modal -->
            <div class="modal product-modal fade" id="product-modal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tf-ion-close"></i>
                </button>
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="modal-image">
                                        <img class="img-responsive" src="/template/web/images/shop/products/modal-product.jpg" alt="product-img" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="product-short-details">
                                        <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                        <p class="product-price">$200</p>
                                        <p class="product-short-description">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
                                        </p>
                                        <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                        <a href="product-single.html" class="btn btn-transparent">View Product Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->

        </div>
    </div>
</section>
@stop
