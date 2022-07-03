@extends('main')
@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Contact Us</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="page-wrapper">
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <!-- Contact Details -->
                <div class="contact-details col-md-6 " >
                    <div class="google-map">
                        <div id="map"></div>
                    </div>
                </div>
                <ul class="contact-short-info" >
                    <li>
                        <i class="tf-ion-ios-home"></i>
                        <span>1 Đại Cồ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội</span>
                    </li>
                    <li>
                        <i class="tf-ion-android-phone-portrait"></i>
                        <span>Phone: 0129- 12323-123123</span>
                    </li>
                    <li>
                        <i class="tf-ion-android-mail"></i>
                        <span>Email: rhust.app@gmail.com</span>
                    </li>
                </ul>
                <!-- Footer Social Links -->
                <div class="social-icon">
                    <ul>
                        <li><a class="fb-icon" href="https://www.facebook.com/themefisher"><i class="tf-ion-social-facebook"></i></a></li>
                        <li><a href="https://www.twitter.com/themefisher"><i class="tf-ion-social-twitter"></i></a></li>
                        <li><a href="https://themefisher.com/"><i class="tf-ion-social-dribbble-outline"></i></a></li>
                        <li><a href="https://themefisher.com/"><i class="tf-ion-social-googleplus-outline"></i></a></li>
                        <li><a href="https://themefisher.com/"><i class="tf-ion-social-pinterest-outline"></i></a></li>
                    </ul>
                </div>
                <!-- / End Contact Details -->



            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>
</section>


@stop
