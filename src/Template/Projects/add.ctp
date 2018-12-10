<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($project, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Add Project') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
