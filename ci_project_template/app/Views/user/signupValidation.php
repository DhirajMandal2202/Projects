<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->


    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

                    <input type="text" id="name" name="name" class="login_box" placeholder=" name " autofocus>
                    <h5 id="error_name" class="text-danger ms-3">

                    </h5>
                </div>


                <div class="form-group">
                    <label class="input_title">Surname</label>

                    <input type="text" id="surname" name="surname" class="login_box" placeholder=" surname ">
                    <h5 id="error_surname" class="text-danger ms-3">

                    </h5>
                </div>



                <div class="form-group">
                    <label class="input_title">Email</label>

                    <input type="email" id="email" name="email" class="login_box" placeholder=" user@gmail.com">
                    <h5 id="error_email" class="text-danger ms-3">

                    </h5>
                </div>


                <div class="form-group">
                    <label class="input_title">Password</label>

                    <input type="password" id="password" name="password" class="login_box" placeholder="***********">
                    <h5 id="error_password" class="text-danger ms-3">

                    </h5>
                </div>

                <div class="form-group">
                    <label class="input_title">Confirm Password</label>

                    <input type="password" id="confirm" name="confirm" class="login_box " placeholder="***********">
                    <h5 id="error_confirm" class="text-danger ms-3">

                    </h5>
                </div>


                <div class="form-group">
                    <label>Select Image (224 X 224) Dimensions</label>
                    <div class="custom-file">
                        <input name="component_image" type="file" class="custom-file-input" id="component_image">
                        <!-- <label class="custom-file-label" for="customFile">Choose Component Image</label> -->
                    </div>
                </div>


                <button type="button" class="btn btn-lg btn-primary ajaxstudent-save" id="SubmitForm" name="SubmitForm">Sign Up</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->

    <!-- validation---------------------------------------------------------------------------------------------- -->
    <script>
        $(document).ready(function() {

            // Validate Username -------------------------------------------------------
            $("#error_name").hide();
            let usernameError = true;
            $("#name").keyup(function() {
                validateUsername();
            });

            function validateUsername() {
                let usernameValue = $("#name").val();
                if (usernameValue.length == "") {
                    $("#error_name").show();
                    usernameError = false;
                    return false;
                } else if (usernameValue.length < 3 || usernameValue.length > 20) {
                    $("#error_name").show();
                    $("#error_name").html("**length of Surname must be between 3 and 20");
                    usernameError = false;
                    return false;
                } else {
                    $("#error_name").hide();
                    usernameError = true;
                }
            }

            // Validate Surname ------------------------------------------------------
            $("#error_surname").hide();
            let surnameError = true;
            $("#surname").keyup(function() {
                validateSurname();
            });

            function validateSurname() {
                let usernameValue = $("#surname").val();
                if (usernameValue.length == "") {
                    $("#error_surname").show();
                    surnameError = false;
                    return false;
                } else if (usernameValue.length < 3 || usernameValue.length > 20) {
                    $("#error_surname").show();
                    $("#error_surname").html("**length of username must be between 3 and 20");
                    surnameError = false;
                    return false;
                } else {
                    $("#error_surname").hide();
                    surnameError = true;

                }
            }


            //validation of Email ------------------------------------------------------------------------------------------------
            $("#error_email").hide();
            let emailError = true;
            $("#email").keyup(function() {
                validateEmail();
            });

            function validateEmail() {
                const email = document.getElementById("email");
                email.addEventListener("keyup", () => {
                    let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
                    let s = email.value;
                    if (regex.test(s)) {

                        $("#error_email").hide();

                        // email.classList.remove("is-invalid");
                        emailError = true;
                    } else {

                        $("#error_email").show();
                        $("#error_email").html("**invalid - Email");
                        // email.classList.add("is-invalid");
                        emailError = false;
                    }
                });
            }

            //validation of Password -----------------------------------------------------------------------------------------------

            $("#error_password").hide();
            let passwordError = true;
            $("#password").keyup(function() {
                validatePassword();
            });

            function validatePassword() {
                let passwordValue = $("#password").val();
                if (passwordValue.length == "") {
                    $("#error_password").show();
                    passwordError = false;
                    return false;
                }
                if (passwordValue.length < 3 || passwordValue.length > 10) {
                    $("#error_password").show();
                    $("#error_password").html(
                        "**length of your password must be between 3 and 10"
                    );
                    $("#error_password").css("color", "red");
                    passwordError = false;
                    return false;
                } else {
                    $("#error_password").hide();
                    passwordError = true;
                }
            }

            //validation of Confirm password ------------------------------------------------------------------------------------------
            $("#error_confirm").hide();
            let confirmPasswordError = true;
            $("#confirm").keyup(function() {
                validateConfirmPassword();
            });

            function validateConfirmPassword() {
                let confirmPasswordValue = $("#confirm").val();
                let passwordValue = $("#password").val();
                if (passwordValue != confirmPasswordValue) {
                    $("#error_confirm").show();
                    $("#error_confirm").html("**Password didn't Match");
                    $("#error_confirm").css("color", "red");
                    confirmPasswordError = false;
                    return false;
                } else {
                    $("#error_confirm").hide();
                    confirmPasswordError = true;
                }
            }



            $("SubmitForm").click(function() {

                usernameError = true;
                passwordError = true;
                confirmPasswordError = true;
                emailError = true;
                surnameError = true;

                console.log("test_");



                validateUsername();
                validatePassword();
                validateConfirmPassword();
                validateEmail();


                if (

                    (usernameError == true) &&
                    (passwordError == true) &&
                    (confirmPasswordError == true) &&
                    (emailError == true) && (surnameError == true)




                ) {
                    console.log("test1");


                    var name = $("#name").val();
                    var email = $("#email").val();
                    var surname = $("#surname").val();
                    var password = $("#password").val();
                    var component_image = $('#component_image')[0].files[0];





                    var formData = new FormData();
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
                } else {
                    return false;
                }













            });

        });
    </script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</body>

</html>