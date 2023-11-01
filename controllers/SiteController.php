<?php

namespace app\controllers;

use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\Application;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'TheCodeholic'
        ];
        return  $this->render('home', $params);
    }
    public function contact(Request $request)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {

            $contact->loadData($request->getBody());

            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return Application::$app->response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
    // public function handleContact(Request $request)
    // {
    //     $body = $request->getBody();
    //     echo '<pre>';
    //     var_dump($body);
    //     echo '</pre>';
    //     exit;
    //     return 'Handling submitted data';
    // }
}
