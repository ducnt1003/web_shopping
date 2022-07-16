@extends('main')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">About Us</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="active">about us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="template/web/images/about/about.jpg">
                </div>
                <div class="col-md-6">
                    <h2 class="mt-40">About Our Project</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius enim, accusantium repellat ex autem numquam iure officiis facere vitae itaque.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam qui vel cupiditate exercitationem, ea fuga est velit nulla culpa modi quis iste tempora non, suscipit repellendus labore voluptatem dicta amet?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam qui vel cupiditate exercitationem, ea fuga est velit nulla culpa modi quis iste tempora non, suscipit repellendus labore voluptatem dicta amet?</p>
                </div>
            </div>
        </div>
    </section>
    <section class="team-members ">
        <div class="container">
            <div class="row">
                <div class="title"><h2>Team Members</h2></div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="template/web/images/team/images.jpg">
                        <h4>Thành Long</h4>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="template/web/images/team/images1.jpg
                        ">
                        <h4>Trung Đức </h4>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="template/web/images/team/images5.jpg
                        ">
                        <h4>Nguyễn Ngân</h4>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="template/web/images/team/images2.jpg
                        ">
                        <h4>Hoàng Sơn</h4>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle"src="template/web/images/team/images3.jpg
                        ">
                        <h4>Thủy Linh</h4>
                        <p>Developer</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member text-center">
                        <img class="img-circle" src="template/web/images/team/images4.jpg
                        ">
                        <h4>Bích Trang</h4>
                        <p>Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
