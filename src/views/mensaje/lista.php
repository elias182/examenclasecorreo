<section class="mensajes">

<a href="<?=BASE_URL?>redactar">redactar</a>

    <?php foreach ($mensajes as $mensaje): ?>
        <li class="mensaje-item">
            <div class="mensaje-info">
                <p><?= $mensaje->getDe(); ?></p>
                <p><a href="<?=BASE_URL?>mensajes-info/<?= $mensaje->getId(); ?>"><?= $mensaje->getAsunto(); ?></a></p>
                <p><?= $mensaje->getFecha(); ?></p>

                <a href="<?=BASE_URL?>select/<?= $mensaje->getId(); ?>">selecciona</a>
                
            </div>

            
            
        </li>
    <?php endforeach; ?>

</ul>
<a href="<?=BASE_URL?>selectsaborrar">borrar seleccionados</a>
</section>