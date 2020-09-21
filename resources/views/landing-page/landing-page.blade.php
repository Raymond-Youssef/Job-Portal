
@extends('layouts.app')

@section('content')
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.search-field{
  height:50px;
  padding:10px;
  border:none;
  border-raduis:25px;
  outline:none;
}
.job{
  width:300px;

}
.location{
  width:100px;

}


</style>
</head>
<body>
<section id="hero" class="clearfix">
    <div class="container d-flex h-100">

      <div class="row justify-content-center align-self-center" data-aos="fade-up">
        <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
          <!-- <span><h5>Your Job Search Engine</h5></span> -->

          <br><h2>Find Best Job From Top Companies</h2>
          <br>
          <div>
          <form>


          <input type ="text" class="search-field job" placeholder="job title,company name..">
          <input type ="text" class="search-field location" placeholder="location">
         
          <a href="#about" class="btn-get-started scrollto">search</a>
          </form>
          </div>


        </div>

        <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/features-1.svg" class="img-fluid" alt="">
      </div>

    </div>
    </div>
  </section><!-- End Hero -->


  <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <!-- <header class="section-header">
          <h3>Services</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
        </header> -->

        <div class="row">

          <div class="col-md-6 col-lg-3 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon" style="background: #fceef3;"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Jobs By Function</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <div class="icon" style="background: #fff0da;"><i class="ion-ios-bookmarks-outline" style="color: #e98e06;"></i></div>
              <h4 class="title"><a href="">Jobs By Company</a></h4>
            </div>
          </div>
          <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="box">
              <div class="icon" style="background: #e6fdfc;"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Jobs By Industry</a></h4>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 wow" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <div class="icon" style="background: #eafde7;"><i class="fa fa-map-marker" style="font-size:36px"></i></i></div>
              <h4 class="title"><a href="">Jobs By Location</a></h4>
            </div>
          </div>


        </div>

      </div>

      </div>
    </section><!-- End Services Section -->

  </body>
  </html>
@endsection
