<div id="fondoLogin" class="container row">
    <div class="row">
        <h1 class="center"><img style="max-height: 80px;" src="/UCABMART/img/logo.png" alt=""></h1>
    </div>
    <div class="card center brown darken-3 white-text">
            <h5><b><b>Inicio de sesión</b></b></h5>
     </div>
    <?= $this->Form->create(null , array('class' =>'row' , 'id'=>'formLoginContenedor')) ?>
   
        <div class="col s6 center" id="formLogin">
          <div class="row"> 
              <div class="input-field col s12"><br>
              <?php
                echo $this->Form->control('cue_usu_email', array(
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'email'
                ));?>
                <label class="grey-text text-lighten-2" for="cue_usu_email">Email</label>
              </div>
          </div>
          <div class="row">
              <div class="input-field col s12"><br>
              <?php
                echo $this->Form->control('cue_usu_contrasena', array(
                    'label'=> false, 
                    'templates'     => ['inputContainer' => '{{content}}'],
                    'type' =>'password'
                ));?>
                <label class="grey-text text-lighten-2" for="cue_usu_contrasena">Contraseña</label>
              </div>
          </div>
          <?= $this->Form->button(__('Iniciar Sesion') , array('class'=> 'waves-effect waves-light btn-large yellow accent-2 black-text ')) ?>
        </div>
    
    <?= $this->Form->end() ?>
</div>