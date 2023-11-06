<div class="wrapper">
    <div class="hero_area">
        @include('homepage/includes/navbar')
        <!--slider area start-->
        @yield('slider')
    </div>

    <div class="maincontent">

        @yield('main')
    </div>

    @include('homepage/includes/footer')
    
    @include('homepage/includes/js')

</div>