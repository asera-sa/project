<!DOCTYPE html>
<html lang="ar">
	<head>
		<meta charset="UTF-8">
		{{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet"> --}}
		

		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
		@include('layouts.head')
		@stack('css')
	</head>
	<!-- The core Firebase JS SDK is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>
	<!-- TODO: Add SDKs for Firebase products that you want to use
		https://firebase.google.com/docs/web/setup#available-libraries -->
	<script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>

	<script>
		// Your web app's Firebase configuration
		// For Firebase JS SDK v7.20.0 and later, measurementId is optional
		var firebaseConfig = {
			apiKey: "AIzaSyBDv7ggQLtei3hWFwIA-71YCv6ti7nCGMQ",
			authDomain: "project2020-bf07f.firebaseapp.com",
			projectId: "project2020-bf07f",
			storageBucket: "project2020-bf07f.appspot.com",
			messagingSenderId: "114894085298",
			appId: "1:114894085298:web:2b86d4005455a467cbfdab",
			measurementId: "G-C5XZYN3WK5"
		};
		// Initialize Firebase
		firebase.initializeApp(firebaseConfig);
		firebase.analytics();
	</script>
	<body class="main-body app sidebar-mini">
		@include('sweetalert::alert')
		<!-- Loader -->
		<div id="global-loader">
			<img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		@include('layouts.main-sidebar')		
		<!-- main-content -->
		<div class="main-content app-content">
			@include('layouts.main-header')			
			<!-- container -->
			<div class="container-fluid">
				@yield('page-header')
				@yield('content')
				@include('layouts.models')
            	@include('layouts.footer')
				@include('layouts.footer-scripts')	
				@stack('js')
				
				<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-messaging.js"></script>
				<script>
					const messaging = firebase.messaging();
					// Add the public key generated from the console here.
					messaging.getToken({vapidKey: "BPzYnx2BJESIjeJXel5FkP-oxo8nS1F46pIUwn8FP5KzDlfx0OupXe4xnjq6evh2ZwFuDcwHEJPrQFEImU0nwWE"});
					
					// 3
					// للمستخدم عن طرق اجاكس token إعطاء 
					function sendTokenToUser(fcm_token) {
						$.post("/admin/save-fcmtoken", {
							_token : '{{ csrf_token() }}',
							user_id : '{{ auth()->user()->id }}',
							fcm_token
						}).then(resp => {
							console.log(resp);
						});
					} // End of sendTokenToUser
					
					// للمستخدم token إنشاء  
					// 2
					function retrieveToken() {

						messaging.getToken().then((currentToken) => {
						if (currentToken) {
							sendTokenToUser(currentToken);
						} else {
							// Show permission request UI
							console.log('No registration token available. Request permission to generate one.');
						}
						}).catch((err) => {
							console.log('An error occurred while retrieving token. ', err);
						});
					
					} // End of retrieveToken

					// 1
					retrieveToken();

					messaging.onTokenRefresh(() => {
						retrieveToken();
					});

					// عند إستقبال الرساله 
					// Send notificaion in website
					messaging.onMessage((payload) => {
						// alert(payload.notification.body);
						swal({
                            text: payload.notification.body,
                            icon: 'info',
                            buttons : false,
                            timer: 2000
                        });
						location.reload();
					});

				</script>
	</body>
</html>
