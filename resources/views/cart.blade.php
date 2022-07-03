<li class="dropdown cart-nav dropdown-slide">
    <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
            class="tf-ion-android-cart"></i>Cart</a>
    <div class="dropdown-menu cart-dropdown">


        @if(!empty($carts))
            @php
                $total = 0
            @endphp
            @foreach($products as $key => $product)
                @php
                   $endprice = $product->price * $carts[$product->id];
                    $total += $endprice;
                @endphp
            <div class="media">
            <a class="pull-left" href="{{route('product',$product->id)}}">
                <img class="media-object" src="{{$product->photo}}" alt="{{$product->name}}" />
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="{{route('product',$product->id)}}">{{$product->name}}</a></h4>
                <div class="cart-price">
                    <span>{{$carts[$product->id]}} x</span>
                    <span>{{number_format($product->price)}}</span>
                </div>
                <h5><strong>${{number_format($endprice)}}</strong></h5>
            </div>
            <a href="{{route('delete-cart',$product->id)}}" class="remove"><i class="tf-ion-close"></i></a>
                @endforeach
        </div>


        <div class="cart-summary">
            <span>Total</span>
            <span class="total-price">${{number_format($total)}}</span>
        </div>
                @endif
        <ul class="text-center cart-buttons">
            <li><a href="{{route('cart')}}" class="btn btn-small">View Cart</a></li>
            <li><a href="{{route('checkout')}}" class="btn btn-small btn-solid-border">Checkout</a></li>
        </ul>
    </div>

</li><!-- / Cart -->
