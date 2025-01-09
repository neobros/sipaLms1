<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<link rel="icon" href="/admin/assets/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/admin/assets/css/style.css">
	<link rel="stylesheet" href="/simple-datatables/style.css">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div ">

				<ul class="nav pcoded-inner-navbar ">

					<li class="nav-item  @if(\Request::is('admin/dashboard')) active @endif">
						<a href="/admin/dashboard" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>



					<li class="nav-item pcoded-hasmenu @if(\Request::is('/admin/subjectManagement*')) active pcoded-trigger @endif ">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Subjects Management</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -86.5px; left: -6px;"></span></a>
					    <ul class="pcoded-submenu">
					    	<li><a href="/admin/subjectManagement/addSubjects">Add / View Subjects</a></li>
					        <!-- <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li> -->
					    </ul>
					</li>


					
					<li class="nav-item pcoded-hasmenu @if(\Request::is('/admin/studentManagement*')) active pcoded-trigger @endif ">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Students Management</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -86.5px; left: -6px;"></span></a>
					    <ul class="pcoded-submenu">
					    	<li><a href="/admin/studentManagement/studentList">Student List</a></li>
					        <!-- <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li> -->
					    </ul>
					</li>

					<li class="nav-item pcoded-hasmenu @if(\Request::is('/admin/teachersManagement*')) active pcoded-trigger @endif ">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Teachers Management</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -86.5px; left: -6px;"></span></a>
					    <ul class="pcoded-submenu">
						    <li><a href="/admin/teachersManagement/newTeachersList">New Teachers List</a></li>
					    	<li><a href="/admin/teachersManagement/teachersList">Teachers List</a></li>
					        <!-- <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li> -->
					    </ul>
					</li>


					
					<li class="nav-item pcoded-hasmenu @if(\Request::is('/admin/timeManagement*')) active pcoded-trigger @endif ">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Time Management</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -86.5px; left: -6px;"></span></a>
					    <ul class="pcoded-submenu">
						    <li><a href="/admin/timeManagement/addTimeSlot">Add Time Slot</a></li>
					    	<li><a href="/admin/timeManagement/timeSlotList">Time Slot List</a></li>
					        <!-- <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li> -->
					    </ul>
					</li>


					<li class="nav-item pcoded-hasmenu @if(\Request::is('/admin/advertisementManagement*')) active pcoded-trigger @endif ">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Advertisement</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -86.5px; left: -6px;"></span></a>
					    <ul class="pcoded-submenu">
						    <li><a href="/admin/advertisementManagement/newAdvertisement">New Advertisement</a></li>
					    	<li><a href="/admin/advertisementManagement/advertisementList">Advertisement List</a></li>
					        <!-- <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li> -->
					    </ul>
					</li>


					<li class="nav-item pcoded-hasmenu @if(\Request::is('/admin/classManagement*')) active pcoded-trigger @endif ">
					    <a href="#!" class="nav-link has-ripple"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Class Management</span><span class="ripple ripple-animate" style="height: 210px; width: 210px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -86.5px; left: -6px;"></span></a>
					    <ul class="pcoded-submenu">
						    <li><a href="/admin/classManagement/classesList/physical">Physical Science Classes List</a></li>
							<li><a href="/admin/classManagement/classesList/science">Science Classes List</a></li>
							<li><a href="/admin/classManagement/classesList/commerce">Commerce Classes List</a></li>
							<li><a href="/admin/classManagement/classesList/arts">Arts Classes List</a></li>
							<li><a href="/admin/classManagement/classesList/technology">Technology Classes List</a></li>
					    </ul>
					</li>



					<li class="nav-item  @if(\Request::is('add_movies')) active @endif">
						<a href="/add_movies" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-box"></i></span><span class="pcoded-mtext">View self-evaluation</span></a>
					</li>

					<li class="nav-item  @if(\Request::is('/admin/chat')) active @endif">
						<a href="/admin/chat" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-box"></i></span><span class="pcoded-mtext">Chat</span></a>
					</li>

					<form id="logout-form" action="/admin/logout" method="POST" style="display: none;">
										   @csrf
				   </form>

					<li class="nav-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-sidebar"></i></span><span class="pcoded-mtext">LOG
								OUT</span></a></li>

				</ul>
			</div>
		</div>
	</nav>

	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			<a href="#!" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<!-- <img src="/admin/assets/images/logo.png" alt="" class="logo">
						<img src="/admin/assets/images/logo-icon.png" alt="" class="logo-thumb"> -->
				<div>SIPSA ADMIN</div>
			</a>
		</div>
	</header>
	<!-- [ Header ] end -->


	@yield('content')

	<script src="/admin/assets/js/vendor-all.min.js"></script>
	<script src="/admin/assets/js/plugins/bootstrap.min.js"></script>
	<script src="/admin/assets/js/ripple.js"></script>
	<script src="/admin/assets/js/pcoded.min.js"></script>

	<!-- Apex Chart -->
	<script src="/admin/assets/js/plugins/apexcharts.min.js"></script>
	<script src="/simple-datatables/simple-datatables.js"></script>
	<script>
			let table1 = document.querySelector('#table_filter');
			let dataTable = new simpleDatatables.DataTable(table1);	
	</script>

	<!-- custom-chart js -->
	<script src="/admin/assets/js/pages/dashboard-main.js"></script>
</body>

</html>