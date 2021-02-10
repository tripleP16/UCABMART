<div class="row">
    <div class="col s10 offset-s1" id="panelMadera2">
        <div class="row">
            <div class="white col s8 offset-s2" >
                    <h3>Total A Pagar: <?php echo $total?></h3>
                    
            </div>
            <?= $this->Form->create(null, array('class' =>'col s8 offset-s2 white')) ?>
                        <div class="row white formulario">
                            <div class="col s4">
                                <h6>Pago en efectivo</h6>
                                <label>
                                    <input type="checkbox" name="efectivo"/>
                                    <span>Efectivo</span>
                                </label>
                                    <div class="input-field col s12">
                                        <input name="efectivoC" type="number" min="0" class="validate">
                                        <label for="efectivoC">Cantidad</label>
                                    </div>
                                
                            </div>
                            <div class="col s4">
                                <h6>Pago en Cheque</h6>
                                <label>
                                    <input type="checkbox"  name="cheque"/>
                                    <span>Cheque</span>
                                </label>
                                    <div class="input-field col s12">
                                        <input name="chequeCant" type="number" min="0" class="validate">
                                        <label for="chequeCant">Cantidad</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="chequePagar" type="text"  class="validate">
                                        <label for="chequePagar">Pagar A</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="chequeNumero" type="number" min="0" class="validate">
                                        <label for="chequeNumero">Numero de Cheque</label>
                                    </div>
                               
                            </div>
                            <div class="col s4">
                                <h6>Pago con tarjeta de debito</h6>
                                <label>
                                    <input type="checkbox" name="debito"/>
                                    <span>Debito</span>
                                </label>
                                    <div class="input-field col s12">
                                        <select name="cuenta">
                                            <option value="" disabled selected>Escoge Uno</option>
                                            <option value="ahorro">Ahorro</option>
                                            <option value="corriente">Corriente</option>
                                        </select>
                                        <label>Tipo de Cuenta</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="debitoC" type="number" min="0" class="validate">
                                        <label for="debitoC">Cantidad</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="text" class="datepicker">
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="cvv" type="number" max="999" class="validate">
                                        <label for="cvv">Cvv</label>
                                    </div>
                                   
                                
                            </div>
                            <div class="col s12 center">
                                <?= $this->Form->button(__('Pagar') , array('class'=> 'waves-effect waves-light btn-large black-text ')) ?>
                            </div>
                        </div>
                    
                <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd' });
    })
</script>