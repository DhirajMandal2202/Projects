<?php include(INCLUDESPATH . '/header.php'); ?>

<!-- nav bar  -->


<!-- side bar -->
<?php include(INCLUDESPATH . '/sidebar.php'); ?>
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

</div> s
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