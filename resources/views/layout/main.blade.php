<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"
        integrity="sha384-6lL2LXNwzT1BLl62qDSnZkLbMNYvP+Y5ES7QKLMir5bT1jc3Z6P/7+UmSG1nZV0h" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <title>Jamur goreng</title>

    <style>
        /* Add margin between pills and header */
        .nav-container {
            margin-top: 20px;
        }

        /* Fix footer at the bottom of the page */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #007bff;
            /* Default Bootstrap blue color */
            color: white;
            text-align: center;
            padding: 10px 0;
            /* Add some padding for better appearance */
        }

        /* Ensure dropdown stays within frame */
        .dropdown-menu {
            max-height: 200px;
            /* Set max-height for the dropdown */
            overflow-y: auto;
            /* Enable vertical scrollbar if needed */
        }
    </style>
</head>

<body>
    <!-- Container for the entire webpage -->
    <div class="container-fluid">
        <!-- Row for the blue header -->
        <div class="row">
            <!-- Blue header with dropdown menu for login and register -->
            <div class="col-md-12 bg-primary py-4 text-center d-flex justify-content-between align-items-center">
                <h1 class="text-white">Template</h1>
                <div class="dropdown">
                    @if (Auth::check())
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Hi, {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="max-height: 200px; overflow-y: auto;">
                            <a class="dropdown-item" href="#">{{ Auth::user()->email }}</a>
                            <a class="dropdown-item" href="/userupdate">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Account
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="max-height: 200px; overflow-y: auto;">
                            <a class="dropdown-item {{ $key == 'login' ? 'active' : '' }}" href="/">Login</a>
                            <a class="dropdown-item {{ $key == 'register' ? 'active' : '' }}" href="/register">Register</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
        <!-- Row for the menu and content -->
        <div class="row">
            <!-- Column for the menu -->
            <div class="col-md-2 nav-container">
                <!-- Menu -->
                <div class="row">
                    <!-- Column for the menu links -->
                    <div class="col-12">
                        <!-- Vertical navigation pills -->
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <!-- Home link -->
                            <a class="nav-link {{ $key == 'home' ? 'active' : '' }}" id="v-pills-home-tab"
                                href="/home">Home</a>
                            <!-- Profile link -->
                            <a class="nav-link {{ $key == 'masterdata' ? 'active' : '' }}" id="v-pills-movies-tab"
                                href="/masterdata">Master Data</a>
                            <!-- Messages link -->
                            <a class="nav-link {{ $key == 'about' ? 'active' : '' }}" id="v-pills-messages-tab"
                                href="/about">About</a>
                            <!-- Settings link -->
                            <a class="nav-link {{ $key == 'faq' ? 'active' : '' }}" id="v-pills-settings-tab"
                                href="/faq">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column for the content -->
            <div class="col-sm-10">
                <!-- Card for the content -->
                <div class="card">
                    <!-- Header for the card -->
                    <div class="card-header">
                        @yield('title')
                    </div>
                    <!-- Body for the card -->
                    <div class="card-body">
                        @yield('artikel')
                    </div>
                    <div class='card-footer'>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        Template by Christian Indarto.
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"
        integrity="sha384-qMGNX6nPYP0OeJrvG5e+hQUnhoZGV8lr6ZQ0IWJGLoT2Ke+PHNCw9KQXTb2OF5xd" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"
        integrity="sha384-rP4gzQ9U8xXeptKsDQcGbNiOZLJzD2kmr2AfSeJ9FQJ9HptP9Ep34jR1+w4EEuE5" crossorigin="anonymous">
    </script>

    @yield('scripts')

</body>

</html>
