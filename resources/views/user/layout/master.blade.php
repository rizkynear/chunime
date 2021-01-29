<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Chunime.me adalah situs download anime yang mengutamakan kualitas website dan subtitle agar penonton merasa nyaman saat berkunjung dan menonton anime">
    <meta name="keywords" content="Chunime, Anime Sub Indo, Download Anime, Download Anime Subtitle Indonesia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chunime - Download Anime Subtitle Bahasa Indonesia</title>

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/all.css')  }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/customuser.css')  }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v9.0" nonce="MBU7kmMj"></script>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('user.home') }}">
                            <img src="{{ asset('img/logo-main.png') }}" alt="Main Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="{{ route('user.home') }}">Home</a></li>
                                <li><a href="{{ route('user.anime.list') }}">Anime List</a></li>
                                <li><a href="{{ route('user.genre.list') }}">Genre List</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <main>
        @yield('content')
    </main>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="{{ route('user.home') }}"><img src="{{ asset('img/logo-main.png') }}" alt="Logo Footer"></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template
                        is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank" rel="noreferrer noopener">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form" action="{{ route('user.search') }}">
                <input type="text" id="search-input" name="keyword" placeholder="Cari judul anime">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/user-all.js') }}"></script>
    
    @yield('script')


</body>

</html>