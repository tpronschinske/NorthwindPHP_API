<?php

use \Helpers\Form;
use \Core\Error;

$serverToken = $data['token'];
?>
<style media="screen">
    body{
        background: transparent!important;
    }
</style>
<div class="login-wrapper">
    <?php echo Form::open(array('method' => 'post', 'class' => 'login', 'id' => 'loginForm')); ?>
    <section class="title">
        <h3 class="welcome">Reset Password</h3>
    </section>
    <div class="" id="pass-error">

    </div>
    <div class="login-group">
        <?php echo Form::input(array('name' => 'serverToken', 'type' => 'hidden', 'class' => 'form_input', 'value' => ($serverToken) )); ?>
        <label for="email">New Password</label>
        <?php echo Form::input(array('name' => 'password-one', 'type' => 'password', 'id' => 'passOne', 'class' => 'form-control mb-1')); ?>
        <label for="email">Confirm New Password</label>
        <?php echo Form::input(array('name' => 'password-two','type' => 'password', 'id' => 'passTwo', 'class' => 'form-control mb-1')); ?>
        <?php echo Form::input(array('type' => 'submit', 'id' => 'passResetSubmit', 'name' => 'submit', 'class' => 'btn btn-primary btn-block mt-1', 'value' => 'Submit')); ?>
    </div>
    <?php echo Form::close(); ?>
</div>
