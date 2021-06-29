<?php
require_once 'libs/router/Router.php';
require_once 'api/comments.controller.php';
//creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
$router->addRoute('plans/:ID/comments', 'GET', 'CommentsController', 'getComments');
$router->addRoute('plans/:ID/comments', 'POST', 'CommentsController', 'addComment');
$router->addRoute('comments/:ID', 'DELETE', 'CommentsController', 'deleteComments');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);

