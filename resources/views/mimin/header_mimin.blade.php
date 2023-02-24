<!DOCTYPE html>
<html lang="en">

<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="title">
<meta name="author" content="Themesberg">
<meta name="description" content="Volt is a free and open source Bootstrap 5 Admin Dashboard featuring 11 example pages, 100 components and 3 plugins with Vanilla JS.">
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, free bootstrap 5 dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/volt">
<meta property="og:title" content="title">
<meta property="og:description" content="Volt is a free and open source Bootstrap 5 Admin Dashboard featuring 11 example pages, 100 components and 3 plugins with Vanilla JS.">
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-bootstrap-5-dashboard/volt-bootstrap-5-dashboard-preview.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/volt">
<meta property="twitter:title" content="title">
<meta property="twitter:description" content="Volt is a free and open source Bootstrap 5 Admin Dashboard featuring 11 example pages, 100 components and 3 plugins with Vanilla JS.">
<meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-bootstrap-5-dashboard/volt-bootstrap-5-dashboard-preview.jpg">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{assets('/img/favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="@@path/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="@@path/assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="@@path/assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="@@path/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Fontawesome -->
<link type="text/css" href="@@path/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="@@path/vendor/notyf/notyf.min.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="@@path/css/volt.css" rel="stylesheet">

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141734189-6');
</script>

</head>

<body>

