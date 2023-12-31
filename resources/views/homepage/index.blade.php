@extends('homepage/includes/masterpage')
@extends('homepage/includes/header')

@section('title', 'Home')


<body class="@yield('body-class', 'default-body-class')">
 

    @section('slider')
    @if (session('success'))
        <div class="alert alert-success text-center " style="z-index: 5 ; ">
            {{ session('success') }}
        </div>
    @endif
        @include('homepage/includes/slider')
        
    @endsection

    @section('main')

        <section class="service_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Our Services
                    </h2>
                </div>
            </div>
            <div class="container ">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4">
                            <div class="box ">
                                <div class="img-box">
                                    <img src="{{ asset('uploads/' . $service->photo) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h4>
                                        {{ $service->name }}
                                    </h4>
                                    <p>
                                        {{ $service->description }}
                                    </p>
                                    <a href="/pricing">
                                        Read More
                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-md-6 col-lg-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/s1.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Shared Hosting
              </h4>
              <p>
                Generators on the Internet tend to repeat predefined chunks as necessary
              </p>
              <a href="">
                Read More
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/s2.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Dedicated Hosting
              </h4>
              <p>
                Generators on the Internet tend to repeat predefined chunks as necessary
              </p>
              <a href="">
                Read More
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 ">
          <div class="box ">
            <div class="img-box">
              <img src="images/s3.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Cloud Hosting
              </h4>
              <p>
                Generators on the Internet tend to repeat predefined chunks as necessary
              </p>
              <a href="">
                Read More
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/s4.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                VPS Hosting
              </h4>
              <p>
                Generators on the Internet tend to repeat predefined chunks as necessary
              </p>
              <a href="">
                Read More
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/s5.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Wordpress Hosting
              </h4>
              <p>
                Generators on the Internet tend to repeat predefined chunks as necessary
              </p>
              <a href="">
                Read More
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="box ">
            <div class="img-box">
              <img src="images/s6.png" alt="">
            </div>
            <div class="detail-box">
              <h4>
                Domain Name
              </h4>
              <p>
                Generators on the Internet tend to repeat predefined chunks as necessary
              </p>
              <a href="">
                Read More
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>

              </a>
            </div>
          </div>
        </div> --}}
                </div>
            </div>
        </section>

        <!-- end service section -->

        <!-- about section -->

        <section class="about_section layout_padding-bottom">
            <div class="container  ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    About Us
                                </h2>
                            </div>
                            <p>
                                Words which don't look even slightly believable. If you are going to use a passage of Lorem
                                Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="img-box">
                            <img src="images/about-img.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- end about section -->


        <!-- server section -->

        <section class="server_section">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="images/server-img.jpg" alt="">
                            <div class="play_btn">
                                <button>
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    Let us manage your server
                                </h2>
                                <p>
                                    Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model
                                    sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem
                                    Ipsum is therefore
                                </p>
                            </div>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end server section -->

        <!-- price section -->

        <section class="price_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Our Pricing
                    </h2>
                </div>
                <div class="price_container ">
                    @foreach ($prices as $price )
                    <div class="box">
                      <div class="detail-box">
                        <h2>$ <span>{{$price->price}}</span></h2>
                        <h6>
                        {{$price->name}}
                        </h6>
                        <ul class="price_features">
                          <li>
                            {{$price->ram}}
                          </li>
                          <li>
                         {{$price->storage}}
                          </li>
                          <li>
                            Weekly Backups
                          </li>
                          <li>
                            DDoS Protection
                          </li>
                          <li>
                            Full Root Access
                          </li>
                          <li>
                            24/7/365 Tech Support
                          </li>
                        </ul>
                      </div>
                      <div class="btn-box">
                        <a href="{{route('pricecheckout', $price->id)}}">
                          CheckOut
                        </a>
                      </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </section>

        <!-- price section -->

        <!-- client section -->
        <section class="client_section ">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Testimonial
                    </h2>
                    <p>
                        Even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to
                    </p>
                </div>
            </div>
            <div class="container px-0">
                <div id="customCarousel2" class="carousel  slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <div class="box">
                                            <div class="img-box">
                                                <img src="images/client.jpg" alt="">
                                            </div>
                                            <div class="detail-box">
                                                <div class="client_info">
                                                    <div class="client_name">
                                                        <h5>
                                                            Morojink
                                                        </h5>
                                                        <h6>
                                                            Customer
                                                        </h6>
                                                    </div>
                                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut
                                                    labore
                                                    et
                                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                    ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                    in voluptate velit esse
                                                    cillum
                                                    dolore eu fugia
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <div class="box">
                                            <div class="img-box">
                                                <img src="images/client.jpg" alt="">
                                            </div>
                                            <div class="detail-box">
                                                <div class="client_info">
                                                    <div class="client_name">
                                                        <h5>
                                                            Morojink
                                                        </h5>
                                                        <h6>
                                                            Customer
                                                        </h6>
                                                    </div>
                                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut
                                                    labore
                                                    et
                                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                    ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                    in voluptate velit esse
                                                    cillum
                                                    dolore eu fugia
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <div class="box">
                                            <div class="img-box">
                                                <img src="images/client.jpg" alt="">
                                            </div>
                                            <div class="detail-box">
                                                <div class="client_info">
                                                    <div class="client_name">
                                                        <h5>
                                                            Morojink
                                                        </h5>
                                                        <h6>
                                                            Customer
                                                        </h6>
                                                    </div>
                                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut
                                                    labore
                                                    et
                                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                    ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                    in voluptate velit esse
                                                    cillum
                                                    dolore eu fugia
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_btn-box">
                        <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end client section -->

        <!-- contact section -->
        <section class="contact_section layout_padding-bottom">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Get In Touch
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <div class="form_container">
                            <form action="">
                                <div>
                                    <input type="text" placeholder="Your Name" />
                                </div>
                                <div>
                                    <input type="email" placeholder="Your Email" />
                                </div>
                                <div>
                                    <input type="text" placeholder="Your Phone" />
                                </div>
                                <div>
                                    <input type="text" class="message-box" placeholder="Message" />
                                </div>
                                <div class="btn_box ">
                                    <button>
                                        SEND
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
