@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title' , 'Dashboard')


@section('main')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        
   
        <div class="col-lg-12">
            <!-- USER DATA-->
            <div class="user-data m-b-30" style="background-color: white;padding:2%">
                <div class="col-xl-8 mb-4 col-lg-7 col-12">
                    <div class="card h-100">
                      <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                          <h5 class="card-title mb-0">Statistics</h5>
                          <small class="text-muted">Updated 1 month ago</small>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row gy-3">
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">3</h5>
                                <small>Services</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-info me-3 p-2">
                                <i class="ti ti-users ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">5</h5>
                                <small>Users</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                <i class="ti ti-shopping-cart ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">2</h5>
                                <small>Users Subscriptions</small>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                              <div class="badge rounded-pill bg-label-success me-3 p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                              </div>
                              <div class="card-info">
                                <h5 class="mb-0">$9745</h5>
                                <small>Revenue</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- END USER DATA-->
            </div>
        </div>

    </div>
</div>

@endsection