<?php

namespace App\Http\Controllers;

/*
 * Class MainController
 * @package App\Http\Controllers
 * Sufficé par le mot clef Controller
 * et doit hérité de la super classe Controller
 */
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Mail;

class mainController extends Controller
{
    public function essai()
    {
        return view('testcode', [
            "firstname" => "Ludo"
        ]);
    }

    public function tableau()
    {
        $products = [
            [
                "id" => 1,
                "title" => "Mon premier produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 10
            ],
            [
                "id" => 2,
                "title" => "Mon deuxième produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 20
            ],
            [
                "id" => 3,
                "title" => "Mon troisième produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 30
            ],
            [
                "id" => 4,
                "title" => "",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 410
            ],
        ];


        return view('fichiertableau',["bladeProduct"=>$products]);
    }

    public function team()
    {
        $equipes = [
            [
                "id" => 1,
                "firstname" => "Marc",
                "lastname" => "Toto",
                "chef" => true,
                "description" => "Lorem ipsum",
                "statut" => "chef",
                "image" => "chef.jpg"
            ],
            [
                "id" => 2,
                "firstname" => "Jean",
                "lastname" => "Michel",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "graphiste",
                "image" => "graphiste.jpg"
            ],
            [
                "id" => 3,
                "firstname" => "Martine",
                "lastname" => "a la plage",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "developeur",
                "image" => "developpeur.jpg"
            ],
        ];

        return view('team',['bladeTeam'=>$equipes]);
    }

    // DANS LE FICHIER MAINCONTROLLER CREER LA METHODE SUIVANTE

    public function home()
    {
        return view('accueil'); // accueil.blade.php
    }

    public function contact(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $validator = Validator::make($request->all(),
                [
                    'userName' => 'required|min:4|max:25',
                    'userEmail' => 'required|email',
                    'userPhone' => 'required|numeric',
                    'userMsg' => 'required|max:1000',
                ],
                [
                'userName.required' => 'Attention le champ nom est vide',
                'required' => 'Attention le champ est vide',
                ]
            );

            if ($validator->fails())
            {
                return redirect()->route('route_contact')
                    ->withInput()
                    ->withErrors($validator);
            }

            Mail::send(['emails.contact-email', 'emails.contact-email-text'], ["data" => $request->all()], function ($message) {
                $message->from('monadressemail@gmail.com');
                $message->subject("Formulaire de contact");
                $message->to('monadressemail@gmail.com');
            });

            return redirect()->route('route_contact')->with('successContact', 'Votre email a bien été envoyé');
        }

        return view('contact'); // resources/views => contact.blade.php
    }
}
