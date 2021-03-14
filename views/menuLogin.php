<?php 
/** @var kadcore\tcphpmvc\UserModel Application::$app->user */

use kadcore\tcphpmvc\Application;

if (Application::$app->userLogged->isEmpty()) { 
        ?>
<li class="nav-item">
    <a class="nav-link" href="/login">Login</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/register">Registrar-se</a>
</li>

<?php } else { ?>
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo Application::$app->userLogged->nome?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile">Ver Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <a class="dropdown-item" href="/logout">Sair (logout)</a>
          </ul>
        </li>
    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="nbdUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo Application::$app->userLogged->nome?>
        </a>
        <div class="dropdown-menu" aria-labelledby="nbdUser">
            <a class="dropdown-item" href="/logout">Sair (logout)</a>
        </div>
    </li> -->
<?php } ?>