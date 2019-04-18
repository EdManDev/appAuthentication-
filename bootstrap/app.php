<?php

session_start();
require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [      
      'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

$container['view'] = function ($container){
  $view = new \Slim\views\Twig(__DIR__ . '/../resources/views',[
    'cache' => false,
  ]);

  $view->addExtension(new \Slim\views\TwigExtension(
    $container->router,
    $container->requesst->getUri()
  ));
  
  return $view;
};