<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none">
    <a class="navbar-brand mr-lg-5" href="@@path/index.html">
        <img class="navbar-brand-dark" src="@@path/assets/img/brand/light.svg" alt="Volt logo" /> <img class="navbar-brand-light" src="@@path/assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

        <div class="container-fluid bg-soft">
            <div class="row">
                <div class="col-12">

                <nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
      <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
        <div class="d-flex align-items-center">
          <div class="user-avatar lg-avatar mr-4">
            <img src="@@path/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
          </div>
          <div class="d-block">
            <h2 class="h6">Hi, Jane</h2>
            <a href="@@path/pages/examples/sign-in.html" class="btn btn-secondary text-dark btn-xs"><span class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out</a>
          </div>
        </div>
        <div class="collapse-close d-md-none">
            <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse"
                data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                aria-label="Toggle navigation"></a>
        </div>
      </div>
      <ul class="nav flex-column">
        <li class="nav-item @@if (context.page === 'overview') { active }">
          <a href="@@path/pages/dashboard/dashboard.html" class="nav-link">
            <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
            <span>Overview</span>
          </a>
        </li>
        <li class="nav-item @@if (context.page === 'transactions') { active }">
          <a href="@@path/pages/transactions.html" class="nav-link">
              <span class="sidebar-icon"><span class="fas fa-hand-holding-usd"></span></span>
              <span>Transactions</span>
          </a>
        </li>
        <li class="nav-item @@if (context.page === 'settings') { active }">
          <a href="@@path/pages/settings.html" class="nav-link">
              <span class="sidebar-icon"><span class="fas fa-cog"></span></span>
              <span>Settings</span>
          </a>
        </li>
        <li class="nav-item">
          <span class="nav-link @@if (context.page !== 'datatables' && context.page !== 'tables') { collapsed } d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-app">
            <span>
              <span class="sidebar-icon"><span class="fas fa-table"></span></span> 
              Tables
            </span>
            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span> 
          </span>
          <div class="multi-level collapse @@if (context.page === 'datatables' || context.page === 'tables') { show }" role="list" id="submenu-app" aria-expanded="false">
              <ul class="flex-column nav">
                  <li class="nav-item @@if (context.page === 'tables') { active }"><a class="nav-link" href="@@path/pages/tables/bootstrap-tables.html"><span>Bootstrap Tables</span></a></li>
              </ul>
          </div>
        </li>
        <li class="nav-item">
          <span class="nav-link @@if (context.page_group !== 'page_examples') { collapsed } d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-pages">
            <span>
              <span class="sidebar-icon"><span class="far fa-file-alt"></span></span> 
              Page examples
            </span>
            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span> 
          </span>
          <div class="multi-level collapse @@if (context.page_group === 'page_examples') { show }" role="list" id="submenu-pages" aria-expanded="false">
              <ul class="flex-column nav">
                  <li class="nav-item"><a class="nav-link" href="@@path/pages/examples/sign-in.html"><span>Sign In</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="@@path/pages/examples/sign-up.html"><span>Sign Up</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="@@path/pages/examples/forgot-password.html"><span>Forgot password</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="@@path/pages/examples/reset-password.html"><span>Reset password</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="@@path/pages/examples/lock.html"><span>Lock</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="@@path/pages/examples/404.html"><span>404 Not Found</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="@@path/pages/examples/500.html"><span>500 Server Error</span></a></li>
              </ul>
          </div>
        </li>
        <li class="nav-item">
          <span class="nav-link @@if (context.page_group !== 'components') { collapsed } d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-components">
            <span>
              <span class="sidebar-icon"><span class="fas fa-box-open"></span></span> 
              Components
            </span>
            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span> 
          </span>
          <div class="multi-level collapse @@if (context.page_group === 'components') { show }" role="list" id="submenu-components" aria-expanded="false">
              <ul class="flex-column nav">
                  <li class="nav-item @@if (context.page === 'buttons') { active }"><a class="nav-link" href="@@path/pages/components/buttons.html"><span>Buttons</span></a></li>
                  <li class="nav-item @@if (context.page === 'notifications') { active }"><a class="nav-link" href="@@path/pages/components/notifications.html"><span>Notifications</span></a></li>
                  <li class="nav-item @@if (context.page === 'forms') { active }"><a class="nav-link" href="@@path/pages/components/forms.html"><span>Forms</span></a></li>
                  <li class="nav-item @@if (context.page === 'modals') { active }"><a class="nav-link" href="@@path/pages/components/modals.html"><span>Modals</span></a></li>
                  <li class="nav-item @@if (context.page === 'typography') { active }"><a class="nav-link" href="@@path/pages/components/typography.html"><span>Typography</span></a></li>
              </ul>
          </div>
        </li>
        <li role="separator" class="dropdown-divider mt-4 mb-3 border-black"></li>
        <li class="nav-item">
          <a href="@@path/index.html" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <img src="@@path/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
            </span>
            <span class="mt-1">Volt Overview</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/getting-started/quick-start/" target="_blank" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon"><span class="fas fa-book"></span></span>
            <span>Quick Start</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard" target="_blank" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon"><span class="fas fa-rocket"></span></span>
            <span>Upgrade to Pro</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://themesberg.com" target="_blank" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <img src="@@path/assets/img/themesberg.svg" height="20" width="20" alt="Themesberg Logo">
            </span>
            <span>Themesberg</span>
          </a>
        </li>
      </ul>
    </div>
