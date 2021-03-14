<?php

namespace app\controllers;

use kadcore\tcphpmvc\Alerts;
use kadcore\tcphpmvc\Application;
use kadcore\tcphpmvc\Controller;
use kadcore\tcphpmvc\Request;
use kadcore\tcphpmvc\Response;
use app\models\ContactForm;

/**
 * Controllers da aplicação
 * 
 * @author Kadu Hoffmann <kaduhoff@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

    public function contato(Request $request, Response $response)
    {
        $contatoModel = new ContactForm();
        if ($request->isPost()) {
            $contatoModel->loadData($request->getVars());

            if ($contatoModel->validate()) {
                //return 'Sucesso ao criar registro';
                Alerts::setSuccess('Seu contato foi enviado! Em breve entraremos em contato');
                Alerts::setDanger('Não implementado ainda');
                $response->redirect('/');
                return;
            }
        } 
        
        //se não redirecionar imprime novamente (caso de falta de algum campo ou erro)
        return $this->render('contato', [
            'model' => $contatoModel,
        ]);
        

    }

}
