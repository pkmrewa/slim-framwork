<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * Description of User
 *
 * @author nitins
 */
class UserController
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
        $users_model = new \App\Models\User_model($this->c->db);
        //call the function to get list of users
        $users = $users_model->users();
        $this->res['data'] = $users;
        return $response->withJson($this->res, 200);
    }

    public function show(Request $request, Response $response)
    {
        //retive the parameter from url
        $user_guid = $request->getAttribute('user_guid');
        //load the modle class
        $users_model = new \App\Models\User_model($this->c->db);
        $user = $users_model->get_user_by_guid($user_guid);
        if (is_null($user))
        {
            $this->res['message'] = "user guid is not valid.";
        }
        else
        {
            $this->res['data'] = $user;
        }
        return $response->withJson($this->res, 200);
    }

    public function create(Request $request, Response $response)
    {

        if ($request->getAttribute('has_errors'))
        {
            $errors = $request->getAttribute('errors');
            return $response->withJson([
                        'status' => 'error',
                        'message' => "",
                        'data' => $errors,
                            ], 403);
        }
        else
        {
            //load the modle class
            $users_model = new \App\Models\User_model($this->c->db);
            $user = $users_model->get_user_by_guid($user_guid);
            return $response->withJson($user, 200);
        }
    }

    public function update(Request $request, Response $response)
    {
        //retive the parameter from url
        $post = $request->getParsedBody();

        $user_guid = $request->getAttribute('user_guid');
        $first_name = $post['first_name'];
        $last_name = $post['last_name'];
        $email = $post['email'];
        $phone = $post['phone'];

        try
        {
            V::attribute('first_name', V::stringType()->notEmpty())->check($first_name);
            V::attribute('last_name', V::stringType()->notEmpty())->check($last_name);
        }
        catch (ValidationException $ex)
        {
            return $response->withJson([
                        'status' => 'error',
                        'message' => $ex->getMainMessage(),
                        'data' => [],
                            ], 403);
        }

        if (!V::stringType()->notEmpty()->validate($last_name))
        {
            
        }
        elseif (!V::stringType()->notEmpty()->validate($email))
        {
            
        }
        elseif (!V::stringType()->notEmpty()->validate($phone))
        {
            
        }
        else
        {
            $users_model = new \App\Models\User_model($this->c->db);
            $users_model->update_user_by_guid($user_guid, $first_name, $last_name, $email, $phone);
            $user = $users_model->get_user_by_guid($user_guid);
            return $response->withJson([
                        'status' => 'success',
                        'message' => "user updated",
                        'data' => $user
                            ], 200);
        }
    }

    public function delete(Request $request, Response $response)
    {
        //retive the parameter from url
        $user_guid = $request->getAttribute('user_guid');
        //load the modle class
        $users_model = new \App\Models\User_model();
        $user = $users_model->get_user_by_guid($user_guid);
        return $response->withJson($user, 200);
    }

}
