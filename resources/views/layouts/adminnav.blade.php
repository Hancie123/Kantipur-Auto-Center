<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @stack('title')
    <link rel="icon" href="{{url('assets/img/logo.png')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/vendor.bundle.base.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="{{url('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/feather.css')}}"> -->

    <script src="{{url('assets/js/dashboard.js')}}"></script>
    <script src="{{url('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('assets/js/template.js')}}"></script>
    <script src="{{url('assets/js/vendor.bundle.base.js')}}"></script>
    <script src="{{url('assets/js/off-canvas.js')}}"></script>
    <script src="{{url('assets/js/settings.js')}}"></script>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="{{url('/admin/dashboard')}}"><img
                        src="{{url('assets/img/logo.png')}}" class="mr-2" alt="logo" /></a>


                <a class="navbar-brand brand-logo-mini" href="{{url('/admin/dashboard')}}"><img
                        src="{{url('assets/img/logo.png')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class='bx bx-menu'></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class='bx bx-search-alt-2'></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">


                    <div id="battery">
                        <div id="charge"></div>
                        <div id="charge-level"></div>
                    </div>
                    <div id="charging-time"></div>



                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{url('assets/img/logo.png')}}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class='bx bx-user text-primary'></i>
                                {{Session('name')}}
                            </a>
                            <a class="dropdown-item" href="{{url('/admin/dashboard/logout')}}">
                                <i class='bx bx-log-out-circle text-primary'></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class='bx bx-menu bx-sm mx-0'></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class='bx bx-cog'></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->





            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/dashboard')}}">
                            <i class='bx bxs-grid-alt bx-sm mx-1'></i>

                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#managecustomers" aria-expanded="false"
                            aria-controls="managecustomers">

                            <i class='bx bx-user bx-sm mx-1'></i>
                            <span class="menu-title">Manage Customers</span>
                            <i class='bx bx-chevron-right'></i>
                        </a>
                        <div class="collapse" id="managecustomers">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('admin/customer/createaccount')}}">Create
                                        Accounts</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('/admin/customer/view_all_customers')}}">View
                                        Customers</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#manageproducts" aria-expanded="false"
                            aria-controls="manageproducts">
                            <i class='bx bx-sushi bx-sm mx-1'></i>
                            <span class="menu-title">Manage Racks</span>
                            <i class='bx bx-chevron-right'></i>
                        </a>
                        <div class="collapse" id="manageproducts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{url('admin/racks/create')}}">Create
                                        New Racks</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('admin/steps/create')}}">Create
                                        New Steps</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#managepayment" aria-expanded="false"
                            aria-controls="managepayment">
                            <i class='bx bx-dollar-circle bx-sm mx-1'></i>
                            <span class="menu-title">Manage Payment</span>
                            <i class='bx bx-chevron-right'></i>
                        </a>
                        <div class="collapse" id="managepayment">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('/admin/payments/create')}}">Create
                                        Payment</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('/admin/payments/view')}}">View
                                        Payments</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#managetransactions" aria-expanded="false"
                            aria-controls="managetransactions">

                            <i class='bx bx-transfer-alt bx-sm mx-1'></i>
                            <span class="menu-title">Manage Transactions</span>
                            <i class='bx bx-chevron-right'></i>
                        </a>
                        <div class="collapse" id="managetransactions">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('/admin/transactions/create')}}">Create
                                        Transactions</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('/admin/transactions/view')}}">View
                                        Transactions</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#manageexpenses" aria-expanded="false"
                            aria-controls="manageexpenses">
                            <i class='bx bx-money bx-sm mx-1'></i>
                            <span class="menu-title">Manage Expenses</span>
                            <i class='bx bx-chevron-right'></i>
                        </a>
                        <div class="collapse" id="manageexpenses">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('/admin/expenses/create')}}">Withdraw Money</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#managereport" aria-expanded="false"
                            aria-controls="managereport">
                            <i class='bx bxs-report bx-sm mx-1'></i>
                            <span class="menu-title">Manage Reports</span>
                            <i class='bx bx-chevron-right'></i>
                        </a>
                        <div class="collapse" id="managereport">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{url('/admin/shiftreport/view')}}">Shift
                                        Report</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/dashboard/logout')}}">
                            <i class='bx bx-log-out-circle bx-sm mx-1'></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <style>
            #battery {
                box-sizing: content-box;
                height: 1.8em;
                width: 4.5em;
                border: 0.2em solid #246aed;
                margin: auto;
                border-radius: 0.4em;
                position: relative;
                display: grid;
                place-items: center;
            }

            #battery:before {
                position: absolute;
                content: "";
                height: 1.5em;
                width: 0.5em;
                background-color: #246aed;
                margin: auto;
                top: 0;
                bottom: 0;
                right: -0.6em;
                border-radius: 0 0.2em 0.2em 0;
            }

            #charge {
                position: absolute;
                height: 1.3em;
                width: 4em;
                background-color: #246aed;
                top: 0.3em;
                left: 0.4em;
            }

            #charge-level {
                position: absolute;
                font-size: 1.2em;
                font-weight: 500;
            }

            #charging-time {
                text-align: center;
                font-size: 1.2em;
                margin-top: 0.8em;
            }

            .active {
                animation: charge-animation 3s infinite linear;
            }

            @keyframes charge-animation {
                0% {
                    width: 0;
                }

                100% {
                    width: 4em;
                }
            }
            </style>


            <script>
            const chargeLevel = document.getElementById("charge-level");
            const charge = document.getElementById("charge");
            const chargingTimeRef = document.getElementById("charging-time");

            window.onload = () => {
                //For browsers that don't support the battery status API
                if (!navigator.getBattery) {
                    alert("Battery Status Api Is Not Supported In Your Browser");
                    return false;
                }
            };

            navigator.getBattery().then((battery) => {
                function updateAllBatteryInfo() {
                    updateChargingInfo();
                    updateLevelInfo();
                }
                updateAllBatteryInfo();

                //When the charging status changes
                battery.addEventListener("chargingchange", () => {
                    updateAllBatteryInfo();
                });

                //When the Battery Levvel Changes
                battery.addEventListener("levelchange", () => {
                    updateAllBatteryInfo();
                });

                function updateChargingInfo() {
                    if (battery.charging) {
                        charge.classList.add("active");
                        chargingTimeRef.innerText = "";
                    } else {
                        charge.classList.remove("active");

                        //Display time left to discharge only when it is a integer value i.e not infinity
                        if (parseInt(battery.dischargingTime)) {
                            let hr = parseInt(battery.dischargingTime / 3600);
                            let min = parseInt(battery.dischargingTime / 60 - hr * 60);
                            chargingTimeRef.innerText = `${hr}hr ${min}mins remaining`;
                        }
                    }
                }

                //Updating battery level
                function updateLevelInfo() {
                    let batteryLevel = `${parseInt(battery.level * 100)}%`;
                    charge.style.width = batteryLevel;
                    chargeLevel.textContent = batteryLevel;
                }
            });
            </script>