
<?= $this->Form->create(null,[
    'url'=>[
        'controller'=> 'Inicio', 
        'action'=>'buscar'
    ]
    ], array());?>
<div class="center row" id="busqueda">
    <div class="col s12 " >
        <div class="row" id="topbarsearch">
            <div class="input-field col s12 ">
                <i class=" material-icons prefix">search</i>
                <?= $this->Form->input('barrabusqueda', array( 'placeholder'=>'Buscar Un Producto', 'class'=>'autocomplete white-text', 'type'=>'text'));?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end();?>