<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item" style="background-color:#394263;">
				<div class="container-fluid " >
					<div class="main-header-left">
						<div class="app-sidebar__toggle " data-toggle="sidebar">
							<a class="open-toggle  text-white " href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle  text-white " href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
					</div>
					<div class="main-header-right " >
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>
	
							<div class="nav-item full-screen fullscreen-button ">
								<a class="new nav-link full-screen-link " href="#"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs  text-white " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>

							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex  text-white " href=""><img alt="" src="{{URL::asset('assets/img/brand/user.jpg')}}"></a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-secondary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/brand/user.jpg')}}"></div>
											<div class="mr-3 my-auto">
												<h6>Asera </h6>
											</div>
										</div>
									</div>
								    <a class="dropdown-item" href="{{url('/')}}"><i class="bx bx-cog"></i> الموقع </a>
							     	<a class="dropdown-item" href="{{url('User/'.auth()->user()->id)}}"><i class="bx bx-user-circle"></i>الصفحة الشخصية</a>
									<a class="dropdown-item" href="{{url('User/'.auth()->user()->id).'/edit'}}"><i class="bx bx-cog"></i>  تغيير كلمة السر </a>
									<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>الرسائل</a>
									<a class="dropdown-item" href="{{ url('logout') }}"
				                                onclick="event.preventDefault();
												  document.getElementById('logout-form').submit();">
										 <i class="bx bx-log-out"></i>

											تسجيل الخروج 
									</a>
				 
								    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
								   	 @csrf
								    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<!-- /main-header -->
