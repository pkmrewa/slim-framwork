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
class User extends MasterController {

    public function index(Request $request, Response $response) {
        $name = $request->getAttribute('name');
        $user = new \App\Models\User();
        $name = $user->getName($name);
        $response->getBody()->write("Hello, $name");
        return $response;
    }

}
