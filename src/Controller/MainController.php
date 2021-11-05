<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function index(): Response
    {
     return new Response('<h1>Welcome to the Main Controller</h1>');
    }

    public function custom(Request $request): Response
    {
       $name = $request->get('name');
        return new Response("<h1>Welcome $name,to the Custom Page</h1>");
    }
}
