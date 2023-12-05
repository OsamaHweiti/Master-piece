@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title', 'prices')


@section('main')

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="container border-radius">
               
                <div id="adddiv" style="background-color: white; text-align: center; padding:1%; display:none">
                    <form method="post" action="{{ route('pricing.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label class="col-2">Name:</label>
                        <input class="col-5" type="text" name="name" required><br>
                        <label class="col-2">Ram:</label>
                        <input class="col-5" type="text" name="ram" required><br>
                        <label class="col-2">Storage:</label>
                        <input class="col-5" type="text" name="storage" required><br>
                        <label class="col-2">Price:</label>
                        <input class="col-5" type="number" name="price" required><br>
                        <label class="col-2">Services:</label>
                        <select class="col-5" name="service_id" required>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select><br>
                        <br>
                        <input type="submit" class="btn btn-outline-secondary" value="Add Price">
                    </form>

                </div>

            </div>
            <hr>
            <div class="col-lg-12">
                <!-- USER DATA-->
                <div class="user-data m-b-30" style="background-color: white;padding:2%">
                    <div class="row justify-content-between mb-3">
                        <div class="col-lg-8">
                            <h3 class="title-3">
                                <i class="zmdi zmdi-account-calendar"></i> Prices
                            </h3>
                        </div>
                        <div class="col mb-2">

                            <form method="post">
                                <p style="text-align: left; color: #888">Total number of Prices: {{ $sum }} &nbsp;
                                    <input type="button" id="addUser-btn" class="btn btn-outline-secondary"
                                        value="Add Price" name="Add Price">
                            </form>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive table-data">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Service name</td>
                                        <td>Price</td>
                                      
                                        
                                        <td>Ram</td>
                                        <td>Storage</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prices as $price)
                                        <tr>
                                           
                                            <td>{{ $price->name }}</td>
                                            <td>{{ $price->service->name }}</td>
                                            <td>{{ $price->price }}$</td>
                                            <td>{{ $price->ram }}</td>
                                            <td>{{ $price->storage }}</td>

                                            <td>
                                                <a href="{{ route('priceedit', $price->id) }}">
                                                    <button class="btn btn-outline-primary" value="Edit" name="editpro">
                                                        Edit
                                                    </button></a>
                                            </td>
                                            <td>
                                                
                                                <form method="post"action="{{ route('pricedelete', $price->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-outline-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- END USER DATA-->
                </div>
            </div>

        </div>
    </div>
@endsection
