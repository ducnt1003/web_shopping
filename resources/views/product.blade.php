@extends('main')
@section('content')
<section class="single-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('shop',$category->id)}}">{{$category->name}}</a></li>
                    <li class="active">{{$title}}</li>
                </ol>
            </div>

        </div>
        <div class="row mt-20">
            <div class="col-md-5">
                <div class="single-product-slider">
                    <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                        <div class='carousel-outer'>
                            <!-- me art lab slider -->
                            <div class='carousel-inner '>
                                <div class='item active'>
                                    <a href="{{$product->photo}}" target="_blank">
                                        <img src='/template/web/images//shop/single-products/product-1.jpg'  alt='' data-zoom-image="{{$product->name}}" />
                                    </a>
                                </div>
                                <div class='item'>
                                    <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' data-zoom-image="/template/web/images//shop/single-products/product-2.jpg" />
                                </div>

                                <div class='item'>
                                    <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' data-zoom-image="/template/web/images//shop/single-products/product-3.jpg" />
                                </div>
                                <div class='item'>
                                    <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' data-zoom-image="/template/web/images//shop/single-products/product-4.jpg" />
                                </div>
                                <div class='item'>
                                    <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' data-zoom-image="/template/web/images//shop/single-products/product-5.jpg" />
                                </div>
                                <div class='item'>
                                    <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' data-zoom-image="/template/web/images//shop/single-products/product-6.jpg" />
                                </div>

                            </div>

                            <!-- sag sol -->
                            <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                <i class="tf-ion-ios-arrow-left"></i>
                            </a>
                            <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                <i class="tf-ion-ios-arrow-right"></i>
                            </a>
                        </div>

                        <!-- thumb -->
                        <ol class='carousel-indicators mCustomScrollbar meartlab'>
                            <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                                <img src='/template/web/images//shop/single-products/product-1.jpg' alt='{{$product->name}}' />
                            </li>
                            <li data-target='#carousel-custom' data-slide-to='1'>
                                <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' />
                            </li>
                            <li data-target='#carousel-custom' data-slide-to='2'>
                                <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' />
                            </li>
                            <li data-target='#carousel-custom' data-slide-to='3'>
                                <img src='/template/web/images//shop/single-products/product-1.jpg' alt='' />
                            </li>
                            <li data-target='#carousel-custom' data-slide-to='4'>
                                <img src='/template/web/images//shop/single-products/product-5.jpg' alt='' />
                            </li>
                            <li data-target='#carousel-custom' data-slide-to='5'>
                                <img src='/template/web/images//shop/single-products/product-6.jpg' alt='' />
                            </li>
                            <li data-target='#carousel-custom' data-slide-to='6'>
                                <img src='/template/web/images//shop/single-products/product-7.jpg' alt='' />
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-details">
                    <h2>{{$product->name}}</h2>
                    <p class="product-price">{!! \App\Helpers\Helper::price($product->price) !!}</p>

                    {{-- <p class="product-description mt-20">--}}
                    {{-- {{$product->description}}--}}
                    {{-- </p>--}}
                    <div class="product-category">
                        <span>Brand:</span>
                        <ul>
                            {{-- <li><a href="#">{{$product->brand->name}}</a></li>--}}
                        </ul>
                    </div>

                    <div class="product-category">
                        <span>Categories:</span>
                        <ul>
                            <li><a href="{{route('shop',$category->id)}}">{{$category->name}}</a></li>
                        </ul>
                    </div>
                    <div class="product-category">
                        <span>Color:</span>
                        <ul>
                            <li>{{$product->color}}</li>
                        </ul>
                    </div>

                    <form action="/add-cart" method="post">
                        @if($product->price !== NULL)
                        <div class="product-quantity">
                            <span>Quantity:</span>
                            <div class="product-quantity-slider">
                                <input id="product-quantity" type="number" value="1" name="product-quantity">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-main mt-20">Add To Cart</button>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        @endif
                        @csrf
                    </form>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="tabCommon mt-20">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
                    </ul>
                    <div class="tab-content patternbg">
                        <div id="details" class="tab-pane fade active in">
                            <h4>Product Description</h4>
                            <p>{{$product->description}}</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis delectus quidem repudiandae veniam distinctio repellendus magni pariatur molestiae asperiores animi, eos quod iusto hic doloremque iste a, nisi iure at unde molestias enim fugit, nulla voluptatibus. Deserunt voluptate tempora aut illum harum, deleniti laborum animi neque, praesentium explicabo, debitis ipsa?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="products related-products section">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>You May Also Like</h2>
            </div>
        </div>
        <div class="row">
            @foreach($products_related as $product_related)
            <div class="col-md-3">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="{{$product_related->photo}}" alt="product-img" />
                        <div class="preview-meta">
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="{{route('product',$product_related->id)}}">{{$product_related->name}}</a></h4>
                        <p class="price">{!! \App\Helpers\Helper::price($product_related->price) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal product-modal fade" id="product-modal">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i class="tf-ion-close"></i>
    </button>
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="modal-image">
                            <img class="img-responsive" src="/template/web/images//shop/products/modal-product.jpg" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-short-details">
                            <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                            <p class="product-price">$200</p>
                            <p class="product-short-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
                            </p>
                            <a href="#!" class="btn btn-main">Add To Cart</a>
                            <a href="#!" class="btn btn-transparent">View Product Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop