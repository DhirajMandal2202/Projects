<?php include(INCLUDESPATH . '/header.php'); ?>



<!-- side bar  -->



<div class="wrapper" style="background-color:grey">
    <!-- Sidebar  -->
    <div id="sidebar" style="background-color:#435d7d">
        <div class="sidebar-header" style="background-color:#435d7d">
            <h3> Master Admin </h3>
        </div>

        <ul class="list-unstyled components" style="background-color:#435d7d">
            <li>
                <a href="<?= ADMIN_PATH ?>index">Home</a>
            </li>


            <li>
                <div class="dropdown">
                    <a class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Country

                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <?php foreach ($countryinfo as $key => $val) : ?>
                            <a class="dropdown-item" href="<?= ADMIN_PATH ?>state/ <?= $val['id'] ?>"> <?php echo $val["country"] ?></a>

                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="<?= ADMIN_PATH ?>adminLog" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Log Details

                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?= ADMIN_PATH ?>adminLog">All Log</a>
                    </div>
                </div>

            </li>

            <li>
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="<?= ADMIN_PATH ?>adminLog" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Permission

                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">

                        <?php foreach ($permission as $key => $val) : ?>
                            <a class="dropdown-item" href="<?= ADMIN_PATH ?>permission/<?= $val['Id'] ?>"> <?php echo $val["email"] ?></a>

                        <?php endforeach; ?>
                    </div>

                </div>

            </li>

        </ul>


    </div>
    <!-- content---------------------------------------------------------------------------------- -->

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage
                                Employees
                            </h2>
                        </div>
                        <div class="col-sm-6">

                            <!-- <a href="<?php echo ADMIN_PATH ?>create" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a> -->




                        </div>





                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Email</th>

                            <th>Action</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>            
                    <tbody>
                        <?php foreach ($col as $key => $val) : ?>
                            <tr>

                                <td><?php echo $val["id"] ?> </td>

                                <td><?php echo $val["email"] ?></td>
                                <td><?php echo $val["action"] ?></td>
                                <td><?php echo $val["date"] ?></td>
                                <td><?php echo $val["time"] ?></td>


                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
</div>



<script>
    function logout() {
        swal("Are you sure want to LogOut ?", {
            dangerMode: true,
            buttons: true,

        }).then(function() {



            swal("Logged Out Succefully !!", "", "success", {
                button: "ok",

            }).then(function() {

                window.location.href = "<?= USER_PATH ?>logout";


            });


        });
    }


    // function log() {

    //     window.location.href = "<?= ADMIN_PATH ?>userLog/";
    // }
</script>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

</body>

</html>