</nav>
            
                    <main class="content">

                    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark pl-0 pr-2 pb-0">
    <div class="container-fluid px-0">
      <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
        <div class="d-flex">
          <!-- Search form -->
          <form class="navbar-search form-inline" id="navbar-search-main">
            <div class="input-group input-group-merge search-bar">
                <span class="input-group-text" id="topbar-addon"><span class="fas fa-search"></span></span>
                <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
            </div>
          </form>
        </div>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link text-dark mr-lg-3 icon-notifications" data-unread-notifications="true" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon icon-sm">
                <span class="fas fa-bell bell-shake"></span>
                <span class="icon-badge rounded-circle unread-notifications"></span>
              </span>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-lg dropdown-menu-center mt-2 py-0">
              <div class="list-group list-group-flush">
                <a href="#" class="text-center text-primary font-weight-bold border-bottom border-light py-3">Notifications</a>
                <a href="@@path/pages/calendar.html" class="list-group-item list-group-item-action border-bottom border-light">
                  <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="@@path/assets/img/team/profile-picture-1.jpg" class="user-avatar lg-avatar rounded-circle">
                      </div>
                      <div class="col pl-0 ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="h6 mb-0 text-small">Jose Leos</h4>
                            </div>
                            <div class="text-right">
                              <small class="text-danger">a few moments ago</small>
                            </div>
                        </div>
                        <p class="font-small mt-1 mb-0">Added you to an event "Project stand-up" tomorrow at 12:30 AM.</p>
                      </div>
                  </div>
                </a>
                <a href="@@path/pages/tasks.html" class="list-group-item list-group-item-action border-bottom border-light">
                  <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="@@path/assets/img/team/profile-picture-2.jpg" class="user-avatar lg-avatar rounded-circle">
                      </div>
                      <div class="col pl-0 ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="h6 mb-0 text-small">Neil Sims</h4>
                            </div>
                            <div class="text-right">
                              <small class="text-danger">2 hrs ago</small>
                            </div>
                        </div>
                        <p class="font-small mt-1 mb-0">You've been assigned a task for "Awesome new project".</p>
                      </div>
                  </div>
                </a>
                <a href="@@path/pages/tasks.html" class="list-group-item list-group-item-action border-bottom border-light">
                  <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="@@path/assets/img/team/profile-picture-3.jpg" class="user-avatar lg-avatar rounded-circle">
                      </div>
                      <div class="col pl-0 ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="h6 mb-0 text-small">Roberta Casas</h4>
                            </div>
                            <div class="text-right">
                              <small>5 hrs ago</small>
                            </div>
                        </div>
                        <p class="font-small mt-1 mb-0">Tagged you in a document called "First quarter financial plans",</p>
                      </div>
                  </div>
                </a>
                <a href="@@path/pages/single-message.html" class="list-group-item list-group-item-action border-bottom border-light">
                  <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="@@path/assets/img/team/profile-picture-4.jpg" class="user-avatar lg-avatar rounded-circle">
                      </div>
                      <div class="col pl-0 ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="h6 mb-0 text-small">Joseph Garth</h4>
                            </div>
                            <div class="text-right">
                              <small>1 d ago</small>
                            </div>
                        </div>
                        <p class="font-small mt-1 mb-0">New message: "Hey, what's up? All set for the presentation?"</p>
                      </div>
                  </div>
                </a>
                <a href="@@path/pages/single-message.html" class="list-group-item list-group-item-action border-bottom border-light">
                  <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="@@path/assets/img/team/profile-picture-5.jpg" class="user-avatar lg-avatar rounded-circle">
                      </div>
                      <div class="col pl-0 ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="h6 mb-0 text-small">Bonnie Green</h4>
                            </div>
                            <div class="text-right">
                              <small>2 hrs ago</small>
                            </div>
                        </div>
                        <p class="font-small mt-1 mb-0">New message: "We need to improve the UI/UX for the landing page."</p>
                      </div>
                  </div>
                </a>
                <a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pt-1 px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media d-flex align-items-center">
                <img class="user-avatar md-avatar rounded-circle" alt="Image placeholder" src="@@path/assets/img/team/profile-picture-3.jpg">
                <div class="media-body ml-2 text-dark align-items-center d-none d-lg-block">
                  <span class="mb-0 font-small font-weight-bold">Bonnie Green</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-right mt-2">
              <a class="dropdown-item font-weight-bold" href="#"><span class="far fa-user-circle"></span>My Profile</a>
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cog"></span>Settings</a>
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-envelope-open-text"></span>Messages</a>
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-user-shield"></span>Support</a>
              <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-sign-out-alt text-danger"></span>Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
