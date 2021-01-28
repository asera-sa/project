
<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll " style="background-color:#394263;">
			<div class="main-sidebar-header active">
				<h6 class="desktop-logo logo-light active" href="{{ url('/') }}">	
					 
				{{-- <img src="{{URL::asset('assets/img/brand/FB_IMG_16036473473015886.JPG')}}" class="main-logo" alt="logo"> --}}
				</h6>
			</div>
			<div class="main-sidemenu" >
				<div class="app-sidebar__user clearfix ">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/brand/user.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info ">
							<h4 class="font-weight-semibold mt-3 mb-0 text-white">اسم المستخدم </h4>
							<span class="mb-0 text-muted  text-white"> {{auth()->user()->name}}</span>
						</div>
					</div>
				</div>
				@if(auth()->user()->prive == 0)
				<ul class="side-menu" >
					<li class="slide">
						<a class="side-menu__item  text-white " href="{{ url('/admin/homeAdmin') }}">
							<i class="fa fa-th ml-3"></i>
							<span class="side-menu__label  text-white" >الرئيسية</span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item  text-white " data-toggle="slide" href="{{ url('/' . $page='#') }}">
							    <i class="fa fa-list ml-3 "></i>
								 <span class="side-menu__label  text-white ">الصالات</span>
								 <i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu ">
							<li><a class="slide-item  text-white " href="{{url('/admin/halls/create') }}"> صالة جديد </a></li>
							<li><a class="slide-item  text-white " href="{{url('/admin/halls') }}"> إدارة صالات </a></li>
						</ul>
					</li>				
				    <li class="slide">
					    <a class="side-menu__item  text-white" href="{{url('admin/messages')}}">
							<i class="fa fa-comment ml-3 "></i>
					       <span class="side-menu__label  text-white ">المراسلات </span>
				        </a>
				    </li>
				    <li class="slide">
					    <a class="side-menu__item  text-white" href="{{url('admin/setting')}}">
					    	<i class="fa fa-comment ml-3 "></i>
					       <span class="side-menu__label  text-white ">إعدادات النظام</span>
					    </a>
			        </li>
				</ul>
				@endif

				@if(auth()->user()->prive == 1)
				<ul class="side-menu" >
					<li class="slide">
						<a class="side-menu__item  text-white " href="{{ url('/admin') }}">
							<i class="fa fa-th ml-3"></i>
							<span class="side-menu__label  text-white" >الرئيسية</span>
						</a>
					</li>

					<li class="slide">
						<a class="side-menu__item  text-white " data-toggle="slide" href="{{ url('/' . $page='#') }}">
							    <i class="fa fa-list ml-3 "></i>
								 <span class="side-menu__label  text-white ">الحجوزات</span>
								 <i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu ">
							<li><a class="slide-item  text-white " href="{{ url('/admin/reservation/create') }}"> حجز جديد </a></li>
							<li><a class="slide-item  text-white " href="{{ url('/admin/reservation') }}"> إدارة الحجوزات </a></li>
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item  text-white " data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<i class="fa fa-users ml-3"></i>
							<span class="side-menu__label  text-white ">العملاء</span>
							<i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu ">
							<li><a class="slide-item  text-white " href="{{ url('/admin/customer/create') }}"> عميل جديد </a></li>
							<li><a class="slide-item  text-white " href="{{ url('/admin/customer') }}"> إدارة العملاء </a></li>
						</ul>
					</li>
					
					<li class="slide">
						<a class="side-menu__item  text-white " data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<i class="fa fa-users ml-3"></i>
							<span class="side-menu__label  text-white ">الموظفين</span>
							<i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu ">
							<li><a class="slide-item  text-white " href="{{ url('/admin/employees/create') }}"> موظف جديد </a></li>
							<li><a class="slide-item  text-white " href="{{ url('/admin/employees') }}"> إدارة الموظفين </a></li>
						</ul>
					</li>

					<li class="slide">
						<a class="side-menu__item  text-white " data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<i class="fa fa-users ml-3"></i>
								 <span class="side-menu__label  text-white ">المستخدمين</span>
								 <i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu ">
							<li><a class="slide-item  text-white " href="{{ url('/admin/User/create') }}"> مستخدم جديد </a></li>
							<li><a class="slide-item  text-white " href="{{ url('/admin/User') }}"> إدارة المستخدمين </a></li>
						</ul>
					</li>

					<li class="slide">
						<a class="side-menu__item text-white" data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<i class="fa fa-list ml-3"></i>
							<span class="side-menu__label  text-white ">بيانات الصالة</span>
								 <i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu">
							<?php $id = auth()->user()->halls_id ;?>
							<li><a class="slide-item text-white" href="{{url('/admin/halls/'.$id)}}"> بيانات الصالة </a></li>
							<li><a class="slide-item text-white" href="{{ url('/admin/hallServies') }}"> خدمات الصالة </a></li>
							<li><a class="slide-item text-white" href="{{ url('/admin/hallOccasions') }}"> مناسبات الصالة </a></li>
							<li><a class="slide-item text-white" href="{{ url('/admin/news') }}"> الإعلانات </a></li>
							<li><a class="slide-item text-white" href="{{ url('/admin/pic') }}"> صور الموقع </a></li>
						</ul>
					</li>
					
        			<li class="slide">
        		      	<a class="side-menu__item  text-white" href="{{url('admin/report')}}">
        		    		<i class="fas fa-clipboard-list  ml-3 "></i>
        		    		<span class="side-menu__label  text-white ">التقارير </span>
        		    	</a>
				   </li>
				  
				   <li class="slide">
					    <a class="side-menu__item  text-white" href="{{url('/admin/messages')}}">
							<i class="fa fa-comment ml-3 "></i>
					       <span class="side-menu__label  text-white ">المراسلات </span>
				        </a>
				   </li>
				</ul>
				@endif


				@if(auth()->user()->prive == 2)
				<ul class="side-menu" >
					<li class="slide">
						<a class="side-menu__item  text-white " href="{{ url('/admin') }}">
							<i class="fa fa-th ml-3"></i>
							<span class="side-menu__label  text-white" >الرئيسية</span>
						</a>
					</li>

					<li class="slide">
						<a class="side-menu__item  text-white " data-toggle="slide" href="{{ url('/' . $page='#') }}">
							    <i class="fa fa-list ml-3 "></i>
								 <span class="side-menu__label  text-white ">الحجوزات</span>
								 <i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu ">
							<li><a class="slide-item  text-white " href="{{ url('/admin/reservation/create') }}"> حجز جديد </a></li>
							<li><a class="slide-item  text-white " href="{{ url('/admin/reservation') }}"> إدارة الحجوزات </a></li>
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item  text-white " data-toggle="slide" href="{{ url('/' . $page='#') }}">
							<i class="fa fa-users ml-3"></i>
							<span class="side-menu__label  text-white ">العملاء</span>
							<i class="angle fe fe-chevron-down "></i>
						</a>
						<ul class="slide-menu ">
							<li><a class="slide-item  text-white " href="{{ url('/admin/customer/create') }}"> عميل جديد </a></li>
							<li><a class="slide-item  text-white " href="{{ url('/admin/customer') }}"> إدارة العملاء </a></li>
						</ul>
					</li>
					
        			<li class="slide">
        		      	<a class="side-menu__item  text-white" href="{{url('admin/report')}}">
        		    		<i class="fas fa-clipboard-list  ml-3 "></i>
        		    		<span class="side-menu__label  text-white ">التقارير </span>
        		    	</a>
				   </li>
				  
				
				</ul>
				@endif

			</div>
		</aside>
<!-- main-sidebar -->
