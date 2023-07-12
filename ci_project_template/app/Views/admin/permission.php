<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/menu.css' rel='stylesheet'>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;

        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #6d7fcc !important;
            color: #fff !important;
        }

        /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #sidebarCollapse span {
                display: none;
            }
        }

        .table-responsive {
            margin: 30px 0;

        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>

    <script src="https://kit.fontawesome.com/c9c76eb124.js" crossorigin="anonymous"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #435d7d;">

        <div class="navbar-brand" href="#" style="color:white"><i class="fa-solid fa-bars" id="sidebarCollapse" style="padding-right: 30px;"></i><b>Navbar</b></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Link</a> -->
                </li>
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a> -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </li>
            </ul>

            <button class="btn btn-outline-white my-2 my-sm-0" onclick="logout()" style="background-color: red; color:white">Log Out</button>

        </div>
    </nav>


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
                            <?php foreach ($permission as $key => $row) : ?>
                                <a class="dropdown-item" href="<?= ADMIN_PATH ?>permission/<?= $row['Id'] ?>"> <?php echo $row["email"] ?></a>

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
                                <h2>Permission Panel
                                </h2>
                            </div>






                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <div class="text-right" style="margin-right: 20px; margin-bottom:10px;">
                            <button type="button" class="btn btn-success" onclick="status(<?= $row['Id'] ?>)">Save</button>
                        </div>



                        <thead>
                            <tr>

                                <th>Action</th>
                                <th>View</th>

                            </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <td>Log</td>
                                <?php ?>

                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input log" type="checkbox" id="log" name="log" value="<?= $row['log'] ?>" <?= $row['log'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Checkbox
                                        </label>
                                    </div>
                                </td>


                                <?php ?>

                            </tr>
                            <tr>
                                <td>Add</td>
                                <?php ?>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input add" type="checkbox" id="add" name="add" value="<?= $row['add'] ?>" <?= $row['add'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Checkbox
                                        </label>
                                    </div>
                                </td>

                                <?php ?>
                            </tr>
                            <tr>
                                <td>Edit</td>
                                <?php ?>

                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input edit" type="checkbox" id="edit" name="edit" value="<?= $row['edit'] ?>" <?= $row['edit'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Checkbox
                                        </label>
                                    </div>
                                </td>


                                <?php ?>
                            </tr>
                            <tr>
                                <td>Delete</td>
                                <?php ?>

                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input delete" type="checkbox" id="delete" name="delete" value="<?= $row['delete'] ?>" <?= $row['delete'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Checkbox
                                        </label>
                                    </div>
                                </td>


                                <?php ?>
                            </tr>
                            <tr>
                                <td>View</td>
                                <?php ?>

                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input view" type="checkbox" id="view" name="view" value="<?= $row['view'] ?>" <?= $row['view'] == 1 ? "checked" : "" ?>>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Checkbox
                                        </label>
                                    </div>
                                </td>


                                <?php ?>
                            </tr>

                            <td>Country</td>
                            <?php ?>

                            <td>
                                <div class="form-check">
                                    <input class="form-check-input country" type="checkbox" id="country" name="country" value="<?= $row['country'] ?>" <?= $row['country'] == 1 ? "checked" : "" ?>>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Checkbox
                                    </label>
                                </div>
                            </td>


                            <?php ?>
                            </tr>




















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
        function status($id) {
            var id = $id;
            var log = $('#log').is(':checked');
            log = log ? 1 : 0;
            var add = $('#add').is(':checked');
            add = add ? 1 : 0;
            var edit = $('#edit').is(':checked');
            edit = edit ? 1 : 0;
            var del = $('#delete').is(':checked');
            del = del ? 1 : 0;
            var view = $('#view').is(':checked');
            view = view ? 1 : 0;
            var country = $('#country').is(':checked');
            country = country ? 1 : 0;

            swal("Are you sure want to Save ", {
                dangerMode: true,
                buttons: true,
            }).then(function(status) {

                if (status) {

                    $.ajax({
                        type: "POST",
                        url: "<?= ADMIN_PATH ?>changeStatus",
                        dataType: "json",
                        crossDomain: true,
                        data: JSON.stringify({
                            'id': id,
                            'log': log,
                            'add': add,
                            'edit': edit,
                            'del': del,
                            'view': view,
                            'country': country,
                        }),

                        success: function(data) {
                            if (data.success == true) {

                                console.log(data);
                                swal("Saved successfully !!", "", "success", {
                                    button: "ok",

                                }).then(function() {

                                    window.location.href = "<?= ADMIN_PATH ?>permission/" + id;

                                });

                            } else {
                                $("#error_msg").text(data.error.message);
                            }

                        },
                        error: function(data) {
                            console.log("error is" + JSON.stringify(data));
                        }
                    });

                } else {
                    swal("Process cancelled", "", "success", {
                        button: "ok",

                    });
                }
            });




        }




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