</nav>

                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                            <div class="btn-toolbar dropdown">
                                <button class="btn btn-primary btn-sm mr-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-plus mr-2"></span>New Task
                                </button>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-left mt-2">
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-tasks"></span>New Task</a>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cloud-upload-alt"></span>Upload Files</a>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-user-shield"></span>Preview Security</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-rocket text-danger"></span>Upgrade to Pro</a>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-primary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-primary">Export</button>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-12 mb-4">
                                <div class="card bg-yellow-alt shadow-sm">
                                    <div class="card-header d-flex flex-row align-items-center flex-0">
                                        <div class="d-block">
                                            <div class="h5 font-weight-normal mb-2">Sales Value</div>
                                            <h2 class="h3">$10,567</h2>
                                            <div class="small mt-2"> 
                                                <span class="font-weight-bold mr-2">Yesterday</span>                              
                                                <span class="fas fa-angle-up text-success"></span>                                   
                                                <span class="text-success font-weight-bold">10.57%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex ml-auto">
                                            <a href="#" class="btn btn-secondary text-dark btn-sm mr-2">Month</a>
                                            <a href="#" class="btn btn-primary btn-sm mr-3">Week</a>
                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="ct-chart-sales-value ct-double-octave ct-series-g"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                                <div class="card border-light shadow-sm">
                                    <div class="card-body">
                                        <div class="row d-block d-xl-flex align-items-center">
                                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                                <div class="icon icon-shape icon-md icon-shape-blue rounded mr-4 mr-sm-0"><span class="fas fa-chart-line"></span></div>
                                                <div class="d-sm-none">
                                                    <h2 class="h5">Customers</h2>
                                                    <h3 class="mb-1">345,678</h3>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-7 px-xl-0">
                                                <div class="d-none d-sm-block">
                                                    <h2 class="h5">Customers</h2>
                                                    <h3 class="mb-1">345k</h3>
                                                </div>
                                                <small>Feb 1 - Apr 1,  <span class="icon icon-small"><span class="fas fa-globe-europe"></span></span> WorldWide</small> 
                                                <div class="small mt-2">                               
                                                    <span class="fas fa-angle-up text-success"></span>                                   
                                                    <span class="text-success font-weight-bold">18.2%</span> Since last month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                                <div class="card border-light shadow-sm">
                                    <div class="card-body">
                                        <div class="row d-block d-xl-flex align-items-center">
                                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                                <div class="icon icon-shape icon-md icon-shape-secondary rounded mr-4"><span class="fas fa-cash-register"></span></div>
                                                <div class="d-sm-none">
                                                    <h2 class="h5">Revenue</h2>
                                                    <h3 class="mb-1">$43,594</h3>
                                                </div>
                                            </div>
                                            <div class="col-12 col-xl-7 px-xl-0">
                                                <div class="d-none d-sm-block">
                                                    <h2 class="h5">Revenue</h2>
                                                    <h3 class="mb-1">$43,594</h3>
                                                </div>
                                                <small>Feb 1 - Apr 1,  <span class="icon icon-small"><span class="fas fa-globe-europe"></span></span> Worldwide</small>
                                                <div class="small mt-2">                               
                                                    <span class="fas fa-angle-up text-success"></span>                                   
                                                    <span class="text-success font-weight-bold">28.2%</span> Since last month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-xl-4 mb-4">
                                <div class="card border-light shadow-sm">
                                    <div class="card-body">
                                        <div class="row d-block d-xl-flex align-items-center">
                                            <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                                <div class="ct-chart-traffic-share ct-golden-section ct-series-a"></div>
                                            </div>
                                            <div class="col-12 col-xl-7 px-xl-0">
                                                <h2 class="h5 mb-3">Traffic Share</h2>
                                                <h6 class="font-weight-normal text-gray"><span class="icon w-20 icon-xs icon-secondary mr-1"><span class="fas fa-desktop"></span></span> Desktop <a href="#" class="h6">60%</a></h6>
                                                <h6 class="font-weight-normal text-gray"><span class="icon w-20 icon-xs icon-primary mr-1"><span class="fas fa-mobile-alt"></span></span> Mobile Web <a href="#" class="h6">30%</a></h6>
                                                <h6 class="font-weight-normal text-gray"><span class="icon w-20 icon-xs icon-tertiary mr-1"><span class="fas fa-tablet-alt"></span></span> Tablet Web <a href="#" class="h6">10%</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <div class="card border-light shadow-sm">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                    <h2 class="h5">Page visits</h2>
                                                    </div>
                                                    <div class="col text-right">
                                                        <a href="#" class="btn btn-sm btn-secondary">See all</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Page name</th>
                                                        <th scope="col">Page Views</th>
                                                        <th scope="col">Page Value</th>
                                                        <th scope="col">Bounce rate</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            /demo/admin/index.html
                                                        </th>
                                                        <td>
                                                            3,225
                                                        </td>
                                                        <td>
                                                            $20
                                                        </td>
                                                        <td>
                                                            <span class="fas fa-arrow-up text-danger mr-3"></span> 42,55%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            /demo/admin/forms.html
                                                        </th>
                                                        <td>
                                                            2,987
                                                        </td>
                                                        <td>
                                                            0
                                                        </td>
                                                        <td>
                                                            <span class="fas fa-arrow-down text-success mr-3"></span> 43,52%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            /demo/admin/util.html
                                                        </th>
                                                        <td>
                                                            2,844
                                                        </td>
                                                        <td>
                                                        294
                                                        </td>
                                                        <td>
                                                            <span class="fas fa-arrow-down text-success mr-3"></span> 32,35%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            /demo/admin/validation.html
                                                        </th>
                                                        <td>
                                                            2,050
                                                        </td>
                                                        <td>
                                                            $147
                                                        </td>
                                                        <td>
                                                            <span class="fas fa-arrow-up text-danger mr-3"></span> 50,87%
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            /demo/admin/modals.html
                                                        </th>
                                                        <td>
                                                            1,483
                                                        </td>
                                                        <td>
                                                            $19
                                                        </td>
                                                        <td>
                                                            <span class="fas fa-arrow-down text-success mr-3"></span> 32,24%
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-4">
                                        <div class="card border-light shadow-sm">
                                            <div class="card-header border-bottom border-light d-flex justify-content-between">
                                               <h2 class="h5 mb-0">Team members</h2>
                                                <a href="#" class="btn btn-sm btn-secondary">See all</a>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush list my--3">
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <!-- Avatar -->
                                                            <a href="#" class="user-avatar">
                                                                <img class="rounded-circle" alt="Image placeholder" src="../../assets/img/team/profile-picture-1.jpg">
                                                            </a>
                                                        </div>
                                                        <div class="col-auto ml--2">
                                                            <h4 class="h6 mb-0">
                                                                <a href="#">Christopher Wood</a>
                                                            </h4>
                                                            <span class="text-success">●</span>
                                                            <small>Online</small>
                                                        </div>
                                                        <div class="col text-right">
                                                            <a href="#" class="btn btn-sm btn-tertiary"><i class="fas fa-calendar-check mr-1"></i> Invite</a>
                                                        </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <!-- Avatar -->
                                                                <a href="#" class="user-avatar">
                                                                    <img class="rounded-circle" alt="Image placeholder" src="../../assets/img/team/profile-picture-2.jpg">
                                                                </a>
                                                            </div>
                                                            <div class="col-auto ml--2">
                                                                <h4 class="h6 mb-0">
                                                                    <a href="#">Jose Leos</a>
                                                                </h4>
                                                                <span class="text-warning">●</span>
                                                                <small>In a meeting</small>
                                                            </div>
                                                            <div class="col text-right">
                                                                <a href="#" class="btn btn-sm btn-tertiary"><i class="fas fa-comment mr-1"></i> Message</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <!-- Avatar -->
                                                                <a href="#" class="user-avatar">
                                                                    <img class="rounded-circle" alt="Image placeholder" src="../../assets/img/team/profile-picture-3.jpg">
                                                                </a>
                                                            </div>
                                                            <div class="col-auto ml--2">
                                                                <h4 class="h6 mb-0">
                                                                    <a href="#">Bonnie Green</a>
                                                                </h4>
                                                                <span class="text-danger">●</span>
                                                                <small>Offline</small>
                                                            </div>
                                                            <div class="col text-right">
                                                                <a href="#" class="btn btn-sm btn-tertiary"><i class="fas fa-calendar-check mr-1"></i> Invite</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <!-- Avatar -->
                                                                <a href="#" class="user-avatar">
                                                                    <img class="rounded-circle" alt="Image placeholder" src="../../assets/img/team/profile-picture-4.jpg">
                                                                </a>
                                                            </div>
                                                            <div class="col-auto ml--2">
                                                            <h4 class="h6 mb-0">
                                                                    <a href="#">Neil Sims</a>
                                                            </h4>
                                                            <span class="text-success">●</span>
                                                            <small>Online</small>
                                                            </div>
                                                            <div class="col text-right">
                                                                <a href="#" class="btn btn-sm btn-tertiary"><i class="fas fa-comment mr-1"></i> Message</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-4">
                                        <div class="card border-light shadow-sm">
                                            <div class="card-header border-bottom border-light">
                                                <h2 class="h5 mb-0">Progress track</h2>
                                            </div>
                                            <div class="card-body">
                                                <div class="row align-items-center mb-4">
                                                    <div class="col-auto">
                                                        <span class="icon icon-md text-purple"><span class="fab fa-bootstrap"></span></span>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress-wrapper">
                                                            <div class="progress-info">
                                                                <div class="h6 mb-0">Rocket - SaaS Template</div>
                                                                <div class="small font-weight-bold text-dark"><span>34 %</span></div>
                                                            </div>
                                                            <div class="progress mb-0">
                                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-4">
                                                    <div class="col-auto">
                                                        <span class="icon icon-md text-danger"><span class="fab fa-angular"></span></span>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress-wrapper">
                                                            <div class="progress-info">
                                                                <div class="h6 mb-0">Pixel - Design System</div>
                                                                <div class="small font-weight-bold text-dark"><span>60 %</span></div>
                                                            </div>
                                                            <div class="progress mb-0">
                                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-4">
                                                    <div class="col-auto">
                                                        <span class="icon icon-md text-success"><span class="fab fa-vuejs"></span></span>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress-wrapper">
                                                            <div class="progress-info">
                                                                <div class="h6 mb-0">Spaces - Listings Template</div>
                                                                <div class="small font-weight-bold text-dark"><span>45 %</span></div>
                                                            </div>
                                                            <div class="progress mb-0">
                                                                <div class="progress-bar bg-tertiary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-4">
                                                    <div class="col-auto">
                                                        <span class="icon icon-md text-info"><span class="fab fa-react"></span></span>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress-wrapper">
                                                            <div class="progress-info">
                                                                <div class="h6 mb-0">Stellar - Dashboard</div>
                                                                <div class="small font-weight-bold text-dark"><span>35 %</span></div>
                                                            </div>
                                                            <div class="progress mb-0">
                                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <span class="icon icon-md text-purple"><span class="fab fa-bootstrap"></span></span>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress-wrapper">
                                                            <div class="progress-info">
                                                                <div class="h6 mb-0">Volt - Dashboard</div>
                                                                <div class="small font-weight-bold text-dark"><span>34 %</span></div>
                                                            </div>
                                                            <div class="progress mb-0">
                                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4 mb-4">
                                <div class="col-12 mb-4">
                                    <div class="card border-light shadow-sm">
                                        <div class="card-body d-flex flex-row align-items-center flex-0 border-bottom">
                                            <div class="d-block">
                                                <div class="h6 font-weight-normal text-gray mb-2">Total orders</div>
                                                <h2 class="h3">452</h2>
                                                <div class="small mt-2">                               
                                                    <span class="fas fa-angle-up text-success"></span>                                   
                                                    <span class="text-success font-weight-bold">18.2%</span>
                                                </div>
                                            </div>
                                            <div class="d-block ml-auto">
                                                <div class="d-flex align-items-center text-right mb-2">
                                                    <span class="shape-xs rounded-circle bg-quaternary mr-2"></span>
                                                    <span class="font-weight-normal small">July</span>
                                                </div>
                                                <div class="d-flex align-items-center text-right">
                                                    <span class="shape-xs rounded-circle bg-secondary mr-2"></span>
                                                    <span class="font-weight-normal small">August</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body p-2">
                                            <div class="ct-chart-ranking ct-golden-section ct-series-a"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0 mb-4">
                                    <div class="card border-light shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between border-bottom border-light pb-3">
                                                <div>
                                                    <h6 class="mb-0"><span class="icon icon-xs mr-3"><span class="fas fa-globe-europe"></span></span>Global Rank</h6>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-primary font-weight-bold">#755<span class="fas fa-chart-line ml-2"></span></a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between border-bottom border-light py-3">
                                                <div>
                                                    <h6 class="mb-0"><span class="icon icon-xs mr-3"><span class="fas fa-flag-usa"></span></span>Country Rank</h6>
                                                    <div class="small card-stats">United States<span class="icon icon-xs text-success ml-2"><span class="fas fa-angle-up"></span></span></div>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-primary font-weight-bold">#32<span class="fas fa-chart-line ml-2"></span></a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between pt-3">
                                                <div>
                                                    <h6 class="mb-0"><span class="icon icon-xs mr-3"><span class="fas fa-folder-open"></span></span>Category Rank</h6>
                                                    <a href="#" class="small card-stats">Travel > Accomodation</a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-primary font-weight-bold">#16<span class="fas fa-chart-line ml-2"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-0 mb-4">
                                    <div class="card border-light shadow-sm">
                                        <div class="card-body">
                                            <h2 class="h5">Acquisition</h2>
                                            <p>Tells you where your visitors originated from, such as search engines, social networks or website referrals.</p>
                                            <div class="d-block">
                                                <div class="d-flex align-items-center pt-3 mr-5">
                                                    <div class="icon icon-shape icon-sm icon-shape-danger rounded mr-3"><span class="fas fa-chart-bar"></span></div>
                                                    <div class="d-block">
                                                        <label class="mb-0">Bounce Rate</label>
                                                        <h4 class="mb-0">33.50%</h4>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center pt-3">
                                                    <div class="icon icon-shape icon-sm icon-shape-quaternary rounded mr-3"><span class="fas fa-chart-area"></span></div>
                                                    <div class="d-block">
                                                        <label class="mb-0">Sessions</label>
                                                        <h4 class="mb-0">9,567</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <footer class="footer section py-5">
    <div class="row">
        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
            <p class="mb-0 text-center text-xl-left">Copyright © 2019-<span class="current-year"></span> <a class="text-primary font-weight-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
        </div>

        <div class="col-12 col-lg-6">
            <ul class="list-inline list-group-flush list-group-borderless text-center text-xl-right mb-0">
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/about">About</a>
                </li>
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/themes">Themes</a>
                </li>
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/blog">Blog</a>
                </li>
                <li class="list-inline-item px-0 px-sm-2">
                    <a href="https://themesberg.com/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
                    </main>
                </div>
            </div>
        </div>

   <!-- Core -->
<script src="@@path/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="@@path/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Vendor JS -->
<script src="@@path/vendor/onscreen/dist/on-screen.umd.min.js"></script>

<!-- Slider -->
<script src="@@path/vendor/nouislider/distribute/nouislider.min.js"></script>

<!-- Jarallax -->
<script src="@@path/vendor/jarallax/dist/jarallax.min.js"></script>

<!-- Smooth scroll -->
<script src="@@path/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<!-- Count up -->
<script src="@@path/vendor/countup.js/dist/countUp.umd.js"></script>

<!-- Notyf -->
<script src="@@path/vendor/notyf/notyf.min.js"></script>

<!-- Charts -->
<script src="@@path/vendor/chartist/dist/chartist.min.js"></script>
<script src="@@path/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src="@@path/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Simplebar -->
<script src="@@path/vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="@@path/assets/js/volt.js"></script>

    
</body>

</html>
