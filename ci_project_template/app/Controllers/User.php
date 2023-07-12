<?php

namespace App\Controllers;

use App\Core\MyController;
use App\Models\Sitefunction;

// defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MyController
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


    // Dashboard ----------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function index()
    {
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['userdata'] = $userModel->get_all_rows(TBL_INFO, '*');
        $email = $this->session->get('email');


        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['data'] = $userModel->get_single_row(TBL_CREDENTIAL, '*', array('email' => $email));
        $verify = $this->dataModule['data']['verify'];




        $userModel = new Sitefunction();
        $userModel->protect(false);

        $this->dataModule['userdata'] = $userModel->get_all_rows(TBL_INFO, '*');


        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['countryinfo'] = $userModel->get_all_rows(TBL_COUNTRY, '*');


        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['permission'] = $userModel->get_all_rows(TBL_CREDENTIAL, '*');

        if ($verify == 2) {

            echo view('user/index', $this->dataModule);
        } else {
            echo view('admin/admin', $this->dataModule);
        }
    }

    public function login()
    {
        echo view("user/login");
    }

    public function signUp()
    {
        echo view("user/signup");
    }

    public function addUser()
    {
        $requestData = $this->request->getJson();

        $name_conntroller = $requestData->name_conntroller;
        $email_controller = $requestData->email_controller;
        $phone_controller = $requestData->phone_controller;

        $model = new Sitefunction();
        $model->protect(false);
        $dataArray = array(

            "name" => $name_conntroller,
            "email" => $email_controller,
            "phone" => $phone_controller,

        );

        $resultdata = $model->insert_data(TBL_INFO, $dataArray);

        if ($resultdata) {
            $data = array(
                'message' => 'added Successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    //calling the add form
    public function create()
    {
        echo view("user/create");
    }

    //calling the update form

    public function update($id)
    {
        // echo $id;

        $userModel = new Sitefunction();
        // $singleData = $userModel->get_single_row(TBL_INFO, '*', array('id' => $id));


        $singleData = $userModel->getRow($id);

        $data = [];
        $data['single'] = $singleData;
        echo view("user/update", $data);

        // $userModel->update($id, [

        //       name' => $this->request->getVar('name'),
        //     'email' => $this->request->getVar('email'),
        //     'phone' => $this->request->getVar('phone'),

        // ]);

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

    public function addAction()
    {
        $requestData = $this->request->getJSON();

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data = array(
            'name' => $requestData->name,
            'email' => $requestData->email,
            'phone' => $requestData->phone,

        );
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $result = $userModel->insert_data('info', $data);
        $data['employee'] = $result;
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['employee'] = $userModel->get_all_rows('info', '*');

        if ($result) {
            $data = array(
                'message' => 'added Successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
    }

    public function editAction()
    {

        $requestData = $this->request->getJSON();

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $userModel->update_data('info', $data = array('name' => $requestData->name, 'email' => $requestData->email, 'phone' => $requestData->phone), $where = array('id' => $requestData->id));
        $data = array(
            'message' => 'added Successfully',
        );
        $this->dataModule = $this->success($data);
        return $this->respond($this->dataModule);
    }






    public function newuser()
    {
        $requestData = $_POST;

        // echo "<pre>";
        // print_r($requestData);

        $name = $requestData['name'];
        $email = $requestData['email'];
        $verify = $requestData['verify'];
        $surname = $requestData['surname'];
        $password = $this->encrypt_password($requestData['password']);

        // $password = $requestData['password'];


        $data_array['name'] = $name;
        $data_array['email'] = $email;
        $data_array['verify'] = $verify;
        $data_array['surname'] = $surname;
        $data_array['password'] = $password;


        if (isset($_FILES['component_image']) && !empty($_FILES['component_image'])) {

            $randdom = round(microtime(time() * 1000)) . rand(000, 999);

            $file_extension1 = pathinfo($_FILES['component_image']["name"], PATHINFO_EXTENSION);

            $file_name1 = $randdom . '.' . $file_extension1;

            if ($_FILES['component_image']["error"] <= 0) {

                move_uploaded_file($_FILES['component_image']['tmp_name'], IMAGE_UPLOAD_PATH . 'newuser/' . $file_name1); //folder in upload/component

                $data_array['image'] = $file_name1; //db column name
            } else {

                $data_array['component_image'] = 'NA';
            }
        }

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $result = $userModel->insert_data(TBL_CREDENTIAL, $data_array);
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['employee'] = $result;
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $data['employee'] = $userModel->get_all_rows(TBL_CREDENTIAL, '*');

        if ($result) {
            $data = array(
                'message' => 'added Successfully',
            );
            $this->dataModule = $this->success($data);
        }
        return $this->respond($this->dataModule);
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
        if ($this->verify_password($password, $data['info']['password'])) {
            $data = array(
                'message' => 'valid'
            );

            //Log of Logged In -----------------------------------------------------------------------
            $this->session->set('email', $email);  //Session started
            // $this->session->set('id', $data['info']['Id']);  //Session started

            $action = "Logged in";
            $userModel = new Sitefunction();
            $userModel->protect(false);
            $this->log($action);








            $this->dataModule = $this->success($data);
            return $this->respond($this->dataModule);
        } else {
            $data = array(
                'message' => 'invalid'
            );

            $this->dataModule = $this->failure(300, 'invalide user');
        }
        return $this->respond($this->dataModule);
    }

    //Logout -----------------------------------------------------------------------------------------------------------------------------------

    public function logout()
    {
        $action = "Logged Out";
        $this->log($action);
        session_destroy();

        // echo view("user/login");

        return redirect()->to("user/login");
    }

    //Log Details ---------------------------------------------------------------------------------------------------------------------------------
    public function logdetails()
    {
        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['userdata'] = $userModel->get_all_rows(TBL_INFO, '*');
        $email = $this->session->get('email');

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['countryinfo'] = $userModel->get_all_rows(TBL_COUNTRY, '*');

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['data'] = $userModel->get_single_row(TBL_CREDENTIAL, '*', array('email' => $email));

        $userModel = new Sitefunction();
        $this->dataModule['col'] = $userModel->get_all_rows(TBL_LOG, '*', array('email' =>  $this->session->get('email')));
        echo view("user/log", $this->dataModule);
    }




    public function state($id)
    {

        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['countryinfo'] = $userModel->get_all_rows(TBL_COUNTRY, '*');

        $email = $this->session->get('email');


        $userModel = new Sitefunction();
        $userModel->protect(false);
        $this->dataModule['data'] = $userModel->get_single_row(TBL_CREDENTIAL, '*', array('email' => $email));


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
}
