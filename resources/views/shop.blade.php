
@extends('main')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">{{$title}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products section">
    <div class="container">
            <div class="col-md-3">
                <div class="widget">
                    <h4 class="widget-title">Short By</h4>
{{--                        <select class="form-control" onchange="location = this.value;">--}}
{{--                            <option value="{{request()->url()}}">Default</option>--}}
{{--                            <option value="{{request()->fullUrlWithQuery(['price'=>'asc'])}} " >Price: Low to High</option>--}}
{{--                            <option value="{{request()->fullUrlWithQuery(['price'=>'desc'])}} ">Price: High to Low</option>--}}
{{--                        </select>--}}
                    @php
                        $f = request()->input('f',false);
                    @endphp
                    <select class="form-control" id = "filters">
                        <option @if('id' == $f) selected="selected" @endif value="id" >Default</option>
                        <option @if('name' == $f) selected="selected" @endif value="name">Name</option>
                        <option @if('asc' == $f) selected="selected" @endif value="asc">Price: Low to High</option>
                        <option @if('desc' == $f) selected="selected" @endif value="desc">Price: High to Low</option>
                    </select>
                </div>
                <div class="widget product-category">
                    <h4 class="widget-title">Categories</h4>
                    <div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{$cate_parent1->name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="{{route('shop',$cate_parent1->id)}}">{{$cate_parent1->name}}</a></li>
                                    @foreach($cate_childs1 as $cate_child1)
                                        <li><a href="{{route('shop',$cate_child1->id)}}">{{$cate_child1->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{$cate_parent2->name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="{{route('shop',$cate_parent2->id)}}">{{$cate_parent2->name}}</a></li>
                                        @foreach($cate_childs2 as $cate_child2)
                                            <li><a href="{{route('shop',$cate_child2->id)}}">{{$cate_child2->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{$cate_parent3->name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="{{route('shop',$cate_parent3->id)}}">{{$cate_parent3->name}}</a></li>
                                        @foreach($cate_childs3 as $cate_child3)
                                            <li><a href="{{route('shop',$cate_child3->id)}}">{{$cate_child3->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="{{$product->photo}}" alt="{{$product->name}}" />
                            </div>
                            <div class="product-content">
                                <h4><a href="{{route('product',$product->id)}}">{{$product->name}}</a></h4>
                                <p class="price">{!! \App\Helpers\Helper::price($product->price) !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        <div class="card-footer clearfix">
                            {{$products->links('vendor.pagination.bootstrap-4')}}
                        </div>
                </div>
            </div>

        </div>
    </div>
</section>

@stop
@section('js')
    <script type="text/javascript">
        (function (){
            'use strict';
            $('#filters').change(function (){
                var url = window.location.pathname;
                url += '?f=';
                url += $(this).val();
                window.location.href = url;
            });
        })();
    </script>
@stop
