<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * Description of User
 *
 * @author nitins
 */
class OrderController
{
    public $c;

    public function __construct($c)
    {
        $this->c = $c;
    }

    var $res = [
        'message' => "success",
    ];

    public function index(Request $request, Response $response)
    {
//load the modle class
        $users_model = new \App\Models\Users();
//call the function to get list of users
        $users = $users_model->users();
        return $response->withJson($users, 200);
    }

    public function show(Request $request, Response $response)
    {
//retive the parameter from url
        $user_guid = $request->getAttribute('user_guid');
//load the modle class
        $users_model = new \App\Models\Users();
        $user = $users_model->get_user_by_guid($user_guid);
        return $response->withJson($user, 200);
    }

}
