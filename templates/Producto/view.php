<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>

<div class="row">
  <div class="col s6 push-s3">
    <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator imagenProducto" src="<?php echo $producto[0]['prod_imagen']?>" >
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo $producto[0]['prod_nombre']?><i class="material-icons right">more_vert</i></span>
          <?= $this->Form->create() ?>
          <div class=" input-field col inline s12"> 
                <?php
                    echo $this->Form->control('cantidad', array(
                            'placeholder'=>'00',
                            'label'=> 'Cantidad', 
                            'templates'     => ['inputContainer' => '{{content}}'],
                            'type'=>'number',
                            'required'=>true

                    ));?>
          </div>
          <div class=" input-field col inline s12">
            <span>
              <strong>Disponibles: </strong>
              <?php
                echo $total;
              ?>
            </span>
          </div>
          <?= $this->Form->button(__('Agregar al carrito') , array('class'=> 'waves-effect yellow accent-2 btn-large black-text')) ?>
          <?= $this->Form->end() ?>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4"><?php echo $producto[0]['prod_nombre']?><i class="material-icons right">close</i></span>
          <p><?php echo $producto[0]['prod_descripcion']?></p>
        </div>
    </div>

  </div>
  
</div>