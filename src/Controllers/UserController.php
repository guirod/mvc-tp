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

    /** Appeler cette route ?id=x */
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

    public function add()
    {
        $isSubmit = isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']);

        if ($isSubmit) {
            // TODO traiter l'enregistrement de l'utilisateur
            $user = new User();
            $user->nom = htmlspecialchars($_POST['nom']);
            $user->prenom =  htmlspecialchars($_POST['prenom']);
            $user->email = htmlspecialchars($_POST['email']);
            $user->passwordHash = 'fjdklsjf';
            $user->save();
        
            $this->view(['id' => $user->id]);

        } else {
            $this->render('user/add');
        }
    }

    public function remove()
    {
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            //Retrieve the user
            $user = User::findById((int)$_POST['id']);
            if ($user !== null) {
                $user->remove();
            }
        }

        $this->index();
    }

    public function viewAllAjax()
    {
        $this->renderJson(User::findAll());
    }
}