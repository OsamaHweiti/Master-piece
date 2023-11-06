@extends('admin/adminmaster')
@extends('admin/include/header')


@section('title' , 'Dashboard')


@section('main')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="container border-radius">
            <div id="editdiv" style="background-color: white; text-align: center; padding:1%; display:none">
                <form method="post" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id-input" name="id">
                    <label class="col-2">First Name:</label>
                    <input class="col-5" id="fname-input" type="text"  name="fname"><br>
                    <label class="col-2">Last Name:</label>
                    <input class="col-5" id="lname-input" type="text" name="lname"><br>
                    <label class="col-2">BirthDate:</label>
                    <input class="col-5" id="bdate-input" type="date" name="bdate" required><br>
                    <label class="col-2">Gender:</label>
                    <select class="col-5" name="gender">
                        <option name="gender" id="gender-male" value="male">Male</option>
                        <option name="gender" id="gender-female" value="female">FeMale</option>
                    </select><br>
                    <label class="col-2">Email:</label>
                    <input class="col-5" id="email-input" type="text"  name="email"><br>
                    <label class="col-2">Password:</label>
                    <input class="col-5" id="password-input" type="text" name="password"><br>
                    <label class="col-2">Mobile:</label>
                    <input class="col-5" id="mobile-input" type="text"  name="phone"><br>
                    <label class="col-2" >Admin:</label>
                    <input type="radio" id="admin-yes" value="1" name="is_admin" required> Yes
                    <input type="radio" id="admin-no" value="0" name="is_admin" required> No<br><br>
                    <input type="submit" class="btn btn-outline-secondary" value="Save">
                </form>
            </div>
            <div id="adddiv" style="background-color: white; text-align: center; padding:1%; display:none">
                <form method="post" action="">
                    @csrf
                    <label class="col-2">First Name:</label>
                    <input class="col-5" type="text" name="fname" required><br>
                    <label class="col-2">Last Name:</label>
                    <input class="col-5" type="text" name="lname" required><br>
                    <label class="col-2">BirthDate:</label>
                    <input class="col-5" type="date" name="bdate" required><br>
                    <label class="col-2">Gender:</label>
                    <select class="col-5" name="gender">
                        <option name="gender" value="male">Male</option>
                        <option name="gender" value="female">FeMale</option>
                    </select><br>
                    <label class="col-2">Email:</label>
                    <input class="col-5" type="text" name="email" required><br>
                    <label class="col-2">Mobile:</label>
                    <input class="col-5" type="text" name="phone" required><br>
                    <label class="col-2">Password:</label>
                    <input class="col-5" type="text" name="password" required><br>
                    <label class="col-2">Admin:</label>
                    <input type="radio" value="1" name="is_admin" required> Yes
                    <input type="radio" value="0" name="is_admin" required> No<br><br>
                    <input type="submit" class="btn btn-outline-secondary" value="Add">
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
                            <i class="zmdi zmdi-account-calendar"></i> Users
                        </h3>
                    </div>
                    <div class="col mb-2" >

                        <form method="post">
                            <p style="text-align: left; color: #888">Total number of users:  &nbsp;
                            <input type="button" id="addUser-btn" class="btn btn-outline-secondary" value="Add New User" name="adding">
                        </form>
                    </div>

                    <div class="table-responsive table-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>BDate</td>
                                    <td>Gender</td>
                                    <td>Email</td>
                                    <td>Mobile</td>
                                    <td>Is Admin</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                             
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