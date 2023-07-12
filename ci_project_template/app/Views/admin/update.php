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
	<style>
		body {
			color: #566787;
			background: grey;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;

		}




		/* Modal styles */
		.modal-dialog {
			max-width: 500px;

		}

		.modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 30px 30px;
		}

		.modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal-title {
			display: inline-block;
			color: blue;


		}

		.form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
			margin-top: -2rem;

		}

		textarea.form-control {
			resize: vertical;
		}

		.btn {
			border-radius: 2px;
			min-width: 100px;
		}

		form label {
			font-weight: normal;
			height: 50px;
		}
	</style>

</head>

<body>

	<!-- Edit Modal HTML -->


	<div class="containe-fluid ">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Update Employee</h4>

					</div>
					<div class="modal-body">


						<div class="form-group">

							<input type="hidden" id="id" class="form-control" name="id" value="<?= $single['id'] ?>">

							<label for="name">Name</label>
							<input type="text" id="name" class="form-control" name="name" value="<?= $single['name'] ?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label><span id="error_email" class="text-danger ms-3"></span>
							<input type="email" id="email" class="form-control" name="email" value="<?= $single['email'] ?>">
						</div>

						<div class="form-group">
							<label for="phone">Phone</label><span id="error_phone" class="text-danger ms-3"></span>
							<input type="text" id="phone" class="form-control" name="phone" value="<?= $single['phone'] ?>">
						</div>
						<div class="form-group">
							<label style="height: 20px;">Select Image (224 X 224) Dimensions</label>
							<div class="custom-file">
								<label class="custom-file-label" for="customFile"><?= $single['image'] ?></label>
								<input name="component_image" type="file" class="custom-file-input" id="component_image" value="<?= $single['image'] ?>">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a href="<?= ADMIN_PATH ?>index/"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
						<span id="SubmitForm" onclick="myFunction()" class="btn btn-success ajaxstudent-save">Update</span>

					</div>
				</form>


			</div>
		</div>
	</div>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script>
		function myFunction() {

			// $id = $("#id").val();
			var id = $("#id").val();
			var name = $("#name").val();
			var email = $("#email").val();
			var phone = $("#phone").val();
			// var component_image = $('#component_image').val();
			var component_image = $('#component_image')[0].files[0];


			var formData = new FormData();

			formData.append("id", id);
			formData.append("name", name);
			formData.append("email", email);
			formData.append("phone", phone);
			formData.append("component_image", component_image);

			swal("Are you sure want to Update", {
				dangerMode: true,
				buttons: true,
			}).then(function(status) {

				if (status) {

					// formData['id'];


					// console.log(id);
					$.ajax({

						url: "<?php echo ADMIN_PATH  ?>updateActionImg",
						type: "POST",
						data: formData,
						crossDomain: true,
						cache: false,
						contentType: false,
						processData: false,



						success: function(data) {
							console.log(data)

							if (data.success == true) {


								swal("Update successfully !!", "", "success", {
									button: "ok",

								}).then(function() {

									window.location.href = "<?= ADMIN_PATH ?>index"
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
	</script>



</body>

</html>