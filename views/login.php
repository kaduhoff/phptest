<?php

/** @var \kadcore\tcphpmvc\View $this  */
$this->title = 'Login';

use kadcore\tcphpmvc\form\Button;
use kadcore\tcphpmvc\form\Form;
use kadcore\tcphpmvc\form\Input;

//'vem preenchido o $model do controller'

$form = new Form($model, '', 'post');
$form->add(
    new Input(
        title: "E-Mail",
        type: "email", 
        name: "email",
        value: $model->email,
        //help: "Não tem cadastro? clique em registre-se",
        error: $model->getError('email'),
        required: true,
    )
);
$form->add(
    new Input(
        title: "Senha",
        type: "password", 
        name: "senha",
        value: $model->senha,
        error: $model->getError('senha'),
        help: "Clique aqui para recuperar sua senha",
        required: true,
    )
);
$form->add(new Button("Entrar"));

$form->printForm();
?>

