<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Fontawesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    {{-- Bootstrap 5.3.3 CSS CDN Link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block overflow-hidden">
            <div class="logo bg-light">
                <a href="#">
                    <img style="margin-top: 40px" src="{{ asset('admin/images/icon/logo2.png') }}" alt="Pizza logo" />
                </a>
            </div>

            <div class="menu-sidebar__content js-scrollbar1" style="margin-top: 20px">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{ route('category#list') }}" class="text-danger">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{ route('products#productslist') }}" class="text-danger">
                                <i class="fa-solid fa-pizza-slice"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{ route('order#orderlist') }}" class="text-danger">
                                <i class="fa-solid fa-list-check"></i></i>Order</a>
                        </li>
                        <li>
                            <a href="{{ route('admin#contactinbox') }}" class="text-danger">
                                <i class="fa-solid fa-envelope"></i></i></i>Inbox</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="mt-1">
                                <div class="h1 text-light"
                                    style="text-shadow: 0px 0px 3px rgba(0,0,0,0.8); font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                    Admin Dashboard
                                </div>
                            </div>
                            <div class="header-button">

                                {{-- Message Notification Start --}}
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications text-light"></i>
                                        <span class="quantity"></span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p class="text-danger text-center"></p>
                                            </div>

                                            <div class="notifi__item">

                                            </div>

                                            <div class="notifi__footer">
                                                <a href="{{ route('admin#contactinbox') }}" class="text-danger">
                                                    See All Messages</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Message Notification end --}}

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            @if (Auth::user()->image != null)
                                                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                    alt="Profile Image" />
                                            @else
                                                @if (Auth::user()->gender == 'male')
                                                    <img src="{{ asset('image/male_default_user.png') }}"
                                                        alt="Profile Image" />
                                                @else
                                                    <img src="{{ asset('image/female_default_user.png') }}"
                                                        alt="Profile Image" />
                                                @endif
                                            @endif
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn text-decoration-none text-light"
                                                href="#">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        @if (Auth::user()->image != null)
                                                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                                                alt="Profile Image" />
                                                        @else
                                                            @if (Auth::user()->gender == 'male')
                                                                <img src="{{ asset('image/male_default_user.png') }}"
                                                                    alt="Profile Image" />
                                                            @else
                                                                <img src="{{ asset('image/female_default_user.png') }}"
                                                                    alt="Profile Image" />
                                                            @endif
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#" class="text-decoration-none text-danger">
                                                            {{ Auth::user()->name }}
                                                        </a>
                                                    </h5>

                                                    <span class="email d-block text-danger">
                                                        {{ Auth::user()->email }}
                                                    </span>

                                                    <span class=" text-uppercase text-danger">
                                                        {{ Auth::user()->role }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('admin#details') }}"
                                                        class=" text-decoration-none text-danger">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('admin#adminlist') }}"
                                                        class=" text-decoration-none text-danger">
                                                        <i class="zmdi zmdi-accounts"></i>Admin List</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('admin#userlist') }}"
                                                        class=" text-decoration-none text-danger">
                                                        <i class="fa-solid fa-users"></i>User List</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('admin#changePasswordPage') }}"
                                                        class=" text-decoration-none text-danger">
                                                        <i class="zmdi zmdi-key"></i>Change Password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer m-3">
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger rounded-0 px-5 col-12">
                                                        <i class="zmdi zmdi-power me-2"></i> Logout
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            @yield('content')



            <footer class="user-data__footer bg-danger">
                <div class="container">
                    <div class="footer_note">This project is built with <span class="txtani"></span> .</div>
                </div>
            </footer>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    {{-- <script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5.3.3 CDN JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    @yield('jQueryScript')

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "/admin/contact/ajaxshownoti",
                datatype: 'json',
                success: function(response) {
                    let unreadMessageCount = response.unreadMessageCount;
                    let unreadMessages = response.unreadMessages;

                    $('.quantity').text(unreadMessageCount);
                    $('.notifi__title p').text(`You have ${unreadMessageCount} New Messages`);

                    let notifi_item = $('.notifi__item');

                    unreadMessages.forEach(message => {

                        let dbdate = new Date(message.created_at);
                        let monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",
                            "Aug", "Sep", "Oct", "Nov", "Dec"
                        ];

                        let getday = dbdate.getDate();
                        let getmonth = dbdate.getMonth();
                        let getyear = dbdate.getFullYear();
                        let time = dbdate.toLocaleTimeString();
                        let jsdate = getday + ' ' + monthNames[getmonth] + ' ' + getyear +
                            '  /  ' +
                            time;


                        let messageItem = `
                            <div class="notifi__item">
                                <div class="d-flex justify-content-around">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email"></i>
                                    </div>
                                    <div class="content">
                                        <a href="#" class="text-decoration-none links">
                                            <p>${message.subject}</p>
                                            <span class="date">${jsdate}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;
                        notifi_item.append(messageItem);
                    });
                }
            });
        });
    </script>


</body>

</html>
<!-- end document-->
