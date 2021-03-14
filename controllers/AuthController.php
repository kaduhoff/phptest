<?php

namespace app\controllers;

use kadcore\tcphpmvc\Alerts;
use kadcore\tcphpmvc\Application;
use kadcore\tcphpmvc\Controller;
use kadcore\tcphpmvc\middlewares\AuthMiddleware;
use kadcore\tcphpmvc\Request;
use kadcore\tcphpmvc\Response;
use kadcore\tcphpmvc\UserModel;
use Dotenv\Util\Regex;
use Throwable;

/**
 * Conntroller de autenticação na aplicação
 *  
 * @author Kadu Hoffmann <kaduhoff@gmail.com>
 * @package app\controllers 
 * */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request)
    {
        $user = new UserModel();
        if ($request->isPost()) {
            $user->loadData($request->getVars());
            //verifica se logou e redireciona
            if ($this->checkUserLogin($user)) {
                //Alerts::setSuccess("usuário Encontrado");
                Application::$app->response->redirect('/');
                return;
            } else {
                //senão alerta erro
                Alerts::setDanger("Erro ao logar <strong>Usuário/Senha Inválido(s)</strong>");
            }
        }
        //se chegar aqui não redirecionou, apaga asenha e renderiza form
        $user->senha = '';
        return $this->render('login', [
            'model' => $user,
        ]);
    }

    public static function logout(Request $request) 
    {
        Application::$app->logoutUser();
        Application::$app->response->redirect("/");
    }

    /**
     * Retorna usuário vazio se não tem ningém logado 
     * pode seer checado por user->isEmpty()
     * @return UserModel 
     * @throws Throwable 
     */
    
    
    public function register(Request $request)
    {   
        $registerModel = new UserModel();
        if ($request->isPost()) {
            $registerModel->loadData($request->getVars());

            if ($registerModel->validate()) {
                if ($registerModel->save()) {
                    //return 'Sucesso ao criar registro';
                    Alerts::setSuccess('Registro criado com sucesso!');
                    Application::$app->response->redirect('/');
                    return;
                } else {
                    return \implode("; ", $registerModel->getLastErrors());
                }
            }
        }
        return $this->render('register', [
            'model' => $registerModel,
        ]);
    }

    
    public function checkUserLogin($user): bool
    {
        $sql = "SELECT id, senha FROM ".$user->tableName()." WHERE email = :pEmail";
        //echo $sql; exit;
        $statement = UserModel::prepare($sql);

        //adicionando os valores ao prepare
        $statement->bindValue(":pEmail", $user->email);
        
        try {
            $statement->execute();
            $userDB = $statement->fetchObject();
            //\var_dump($userDB);
            if ($userDB) {
                //se retornou usuário
                if (\password_verify($user->senha, $userDB->senha)) {
                    //echo 'deu';
                    //carrega dados do usuario 
                    $user->id = $userDB->id;
                    $user->getByKey($user->id);
                    //grava na sessão o login
                    //echo $user->id;
                    Application::$app->setLoginUser($user);
                    return true;
                } else {
                    //echo 'senha errada';
                    return false;
                }
                //$user->getById($userId);
                return true;
            } else {
                //usuario nao existe
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            $user->lastErrors [] = $th->getCode().$th->getMessage();
            \var_dump($user->lastErrors);
            return false;
        }
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
