<header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{url('')}}" class="standard-logo" data-dark-logo="{{ url('images/logo-dark.png')}}"><img src="{{ url('images/logo.png')}}" alt="Canvas Logo"></a>
                    <a href="{{url('')}}" class="retina-logo" data-dark-logo="{{ url('images/logo-dark@2x.png')}}"><img src="{{ url('images/logo@2x.png')}}" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                {{-- <div class="header-misc">
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger">EN</a>
                    </div>
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger" style="width: 30px;font-size:15px">中文</a>
                    </div>
                </div> --}}

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu style-6">

                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{url('/home')}}"><div>Home</div></a>
                            
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>About Us</div></a> 
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/about-us')}}"><div>About Sheng Tai International</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/founder-and-chairman')}}"><div>Founder and Chairman</div></a>
                                </li>
                               
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/awards')}}"><div>Awards</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/awards')}}"><div>Milestone</div></a>
                                </li>
                            </ul>                          
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Business and Services</div></a>                            
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/real-estate')}}"><div>Real Estate</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/hospitality')}}"><div>Hospitality </div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/one-stop-center')}}"><div>One Stop Center</div></a>
                                </li>                                
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/heathcare')}}"><div>Heath Care</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/agriculture')}}"><div>Agriculture</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/legal-firm')}}"><div>Legal Firm</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/publication')}}"><div>Publication </div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/fashion')}}"><div>Fashion and Lifestyle </div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{url('/business-and-services/e-commerce')}}"><div>E-commerce </div></a>
                                </li>
                                
                            
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Projects</div></a>  
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/current-upcomming')}}"><div>Current / Upcomming</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/the-sail-melaka')}}"><div>The Sail Melaka</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/novo-jalan-ampang')}}"><div>Novo Jalan Ampang</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/regalia-melaka')}}"><div>Regalia Melaka </div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/metrasquare-melaka')}}"><div>MetraSquare Melaka </div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/ames-hotel-melaka')}}"><div>Ames Hotel Melaka </div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/nyra-hotel-melaka')}}"><div>Nyra Hotel Melaka </div></a>
                                </li>
                            
                            </ul>                              
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ url('/media/all')}}"><div>Media</div></a>                            
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ url('/videos/all')}}"><div>Videos</div></a>                            
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ url('/career')}}"><div>Careers</div></a>                            
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ url('/contact-us')}}"><div>Contact Us</div></a>                            
                        </li>
                       
                        <li class="menu-item">
                            <a class="menu-link" href="{{ url('/projects/current-upcomming')}}"><div>Language</div></a>
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/current-upcomming')}}"><div>Eng</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('/projects/current-upcomming')}}"><div>CN</div></a>
                                </li>                               
                                
                            
                            </ul>
                        </li>
                       
                    </ul>

                </nav><!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>