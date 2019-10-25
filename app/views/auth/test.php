<?php

use \Helpers\Form;
use \Core\Error;

?>
<div class="row">
  <div class="col-sm-12">
    <p><?php echo $data['jwt']; ?></p>
    <p><?php var_dump($data['decoded']); ?></p>
    <p>Time Issued: <?php echo date('m/d/Y h:m:s', $data['decoded']['iat']) ?></p>
    <p>When Accessible After Issue: <?php echo date('m/d/Y h:m:s', $data['decoded']['nbf']) ?></p>
    <p>Expiration: <?php echo date('m/d/Y h:m:s', $data['decoded']['exp']) ?></p>
  </div>
</div>
