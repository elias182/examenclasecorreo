<?php if(!isset($_SESSION['identity'])): ?>
<h2>Login</h2>
<form action="<?=BASE_URL?>/identifica" method="post"> 
<label for="email">Email</label>
<input type="email" name="data[email]" id="email" />
<label for="password">Contraseña</label>
<input type="password" name="data[pass]" id="password"/> 
<input type="submit" value="Enviar" />
</form>
<?php else: ?>
<h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
<?php endif; ?>