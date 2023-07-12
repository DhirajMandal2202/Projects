<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Document</title>


    <style>
        body,
        html {
            height: 100%;
            background-repeat: no-repeat;
            background: rgb(185, 210, 224);
            /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover, rgba(185, 210, 224, 1) 0%, rgba(187, 214, 228, 1) 0%, rgba(186, 211, 225, 1) 15%, rgba(186, 211, 225, 1) 38%, rgba(169, 199, 215, 1) 68%, rgba(169, 199, 215, 1) 68%, rgba(169, 199, 215, 1) 82%, rgba(158, 191, 208, 1) 100%);
            /* FF3.6-15 */
            background: -webkit-radial-gradient(center, ellipse cover, rgba(185, 210, 224, 1) 0%, rgba(187, 214, 228, 1) 0%, rgba(186, 211, 225, 1) 15%, rgba(186, 211, 225, 1) 38%, rgba(169, 199, 215, 1) 68%, rgba(169, 199, 215, 1) 68%, rgba(169, 199, 215, 1) 82%, rgba(158, 191, 208, 1) 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: radial-gradient(ellipse at center, rgba(185, 210, 224, 1) 0%, rgba(187, 214, 228, 1) 0%, rgba(186, 211, 225, 1) 15%, rgba(186, 211, 225, 1) 38%, rgba(169, 199, 215, 1) 68%, rgba(169, 199, 215, 1) 68%, rgba(169, 199, 215, 1) 82%, rgba(158, 191, 208, 1) 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b9d2e0', endColorstr='#9ebfd0', GradientType=1);
            /* IE6-9 fallback on horizontal gradient */

        }

        .login_box {
            background: #f7f7f7;
            border: 3px solid #F4F4F4;
            padding-left: 15px;
            margin-bottom: 25px;
        }

        .input_title {
            color: black;
            padding-left: 3px;
            margin-bottom: 2px;
        }

        hr {
            width: 100%;
        }

        .welcome {
            font-family: "myriad-pro", sans-serif;
            font-style: normal;
            font-weight: 100;
            color: #FFFFFF;
            margin-bottom: 25px;
            margin-top: 50px;

        }

        .login_title {
            font-family: "myriad-pro", sans-serif;
            font-style: normal;
            font-weight: 100;
            color: black;
        }

        .card-container.card {
            margin-top: 100px;
            max-width: 350px;

        }

        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
            border-radius: 0;
            background: #43A6EB;
            height: 55px;
            margin-bottom: 10px;
        }

        /*
 * Card component
 */
        .card {
            background-color: #FFFFFF;
            /* just in case there no content*/
            padding: 1px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 15%x;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .profile-img-card {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        /*
 * Form styles
 */
        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
        }

        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin #inputEmail,
        .form-signin #inputPassword {
            direction: ltr;
            height: 44px;
            font-size: 16px;
        }

        .form-signin input[type=email],
        .form-signin input[type=password],
        .form-signin input[type=text],
        .form-signin button {
            width: 100%;
            display: block;

            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
        }

        .btn.btn-signin {
            /*background-color: #4d90fe; */
            background-color: rgb(104, 145, 162);
            /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: rgb(12, 97, 33);
        }

        .forgot-password {
            color: rgb(104, 145, 162);
        }

        .forgot-password:hover,
        .forgot-password:active,
        .forgot-password:focus {
            color: rgb(12, 97, 33);
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="card card-container">
            <h2 class='login_title text-center'>Sign Up</h2>
            <hr>

            <form class="form-signin">

                <div class="form-group">
                    <label class="input_title">Name</label>
                    <h5 id="error_name" class="text-danger ms-3">

                    </h5>
                    <input type="text" id="name" name="name" class="login_box" placeholder=" name " autofocus>
                </div>


                <div class="form-group">
                    <label class="input_title">Surname</label>
                    <h5 id="error_surname" class="text-danger ms-3">

                    </h5>
                    <input type="text" id="surname" name="surname" class="login_box" placeholder=" surname ">
                </div>



                <div class="form-group">
                    <label class="input_title">Email</label>
                    <h5 id="error_email" class="text-danger ms-3">

                    </h5>
                    <input type="email" id="email" name="email" class="login_box" placeholder=" user@gmail.com">
                </div>


                <div class="form-group">
                    <label class="input_title">Password</label>
                    <h5 id="error_password" class="text-danger ms-3">

                    </h5>
                    <input type="password" id="password" name="password" class="login_box" placeholder="***********">
                </div>

                <div class="form-group">
                    <label class="input_title">Confirm Password</label>
                    <h5 id="error_confirm" class="text-danger ms-3">

                    </h5>
                    <input type="password" id="confirm" name="confirm" class="login_box " placeholder="***********">
                </div>


                <div class="form-group">
                    <label>Select Image (224 X 224) Dimensions</label>
                    <div class="custom-file">
                        <input name="component_image" type="file" class="custom-file-input" id="component_image">
                        <!-- <label class="custom-file-label" for="customFile">Choose Component Image</label> -->
                    </div>
                </div>


                <!-- 
                <div id="remember" class="checkbox">
                    <label>

                    </label>
                </div> -->
                <button type="button" class="btn btn-lg btn-primary ajaxstudent-save" id="SubmitForm">Sign Up</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->

    <script>
        $(document).ready(function() {

            $(document).on('click', '.ajaxstudent-save', function() {




                if (($.trim($('#name').val()).length == 0)) {
                    error_name = "Please enter Name";
                    $('#error_name').text(error_name);

                } else {


                    error_name = "";
                    $('#error_name').text(error_name);

                }





                if ($.trim($('#email').val()).length == 0) {
                    error_email = "Please enter Email";
                    $('#error_email').text(error_email);

                } else {


                    error_email = "";
                    $('#error_email').text(error_email);

                }

                if ($.trim($('#surname').val()).length == 0) {
                    error_surname = "Please enter Surname";
                    $('#error_surname').text(error_surname);

                } else {

                    error_surname = "";
                    $('#error_surname').text(error_surname);

                }

                if ($.trim($('#password').val()).length == 0) {
                    error_password = "Please enter password";
                    $('#error_password').text(error_password);

                } else {

                    error_password = "";
                    $('#error_password').text(error_password);

                }

                if (($.trim($('#confirm').val())) != ($.trim($('#password').val()))) {
                    error_confirm = "Not matched !!";
                    $('#error_confirm').text(error_confirm);

                } else {

                    error_confirm = "";
                    $('#error_confirm').text(error_confirm);
                }


                if (error_name != '' || error_email != '' || error_surname != '' || error_password != '' || error_confirm != '') {
                    console.log("error");

                    return false;

                } else {

                    var verify = 2;
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var surname = $("#surname").val();
                    var password = $("#password").val();
                    var component_image = $('#component_image')[0].files[0];




                    var formData = new FormData();
                    formData.append("verify", verify);
                    formData.append("name", name);
                    formData.append("email", email);
                    formData.append("surname", surname);
                    formData.append("password", password);
                    formData.append("component_image", component_image);


                    swal("Are you sure want to Add ", {
                        dangerMode: true,
                        buttons: true,
                    }).then(function(status) {

                        if (status) {
                            $.ajax({
                                url: "<?= USER_PATH ?>newuser",
                                type: "POST",
                                crossDomain: true,
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,



                                success: function(data) {
                                    console.log(data)

                                    if (data.success == true) {


                                        swal("Saved successfully !!", "", "success", {
                                            button: "ok",

                                        }).then(function() {

                                            window.location.href = "<?= USER_PATH ?>login"
                                        });
                                    }
                                },
                                error: function(data) {
                                    console.log("error is" + data);
                                }
                            })
                        } else {

                            swal("Process cancelled", "", "success", {
                                button: "ok",

                            });

                        }


                    })








                }



            });

        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">


    </script>



</body>

</html>