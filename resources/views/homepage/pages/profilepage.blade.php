{{-- 


@extends('homepage/includes/masterpage')
@extends('homepage/includes/header')

@section('title', 'profile')
@section('body-class', 'sub_page')

@section('main')
  
<style>
    body {
        background-color: #f9f9fa
    }

    .padding {
        padding: 3rem !important
    }

    #name {
        color: white;
    }

    .editbtn {
        background-color: black;
        border-radius: 5rem;
        font-size: large;

    }

    #member {
        color: white;
        font-weight: bold;
        font-size: 1rem;
    }

    #edit {
        color: white;
    }

    .user-card-full {
        overflow: hidden;
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px;
    }

    .m-r-0 {
        margin-right: 0px;
    }

    .m-l-0 {
        margin-left: 0px;
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px;
    }

    .bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#282626), to(#302527));
        background: linear-gradient(to right, #2b2223, #9b3303);
    }

    .user-profile {
        padding: 20px 0;
    }

    .card-block {
        padding: 1.25rem;
    }

    .m-b-25 {
        margin-bottom: 25px;
    }

    .img-radius {
        border-radius: 5px;
    }



    h6 {
        font-size: 14px;
    }

    #page-content {
        margin-top: 5rem;
        margin-left: 3.5rem;
    }

    .card .card-block p {
        line-height: 25px;
    }

    @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px;
        }
    }

    .card-block {
        padding: 1.25rem;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .card .card-block p {
        line-height: 25px;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .text-muted {
        color: #919aa3 !important;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .f-w-600 {
        font-weight: 600;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .user-card-full .social-link li {
        display: inline-block;
    }

    .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }
</style>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">

                @if (\Session::has('success'))
                    <div class="alert alert-success " id="success-alert">
                        <p>{{ \Session::get('success') }}</p>
                    </div>

                    <script>
                        var milliseconds = 2500;
                        setTimeout(function() {
                            document.getElementById('success-alert').remove();
                        }, milliseconds);
                    </script>
                @endif
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="./assets/images/" class="img-radius"
                                        width="110rem" alt="User-Profile-Image">
                                </div>
                                <h3 class="f-w-600" id="name"></h3>
                                <p id="member">Member</p>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                <a href="/editmyprofile"> <button class="editbtn"> <i class="fa-solid fa-user-pen"
                                            id="edit"></i> </button></a>
                                <a href="/"> <button class="editbtn"><i class="fa-solid fa-house"
                                            style="color: #ffffff;"></i></button></a>
                                <a href="/logout"> <button class="editbtn"><i class="fa-solid fa-right-from-bracket"
                                            style="color: #ffffff;"></i></button></a>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">


                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Name</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->username }} </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->phone }}</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Subscription</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Start in </p>
                                        <h6 class="text-muted f-w-400"></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">End in</p>
                                        <h6 class="text-muted f-w-400">ff</h6>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="css/style.css" rel="stylesheet" />
 <!-- responsive style -->
 <link href="css/responsive.css" rel="stylesheet" />
 {{-- font awosom --}}
 <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
 href="/css/app-wa-9a55d8748fd46de7b7977d9ee8dee7a4.css?vsn=d">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">
    
    <style type="text/css">
       .header_section{
        background: #020230; 
       }
        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
</head>

<body>
@include('homepage/includes/navbar')
    <div class="container">
        <div class="main-body">
            <div class="navbar"></div>
            
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>  {{ Auth::user()->username }}</h4>
                                    <p class="text-secondary mb-1">  {{ Auth::user()->phone }}</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">UserName</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->username }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="4e28273e0e243b25233b26602f22">{{ Auth::user()->email }}</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>
                            <hr>
                            
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->Address }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank"
                                        href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-body text-center  ">
                              <h5 class="d-flex align-items-center text-center  mb-3">
                               Subscriptions
                              </h5><hr>
                              <p>Plan:<strong> {{$subscription->price->name}}</strong></p>
                              <div class=" mb-3" >
                                Plan info : {{$subscription->price->ram}}<br>
                                Storage : {{$subscription->price->storage}} <br>
                                Duration : {{$subscription->duration_days}} Days<br>
                              </div>
                             
                              <button class="btn btn-info">Info about Subscription</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>

    @include('homepage/includes/footer')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    
</body>

</html>
