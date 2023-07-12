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

					<?php $add = $controller->addStatus();


					if ($add == '1') {
					?>

						<div class="col-sm-6">
							<a href="<?php echo ADMIN_PATH ?>create" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						</div>
					<?php
					}
					?>






				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>

						<th>Name</th>
						<th>Email</th>

						<th>Phone</th>
						<th>Image</th>
						<?php $edit = $controller->editStatus();
						$del = $controller->delStatus();


						if (($edit == '1') or ($del == '1')) {
						?>
							<th>Actions</th>
						<?php
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($userdata as $key => $val) : ?>
						<tr>

							<td><?php echo $val["name"] ?> </td>

							<td><?php echo $val["email"] ?></td>
							<td><?php echo $val["phone"] ?></td>
							<td><img src="<?php echo FETCH_IMAGE; ?>component/<?= $val['image'] ?> " class="img-responsive" style="heigth:50px;width:50px;"></td>

							<?php $edit = $controller->editStatus();
							$del = $controller->delStatus();


							if (($edit == '1') or ($del == '1')) {
							?>

								<td>

									<?php if ($edit == '1') { ?>

										<a href="<?php echo ADMIN_PATH . "update/ " . $val['id'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

									<?php } ?>


									<?php if ($del == '1') { ?>

										<a onclick="deleteConfirm(<?php echo $val['id'] ?>)" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

									<?php } ?>
								</td>

							<?php
							}
							?>




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
					window.location.href = "<?= USER_PATH ?>logout";

				});
			} else {
				window.location.href = "<?= USER_PATH ?>index";
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
			console.log("enter");
		});
	});
</script>

</body>

</html>