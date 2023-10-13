<?php

namespace Guirod\MvcTp\Controllers;

use Guirod\MvcTp\Controller;
use Guirod\MvcTp\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->render('user/index', ['users' => User::findAll()]);
    }

    public function view(array $params)
    {
        $user = User::findById((int)$params['id']);

        
        $this->render(
            'user/view', 
            [
                'user' => $user,
                'citation' => [
                    'quote' => "Lorsqu'une porte du bonheur se ferme, une autre s'ouvre ; mais parfois on observe si longtemps celle qui est fermée qu'on ne voit pas celle qui vient de s'ouvrir à nous.",
                    'author' => 'Helen Keller'
                ],
            ]
        );
    }
}