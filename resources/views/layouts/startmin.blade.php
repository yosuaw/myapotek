<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Dashboard</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('startmin/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('startmin/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ asset('startmin/css/timeline.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('startmin/css/startmin.css') }}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ asset('startmin/css/morris.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('startmin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .modal-body {
                max-height: calc(100vh - 212px);
                overflow-y: auto;
            }
            .panel-body.display-flex {
                display: flex;
                flex-wrap: wrap;
            }

            .panel-body.display-flex > [class*='col-'] {
                display: flex;
                flex-direction: column;
            }

            .panel-body.display-flex .thumbnail {
                flex-grow: 2;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('medicines.index') }}">MyApotek</a>
                </div>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin: 3px 20px">
                                @csrf
                                <i class="fa fa-key"></i> <input type="submit" class="btn btn-danger" value="Logout">
                            </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#" ><i class="fa fa-plus fa-fw"></i> Medicine<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a  href="{{ route('medicines.index') }}" class="{{ Request::is('medicines') ? 'active' : '' }}"><i class="fa fa-list fa-fw"></i>List Medicine</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route('medicines.listDeleted') }}" class="{{ Request::is('medicine-deleted') ? 'active' : '' }}"> <i class="fa fa-trash fa-fw"></i>Deleted Medicine</a>
                                    </li> --}}
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sort-amount-desc fa-fw"></i> Category<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a  href="{{ route('categories.index') }}" class="{{ Request::is('categories') ? 'active' : '' }}"> <i class="fa fa-list fa-fw"></i>List Category</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('categories.listDeleted') }}" class="{{ Request::is('category-deleted') ? 'active' : '' }}"><i class="fa fa-trash fa-fw"></i> Deleted Category</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}" class="{{ Request::is('users') ? 'active' : '' }}"><i class="fa fa-users fa-fw"></i> Customer</span></a>
                            </li>
                            <li>
                                <a href="{{ route('transactions.index') }}" class="{{ Request::is('transactions') ? 'active' : '' }}"><i class="fa fa-credit-card fa-fw"></i> Transactions</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> Report<span class="fa arrow"></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('reports.topFiveBestSeller') }}" class="{{ Request::is('reports/topFiveBestSeller') ? 'active' : '' }}"><i class="fa fa-star fa-fw"></i>Best Seller</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reports.topThreeCustomer') }}" class="{{ Request::is('reports/topThreeCustomer') ? 'active' : '' }}"><i class="fa fa-thumbs-up fa-fw"></i>Top Customer</a>
                                    </li>
                                </ul>
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper"> 
                <div class="container-fluid">
                @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('startmin/js/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('startmin/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ asset('startmin/js/metisMenu.min.js') }}"></script>

        <!-- Morris Charts JavaScript -->
        {{-- <script src="{{ asset('startmin/js/raphael.min.js') }}"></script>
        <script src="{{ asset('startmin/js/morris.min.js') }}"></script>
        <script src="{{ asset('startmin/js/morris-data.js') }}"></script> --}}

        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('startmin/js/startmin.js') }}"></script>

        @yield('javascript')
    </body>
</html>
