<?php include("inc/header.php");?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include("inc/menubar.php"); ?>

            <!-- Layout container -->
            <div class="layout-page">
                <?php include("inc/topbar.php");?>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <?php
                                $do = isset($_GET['do']) ? $_GET['do'] : "Manage" ;
                                
                                if($do == "Manage"){
                                    ?>
                            <div class="card">
                                <div class="row align-items-center ">
                                    <div class="col-8">
                                        <h5 class="card-header">Manage All Users</h5>
                                    </div>
                                    <div class="col-4">
                                        <input class="form-control " type="text" id="myInput" onkeyup="myFunction()"
                                            placeholder="Search Table Data" title="Type in a name">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive text-nowrap">
                                        <table id="myTable" class="table table-bordered table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Role</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Join Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                        $sql = "SELECT * FROM users ORDER BY name DESC";
                                                        $query = mysqli_query($db, $sql);
                                                        $rowCount = mysqli_num_rows($query);
                                                        if($rowCount == 0){
                                                            echo "<td class='alert alert-warning'> No Data Found  </td>";
                                                        }else{
                                                            While($row = mysqli_fetch_assoc($query)){
                                                                $id       =   $row['id'];
                                                                $name       =   $row['name'];
                                                                $email      =   $row['email'];
                                                                $password   =   $row['password'];
                                                                $phone   =   $row['phone'];
                                                                $address    =   $row['address'];
                                                                $role     =   $row['role'];
                                                                $image      =   $row['image'];
                                                                $status     =   $row['status'];
                                                                $join_date  =   $row['join_date'];

                                                                ?>
                                                <tr>
                                                    <td>
                                                        <strong><?php echo $name; ?></strong>
                                                    </td>
                                                    <td><?php echo $email; ?></td>
                                                    <td><?php echo $phone; ?></td>
                                                    <td><?php echo $address; ?></td>
                                                    <td>
                                                        <?php 
                                                                if($role == 1){echo '<span class="badge bg-label-primary me-1">Admin</span>';}
                                                                if($role == 2){echo '<span class="badge bg-label-danger me-1">User</span>';}
                                                                ?>
                                                    </td>
                                                    <td>
                                                        <ul
                                                            class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                                title="" data-bs-original-title="<?php echo $name ; ?>">
                                                                <img src="../assets/img/avatars/7.png"
                                                                    class="rounded-circle">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                                if($status == 1){echo '<span class="badge bg-label-primary me-1">Active</span>';}
                                                                if($status == 2){echo '<span class="badge bg-label-danger me-1">Inactive</span>';}
                                                                ?>
                                                    </td>
                                                    <td><?php echo $join_date ?> </td>
                                                    <td>
                                                        <a href=""><i class='bx bxs-edit'></i></a>
                                                        <a href=""><i class='bx bxs-trash'></i></a>
                                                    </td>

                                                    <?php

                                                            }
                                                        }
                                                            ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }else if($do == "Create"){
                                    ?>
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Add User</h5>
                                    <div class="card-body">
                                        <form action="users.php?do=Store" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                            <div class="mb-3 row">
                                                <label for="name" class="col-md-2 col-form-label">Write your Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Jhon Deo" id="name"
                                                        name="name" required>
                                                        <div class="valid-feedback">Looks good!</div>
                                                        <div class="invalid-feedback">Please enter a Name.</div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="email" class="col-md-2 col-form-label">Enter Your Email</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="email" id="email" name="email"
                                                        placeholder="me@gmail.com" required>
                                                        <div class="valid-feedback">Looks good!</div>
                                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="phone" class="col-md-2 col-form-label">Enter Phone
                                                    Number</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="tel" placeholder="+88..." id="phone"
                                                        name="phone" required>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="password" class="col-md-2 col-form-label">Enter Your
                                                    Password</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" id="password" name="password" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please enter a password.</div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="rePassword" class="col-md-2 col-form-label">Retype Your
                                                    Password</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="password" id="rePassword" name="rePassword" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please Retype your Password</div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="address"
                                                    class="col-md-2 col-form-label">Enter Your Address</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="address" id="address"
                                                        rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="role" class="col-md-2 col-form-label">User Role</label>
                                                <div class="col-md-10">
                                                    <select class="form-select" name="role" id="role">
                                                        <option value="1">Admin</option>
                                                        <option value="2">User</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label for="image" class="col-md-2 col-form-label">Upload User Photo</label>
                                                <div class="col-md-10">
                                                    <input type="file" class="form-control" id="image" name="image">
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label for="status" class="col-md-2 col-form-label">User Status</label>
                                                <div class="col-md-10">
                                                    <select class="form-select" name="status" id="status">
                                                        <option value="2">Select User Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="2">Inactive</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <input type="submit" value="Add User" name="submit" class="btn btn-primary">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }else if($do == "Store"){
                                    if(isset($_POST['submit'])){
                                        $name           = mysqli_real_escape_string($db, $_POST['name']);
                                        $email          = mysqli_real_escape_string($db, $_POST['email']);
                                        $phone          = mysqli_real_escape_string($db, $_POST['phone']);
                                        $password       = mysqli_real_escape_string($db, $_POST['password']);
                                        $rePassword     = mysqli_real_escape_string($db, $_POST['rePassword']);
                                        $address        = mysqli_real_escape_string($db, $_POST['address']);
                                        $role           = mysqli_real_escape_string($db, $_POST['role']);
                                        $image          = mysqli_real_escape_string($db, $_POST['image']);
                                        $status         = mysqli_real_escape_string($db, $_POST['status']);

                                        if($password === $rePassword){
                                            $hashPass = sha1($password);
                                            $sql = "INSERT INTO users (name, email, phone, password, address, role, image, status, join_date ) VALUES ('$name', '$email', '$phone', '$hashPass', '$address', '$role', '$image', '$status', now())";
                                            $query = mysqli_query($db, $sql);
                                            if($query){
                                                header("Location: users.php");
                                            }else{
                                                die("Add User problem". mysqli_error($db));
                                            }
                                        }else{
                                            echo "<span class='badge bg-danger'>  The entered passwords do not match. Please try again. </span>";
                                        }
                                      } 
                                }else if($do == "Edit"){
                                    echo "Edit User data";
                                }else if($do == "Delete"){
                                    echo "Delete User Data";
                                }
                                else{
                                    echo '<div class="alert alert-warning" role="alert">404 error this page not found</div>';
                                }
                            ?>
                        </div>
                        <!-- / Content -->

                        <?php include("inc/footer.php"); ?>