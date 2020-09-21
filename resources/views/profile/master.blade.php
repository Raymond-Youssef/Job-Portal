@extends('layouts.app')
@section('content')
<style>
img{
    width:400px;

}
</style>
<!-- Page Preloder -->
<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section start -->
	

	<!-- Hero section start -->
	<section class="hero-section spad">
		<div class="container">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-6">
							<div class="hero-text">
								<h2>{{ Auth::user()->name }}</h2>
							</div>
							<div class="hero-info">
								<h2>personal Info</h2>
								<ul>
									<li><span>Date of Birth: </span>{{ Auth::user()->birth_date }}</li>
									<li><span>Address: </span> {{ Auth::user()->address }}</li>
									<li><span>E-mail: </span> {{ Auth::user()->email }}</li>
									<li><span>Phone:  </span> {{ Auth::user()->phone }}</li>
								</ul>
							</div>
                            <a href="{{ route('edit') }}"  class="btn btn-info" role="button">Edit Info</a>						</div>
						<div class="col-lg-4">
							<figure class="hero-image">
								<img src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" alt="5">
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->





@endsection