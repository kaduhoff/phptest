<?php 
/** @var \kadcore\tcphpmvc\View $this  */
$this->title = 'Contato';

use kadcore\tcphpmvc\form\Button;
use kadcore\tcphpmvc\form\Form;
use kadcore\tcphpmvc\form\Input;
use kadcore\tcphpmvc\form\TextArea;

//'vem preenchido o $model do controller'
/** @var app\models\ContactForm $model */
$form = new Form($model, '', 'post');
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
$form->add(
    new Input(
        title: "Assunto",
        type: "assunto", 
        name: "assunto",
        value: $model->assunto,
        error: $model->getError('assunto'),
        required: true,
    )
);
$form->add(
    new TextArea(
        title: "Mensagem",
        name: "mensagem",
        value: $model->mensagem,
        error: $model->getError('mensagem'),
        required: true,
    )
);
$form->add(new Button("Enviar"));

$form->printForm();

?>



<!-- <form action="" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Seu e-mail</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nós não compartilhamos seu e-mail com ningém.</div>
    </div>
    <div class="mb-3">
        <label for="assunto" class="form-label">Assunto</label>
        <input type="text" name="assunto" class="form-control" id="assunto">
    </div>
    <div class="mb-3">
        <label for="mensagem" class="form-label">Mensagem</label>
        <textarea class="form-control" name="mensagem" id="mensagem" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form> -->