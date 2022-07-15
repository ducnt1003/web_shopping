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
                        {{-- <div id="map"></div> --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6409443025927!2d105.84094731473104!3d21.007025286010165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2sHanoi%20University%20of%20Science%20%26%20Technology%20(HUST)!5e0!3m2!1sen!2s!4v1657644401504!5m2!1sen!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
@section('js')

      
@stop