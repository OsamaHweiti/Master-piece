@extends('homepage/includes/masterpage')
@extends('homepage/includes/header')

@section('title' , 'pricing')
{{-- @section('body-class', 'sub_page') --}}

@section('slider')
    @include('homepage/includes/slider')
@endsection

@section('main')
    
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

        {{-- <div class="box">
          <div class="detail-box">
            <h2>$ <span>49</span></h2>
            <h6>
              Startup
            </h6>
            <ul class="price_features">
              <li>
                2GB RAM
              </li>
              <li>
                20GB SSD Cloud Storage
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
            <a href="">
              See Detail
            </a>
          </div>
        </div>
        <div class="box">
          <div class="detail-box">
            <h2>$ <span>99</span></h2>
            <h6>
              Standard
            </h6>
            <ul class="price_features">
              <li>
                4GB RAM
              </li>
              <li>
                50GB SSD Cloud Storage
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
            <a href="">
              See Detail
            </a>
          </div>
        </div>
        <div class="box">
          <div class="detail-box">
            <h2>$ <span>149</span></h2>
            <h6>
              Business
            </h6>
            <ul class="price_features">
              <li>
                8GB RAM
              </li>
              <li>
                100GB SSD Cloud Storage
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
            <a href="">
              See Detail
            </a>
          </div>
        </div> --}}
        
      </div>
    </div>
  </section>
@endsection