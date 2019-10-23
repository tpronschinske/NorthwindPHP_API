<?php

use \Helpers\Form;
use \Core\Error;

?>
<style media="screen">
    body{
        background: transparent!important;
    }
</style>

<div class="login-wrapper">

    <?php echo Form::open(array('method' => 'post', 'class' => 'login')); ?>
    <section class="title">
        <img class="login-img-logo" src="./app/templates/default/img/Pre-3-Logo.png" >
        <h3 class="welcome">Reset Password</h3>
    </section>
    <div class="login-group">
        <label for="email">Email</label>
        <?php echo Form::input(array('name' => 'email', 'class' => 'form-control mb-1')); ?>
        <?php echo Form::input(array('type' => 'submit', 'name' => 'submit', 'class' => 'btn btn-primary btn-block mt-1', 'value' => 'Submit')); ?>
        <a class="mt-1" href="/login">Return to login</a>
    </div>
    <?php echo Form::close(); ?>
</div>
