<?php

/** @var $model \app\models\User*/
?>


<h1>Login</h1>
<?php $form =  thecodeholic\phpmvc\form\Form::begin('', 'post'); ?>

<?php echo $form->field($model, 'email')->emailField() ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php echo thecodeholic\phpmvc\form\Form::end() ?>