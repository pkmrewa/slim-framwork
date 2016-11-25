<?php

namespace App\Models;

use App\DbConn;

/**
 * Description of MasterModel
 *
 * @author nitins
 */
class MasterModel {

    protected $_db = false;

    public function __construct() {
        $db = new DbConn();
        $this->_db = $db->connectDatabase();
    }
    
    
}
