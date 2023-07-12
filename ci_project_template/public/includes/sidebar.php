<div class="wrapper" style="background-color:grey">
    <!-- Sidebar  -->
    <div id="sidebar" style="background-color:#435d7d">
        <div class="sidebar-header" style="background-color:#435d7d">
            <h6>Hello !!</h6><br>
            <h6><?= $data['email'] ?></h6>
        </div>

        <ul class="list-unstyled components" style="background-color:#435d7d">

            <li>
                <a href="<?= USER_PATH ?>index">Home</a>
            </li>

            <?php $country = $controller->countryStatus();


            if ($country == '1') {
            ?>




                <li>
                    <div class="dropdown">
                        <a class=" dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Country

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <?php foreach ($countryinfo as $key => $val) : ?>
                                <a class="dropdown-item" href="<?= USER_PATH ?>state/ <?= $val['id'] ?>"> <?php echo $val["country"] ?></a>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>

            <?php
            }
            ?>


            <?php $log = $controller->logStatus();


            if ($log == '1') {
            ?>
                <li>

                    <a href="<?= USER_PATH ?>logdetails">
                        Log Details

                    </a>

                </li>
            <?php
            }
            ?>








            <?php $view = $controller->viewStatus();


            if ($view == '1') {
            ?>
                <li>

                    <a href="#">View</a>



                </li>
            <?php
            }
            ?>





        </ul>


    </div>