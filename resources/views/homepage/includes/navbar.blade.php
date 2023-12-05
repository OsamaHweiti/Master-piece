<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/">
                <span>Hostify</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactus">Contact Us</a>
                    </li>
                </ul>
                <div class="quote_btn-container">
                    
                        <a class="nav-link" href="/userprofile"><i class="fas fa-user fa-xl mr-2"></i></a>
                   
                    @if (Auth::check())
                        <a href="{{ url('/logout') }}" class="btn btn-outline-primary">Logout</a>
                    @else
                        <a href="{{ url('/register') }}"  class="btn btn-outline-primary  mr-2">Register</a>
                      <a href="{{ url('/login') }}" class="btn btn-outline-primary mr-3 ">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
