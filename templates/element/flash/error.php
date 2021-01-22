<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
 <div class="card-panel white center" id="err"><span class="error center" onclick="this.classList.add('hidden');"><strong><?= $message ?></strong></span></div>

 <script>
    $(document).ready(function(){
        $('#err').click(function(){
            $('#err').hide()
        })
    })
 </script>

