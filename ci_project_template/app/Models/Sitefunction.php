<?php

namespace App\Models;

use App\Core\MyModel;

class Sitefunction extends MyModel
{
    public function __construct()
    {
        parent::__construct();
    }


    protected $table      = 'tbl_info';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email', 'phone', 'image'];


    public function getRow($id)
    {

        //SELECT * FROM info where id=$id
        return $this->where('id', $id)->first();
    }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;
}
