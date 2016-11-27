<?php

use Respect\Validation\Validator as v;

// Routes
$app->get('/[{name}]', function ($request, $response, $args)
{
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->group('/api', function() use ($app)
{
    $app->group('/users', function () use($app)
    {
        // GET Endpoint for '/users' user list
        $app->get('', 'App\Controllers\UserController:index');

        //GET Endpoint for '/users/user_guid' user details
        $app->get('/{user_guid}', 'App\Controllers\UserController:show');

        //POST Endpoint for '/users' create user
        //Create the validators
        $validators = [
            'first_name' => v::stringType()->notEmpty(),
            'last_name' => v::stringType()->notEmpty(),
            'email' => v::stringType()->notEmpty(),
            'phone' => v::stringType()->notEmpty(),
        ];

        $app->post('', 'App\Controllers\UserController:create')
                ->add(new \DavidePastore\Slim\Validation\Validation($validators));

        //PUT Endpoint for '/users/user_guid' user details update
        $app->put('/{user_guid}', 'App\Controllers\UserController:update');

        //DELTE Endpoint for '/users/user_guid' user details delete
        $app->delete('/{user_guid}', 'App\Controllers\UserController:delete');
    });

    $app->group('/orders', function () use($app)
    {
        // GET Endpoint for '/orders' user list
        $app->get('', 'App\Controllers\OrderController:index');

        //GET Endpoint for '/orders/order_guid' order details
        $app->get('/{order_guid}', 'App\Controllers\OrderController:show');

        //POST Endpoint for '/orders' create new order
        $app->post('', 'App\Controllers\OrderController:create');

        //PUT Endpoint for '/orders/order_guid' user details update
        $app->put('/{order_guid}', 'App\Controllers\OrderController:update');

        //DELTE Endpoint for '/orders/order_guid' user details delete
        $app->delete('/{order_guid}', 'App\Controllers\OrderController:delete');
    });
});

