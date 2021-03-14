<h2>Registrar-se</h2>
<?php

/** @var \kadcore\tcphpmvc\View $this  */
$this->title = 'Registro de Usuário';

use kadcore\tcphpmvc\form\Button;
use kadcore\tcphpmvc\form\Form;
use kadcore\tcphpmvc\form\Input;

//'vem preenchido o $model do controller'

/** @var kadcore\tcphpmvc\UserModel $model */

$form = new Form($model, '', 'post');
$form->add(
    new Input(
        title: "Nome Completo",
        type: "text", 
        name: "nome",
        value: $model->nome,
        error: $model->getError('nome'),
        required: true,
    )
);
$form->add(
    new Input(
        title: "E-Mail",
        type: "email", 
        name: "email",
        value: $model->email,
        error: $model->getError('email'),
        required: true,
    )
);
$form->addRow(
    array(
        new Input(
            title: "Senha",
            type: "password", 
            name: "senha",
            value: $model->senha,
            error: $model->getError('senha'),
            help: "Deve conter entre 8 e 24 caracteres",
            required: true,
        ),
        new Input(
            title: "Repita a senha",
            type: "password", 
            name: "senha2",
            value: $model->senha2,
            error: $model->getError('senha2'),
            required: true,
        ),
    )
);
$form->add(new Button("Registrar-se"));

$form->printForm();
?>

