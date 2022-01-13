<?php

namespace App\Controller;

class CustomerController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('myapp');
    }

}