<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;

// defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends MyController
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->utc_time = date('H:i:s');
        $this->utc_date = date('Y-m-d');
        $this->dataModule = array();
        $this->dataModule['controller'] = $this;
        // $this->db = \Config\Database::connect();
    }
    // Admin Dashboard ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function index($id)
    {



        $userModel = new Sitefunction();
        $userModel->protect(false);

        $this->dataModule['controller'] = $userModel->get_all_rows(TBL_CREDENTIAL, '*', array('Id' => $id));


        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['countryinfo'] = $userModel->get_all_rows(TBL_COUNTRY, '*');










        echo view("subadmin/subadmin", $this->dataModule);
    }

    public function userLog()
    {


        $requestData = $this->request->getJSON();




        // $userModel = new Sitefunction();

        // $userModel->delete_data('info', array('id' => $requestData->id));
        // $id = $requestData['id'];

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['col'] = $userModel->get_all_rows(TBL_LOG, '*', array('userId' => $requestData->id));
        echo view("admin/logAd", $data);
        $data = array(
            'message' => 'Delete Successfully',
        );
        $this->dataModule = $this->success($data);

        return $this->respond($this->dataModule);
    }


    //Log Details ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------   
    public function adminLog()
    {

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['countryinfo'] = $userModel->get_all_rows(TBL_COUNTRY, '*');

        $userModel = new Sitefunction();
        $this->dataModule['col'] = $userModel->get_all_rows(TBL_LOG, '*');
        echo view("admin/logAd", $this->dataModule);
    }


    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    //Add Employee ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //calling the add form
    public function create()
    {
        echo view("admin/create");
    }
    //Save the form
    public function addActionImg()
    {
        $requestData = $_POST;

        $name = $requestData['name'];
        $email = $requestData['email'];
        $phone = $requestData['phone'];


        $data_array['name'] = $name;
        $data_array['email'] = $email;
        $data_array['phone'] = $phone;


        if (isset($_FILES['component_image']) && !empty($_FILES['component_image'])) {

            $randdom = round(microtime(time() * 1000)) . rand(000, 999);

            $file_extension1 = pathinfo($_FILES['component_image']["name"], PATHINFO_EXTENSION);

            $file_name1 = $randdom . '.' . $file_extension1;

            if ($_FILES['component_image']["error"] <= 0) {

                move_uploaded_file($_FILES['component_image']['tmp_name'], IMAGE_UPLOAD_PATH . 'component/' . $file_name1); //folder in upload/component

                $data_array['image'] = $file_name1; //db column name
            } else {

                $data_array['component_image'] = 'NA';
            }
        }

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $result = $userModel->insert_data(TBL_INFO, $data_array);

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['employee'] = $result;
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['employee'] = $userModel->get_all_rows(TBL_INFO, '*');

        if ($result) {
            $data = array(
                'message' => 'added Successfully',
            );
            $this->dataModule = $this->success($data);

            //Log Maintaining
            $action = "Added Data";
            $this->log($action);
        }
        return $this->respond($this->dataModule);
    }



    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    // Updating the Data ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //calling the update form

    public function update($id)
    {
        // echo $id;

        $userModel = new Sitefunction();

        $singleData = $userModel->getRow($id);

        $data = [];
        $data['single'] = $singleData;
        echo view("admin/update", $data);
    }

    //Update the Data
    public function updateActionImg()
    {


        $requestData = $_POST;

        // echo "<pre>";
        // print_r($requestData);



        $name = $requestData['name'];
        $email = $requestData['email'];
        $phone = $requestData['phone'];
        $id = $requestData['id'];


        $data_array['name'] = $name;
        $data_array['email'] = $email;
        $data_array['phone'] = $phone;


        if (isset($_FILES['component_image']) && !empty($_FILES['component_image'])) {

            $randdom = round(microtime(time() * 1000)) . rand(000, 999);

            $file_extension1 = pathinfo($_FILES['component_image']["name"], PATHINFO_EXTENSION);

            $file_name1 = $randdom . '.' . $file_extension1;

            if ($_FILES['component_image']["error"] <= 0) {

                move_uploaded_file($_FILES['component_image']['tmp_name'], IMAGE_UPLOAD_PATH . 'component/' . $file_name1); //folder in upload/component

                $data_array['image'] = $file_name1; //db column name
            } else {

                $data_array['component_image'] = 'NA';
            }
        }

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $result = $userModel->update_data(TBL_INFO, $data_array, array('id' => $id));
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['employee'] = $result;
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['employee'] = $userModel->get_all_rows(TBL_INFO, '*');

        if ($result) {
            $data = array(
                'message' => 'added Successfully',
            );
            $this->dataModule = $this->success($data);

            //Log Maintaining
            $action = "Updated Data";
            $this->log($action);
        }
        return $this->respond($this->dataModule);
    }

    //+++++++++++++++++++++++++++++++++++++++++++++++++++++
    //Deleting the Data
    public function deleteAction()
    {
        $requestData = $this->request->getJSON();

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $userModel->delete_data(TBL_INFO, array('id' => $requestData->id));
        $data = array(
            'message' => 'Delete Successfully',
        );
        $this->dataModule = $this->success($data);
        $action = "Delete Data";
        $this->log($action);
        return $this->respond($this->dataModule);
    }




    //Logout -----------------------------------------------------------------------------------------------------------------------------------

    public function logout()
    {
        $action = "Logged Out";
        $this->log($action);

        // echo view("user/login");

        return redirect()->to("user/login");
    }


    //saving the data
    public function save()
    {
        $userModel = new Sitefunction();
        $data = [

            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),

        ];

        $userModel->save($data);

        return redirect()->to('user/index');
    }

    //Editing the data
    public function edit($id)
    {

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $userModel->update($id, [

            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),

        ]);

        // return view("user/index");

        return redirect()->to('user/index');
    }

    public function delete($id)
    {

        $userModel = new Sitefunction();

        $userModel->delete($id);

        return redirect()->to('user/index');
    }





    //Verification of User ------------------------------------------
    public function verification()
    {
        $requestData = $this->request->getJson();



        $email = $requestData->email;
        $password = $requestData->password;




        $userModel = new Sitefunction();
        $userModel->protect(false);

        $data['info'] = $userModel->get_single_row(TBL_CREDENTIAL, '*', array('email' => $email));

        if (!$data['info']) {
            $data = array(
                'message' => 'invalid'
            );
            $this->dataModule = $this->failure(300, 'invalide user');
            return $this->respond($this->dataModule);
        }


        if ($data['info']['password'] == $password) {
            $data = array(
                'message' => 'valid'
            );

            //Log of Logged In -----------------------------------------------------------------------
            $this->session->set('email', $email);  //Session started
            $action = "Logged in";
            $userModel = new Sitefunction();
            $userModel->protect(false);
            $this->log($action);



            $verify = 2;




            $this->dataModule = $this->success($data, $verify);
            return $this->respond($this->dataModule);
        } else {
            $data = array(
                'message' => 'invalid'
            );

            $this->dataModule = $this->failure(300, 'invalide user');
        }
        return $this->respond($this->dataModule);
    }


    //Log Details ---------------------------------------------------------------------------------------------------------------------------------
    public function logdetails()
    {
        $userModel = new Sitefunction();
        $data['col'] = $userModel->get_all_rows(TBL_LOG, '*', array('email' =>  $this->session->get('email')));
        echo view("user/log", $data);
    }

    public function state($id)
    {

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['countryinfo'] = $userModel->get_all_rows(TBL_COUNTRY, '*');


        //return print json_encode($id);

        $join = array(
            TBL_COUNTRY . ' as c' => 'c.id=s.countryId'
        );

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $c_id = (int)$id;
        $result = $userModel->get_all_rows(TBL_STATE . ' as s', 's.*,c.country', array('s.countryId' => $c_id), $join);
        $this->dataModule['state'] = $result;
        echo view("admin/state", $this->dataModule);
    }

    public function permission()
    {
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['countryinfo'] = $userModel->get_all_rows(TBL_COUNTRY, '*');

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['controller'] = $userModel->get_all_rows(TBL_CONTROLLER, '*');







        echo view('admin/permission', $this->dataModule);
    }

    public function change_status()
    {

        $requestData = $this->request->getJson();
        $id = $requestData->id;
        $status = $requestData->status;

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $result = $userModel->update_data(TBL_CONTROLLER, array('status' => $status), array('id' => $id));





        if ($result) {
            $data = array(
                'message' => 'added Successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }
}
