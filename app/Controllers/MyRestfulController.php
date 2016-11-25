<?php

namespace App\Controllers;

/**
 * Description of MyRestfulController
 *
 * @author nitins
 */
class MyRestfulController extends MasterController {

    public function __construct() {
        echo 'AA ya ';
    }

    public function index() {
        echo 'index';
    }

    public function setMessage() {
        echo 'set';
    }

    public function __destruct() {
        die('destructed');
    }

}
