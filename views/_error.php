<?php 

/** @var \kadcore\tcphpmvc\View $this  */
$this->title = 'Erro';

/** @var \Exception $exception  */
if ($exception->getCode() === 0 ) {
    echo "<pre>";
    var_dump($exception);
    echo "</pre>";
}
?>
<br><br>
<center>
    <h2>Erro <?php echo $exception->getCode()?>: <?php echo $exception->getMessage()?></h2>
    <br>Clique <a href="javascript: history.go(-1)">aqui</a> para retornar a página anterior
</center>