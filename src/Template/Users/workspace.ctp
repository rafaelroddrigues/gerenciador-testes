<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($user, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name', ['autofocus' => true]);
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('confirm_password', ['type' => 'password']);
            echo $this->Form->control('role', ['value' => $role, 'readonly' => 'readonly']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
