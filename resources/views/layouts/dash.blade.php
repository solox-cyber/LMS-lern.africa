@include('includes/header')


<div class="main-wrapper">
@include('includes/sidebar')
<!-- main content -->
<div class="main-content">
@include('includes/headbar')
    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
        @yield('content')

        </div>


    </div>
</div>
<!-- main content -->
<div class="app-footer border-0 shadow-lg">
    <a href="{{route('home')}}" class="nav-content-bttn nav-center"><i class="feather-home"></i></a>
    <a href="{{route('add_contact')}}" class="nav-content-bttn"><i class="feather-package"></i></a>
    <a href="{{route('live.stream')}}" class="nav-content-bttn" data-tab="chats"><i class="feather-layout"></i></a>
    <a href="{{route('myCourses')}}" class="nav-content-bttn sidebar-layer"><i class="feather-layers"></i></a>
    <a href="{{route('setting')}}" class="nav-content-bttn"><img src="images/female-profile.png" alt="user" class="w30 shadow-xss"></a>
</div>

<div class="app-header-search">
    <form class="search-form">
        <div class="form-group searchbox mb-0 border-0 p-1">
            <input type="text" class="form-control border-0" placeholder="Search...">
            <i class="input-icon">
                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
            </i>
            <a href="#" class="ml-1 mt-1 d-inline-block close searchbox-close">
                <i class="ti-close font-xs"></i>
            </a>
        </div>
    </form>
</div>

</div>

@include('includes/footer')
