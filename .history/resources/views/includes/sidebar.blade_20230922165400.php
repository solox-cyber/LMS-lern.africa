<!-- navigation -->
<nav class="navigation scroll-bar">
    <div class="container pl-0 pr-0">
        <div class="nav-content">
            <div class="nav-top">



                <a href="{{route('home')}}">  <img alt="Logo" src="{{asset('media/logos/lern-logo.png')}}" style="width:50px; padding:3px" class="h-10px app-sidebar-logo-default" /> <span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xl logo-text mb-0">Lern Africa. </span> </a>
                <a href="#" class="close-nav d-inline-block d-lg-none"><i class="ti-close bg-grey mb-4 btn-round-sm font-xssss fw-700 text-dark ml-auto mr-2 "></i></a>
            </div>
            <!-- <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div> -->
            <ul class="mb-3">
                <li class="logo d-none d-xl-block d-lg-block"></li>
                <li><a href="{{route('dashboard')}}" class="nav-content-bttn open-font {{ set_active_route('dashboard') }}" data-tab="friends"><i class="feather-shopping-bag mr-3"></i><span>My Earnings</span></a></li>
                <li><a href="{{route('add_contact')}}" class="nav-content-bttn open-font {{ set_active_route('add_contact') }}" data-tab="favorites"><i class="feather-globe mr-3"></i><span>My Invitations</span></a></li>
                <li><a href="{{route('myCourses')}}" class=" nav-content-bttn open-font {{ set_active_route('myCourses') }}" data-tab="chats"><i class="feather-tv mr-3"></i><span>My Learnings</span></a></li>
                <li><a href="{{route('live.stream')}}" class="nav-content-bttn open-font {{ set_active_route('live.stream') }}" data-tab="favorites"><i class="feather-play-circle mr-3"></i><span>Live Stream</span></a></li>
                <!-- <li class="flex-lg-brackets"><a href="{{route('myCourses')}}" data-tab="archived" class="nav-content-bttn open-font {{ set_active_route('myCourses') }}"><i class="feather-video mr-3"></i><span>Saved Course</span></a></li> -->
            </ul>

            <div class="nav-caption fw-600 font-xssss text-grey-500"><span>Questions asked </span>(Answered) </div>
            <ul class="mb-3">
                <li><a href="default-author-profile.html" class="nav-content-bttn open-font pl-2 pb-2 pt-1 h-auto" data-tab="chats"><img src="images/profile-4.png" alt="user" class="w40 mr-2"><span>Surfiya Zakir </span> <span class="circle-icon bg-success mt-3"></span></a></li>
                <li><a href="default-author-profile.html" class="nav-content-bttn open-font pl-2 pb-2 pt-1 h-auto" data-tab="chats"><img src="images/profile-2.png" alt="user" class="w40 mr-2"><span>Vincent Parks </span> <span class="circle-icon bg-warning mt-3"></span></a></li>
                <li><a href="default-author-profile.html" class="nav-content-bttn open-font pl-2 pb-2 pt-1 h-auto" data-tab="chats"><img src="images/profile-3.png" alt="user" class="w40 mr-2"><span>Richard Bowers </span> <span class="circle-icon bg-success mt-3"></span></a></li>
                <li><a href="default-author-profile.html" class="nav-content-bttn open-font pl-2 pb-2 pt-1 h-auto" data-tab="chats"><img src="images/profile-4.png" alt="user" class="w40 mr-2"><span>John Lambert </span> <span class="circle-icon bg-success mt-3"></span></a></li>
            </ul>
            <div class="nav-caption fw-600 font-xssss text-grey-500"><span></span> Account</div>
            <ul class="mb-3">
                <li class="logo d-none d-xl-block d-lg-block"></li>
                <li><a href="default-settings.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-settings mr-3 text-grey-500"></i><span>Settings</span></a></li>
                <li><a href="default-analytics.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-pie-chart mr-3 text-grey-500"></i><span>Analytics</span></a></li>
                <li><a href="message.html" class="nav-content-bttn open-font h-auto pt-2 pb-2"><i class="font-sm feather-message-square mr-3 text-grey-500"></i><span>Chat</span><span class="circle-count bg-warning mt-0">23</span></a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- navigation -->
