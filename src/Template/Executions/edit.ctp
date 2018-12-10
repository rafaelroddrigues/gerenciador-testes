<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($execution, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Edit Execution') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
