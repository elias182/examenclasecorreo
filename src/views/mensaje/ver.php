<section class="productos">

<h1 class="product-list-title">Listado de mensajes</h1>
<ul class="product-list">
        <li class="mensaje-item">
            <div class="mensaje-info">
                <p><?= $mensaje->getDe(); ?></p>
                <p><?= $mensaje->getAsunto(); ?></p>
                <p><?= $mensaje->getCuerpo(); ?></p>
                
            </div>

            
            
        </li>

</ul>

<p><a href="<?=BASE_URL?>eliminar/<?= $mensaje->getId(); ?>">elimnar</a></p>
</section>