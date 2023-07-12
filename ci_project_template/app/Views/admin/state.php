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
                        <h2> List of State in <?= $state[0]["country"] ?>
                        </h2>
                    </div>






                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Country</th>
                        <th>State</th>



                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($state as $key => $val) : ?>
                        <tr>

                            <td><?= $val["country"] ?> </td>
                            <td><?= $val["state"] ?> </td>



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
    function log(id) {



        $.ajax({
            type: "post",
            url: "<?php echo ADMIN_PATH ?>userLog",


            dataType: "json",
            crossDomain: true,
            data: JSON.stringify({
                "id": id
            }),


            success: function(data) {


                if (data.success == true) {
                    console.log(data);



                }
            },
            error: function(data) {
                console.log("error" + JSON.stringify(data));

            }
        })




    }

    function logout() {
        swal("Are you sure want to LogOut ?", {
            dangerMode: true,
            buttons: true,

        }).then(function(ok) {

            if (ok) {


                swal("Logged Out Succefully !!", "", "success", {
                    button: "ok",

                }).then(function() {
                    window.location.href = "<?= ADMIN_PATH ?>logout";

                });
            } else {
                window.location.href = "<?= ADMIN_PATH ?>index";
            }

        });
    }

    function deleteConfirm(id) {

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();

        swal("Are you sure want to Delete ", {
            dangerMode: true,
            buttons: true,
        }).then(function(status) {

            if (status) {
                $.ajax({
                    type: "post",
                    url: "<?php echo ADMIN_PATH ?>deleteAction",
                    data: "data",
                    dataType: "json",
                    crossDomain: true,
                    data: JSON.stringify({
                        "id": id
                    }),


                    success: function(data) {


                        if (data.success == true) {
                            console.log(data);


                            swal("Delete successfully !!", "", "success", {
                                button: "ok",

                            }).then(function() {

                                window.location.reload();
                            });
                        }
                    },
                    error: function(data) {
                        console.log("error" + JSON.stringify(data));
                        window.location.reload();
                    }
                })
            } else {

                swal("Process cancelled", "", "success", {
                    button: "ok",

                });
            }






        })



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