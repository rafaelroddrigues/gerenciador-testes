<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="workspaces view large-5 columns content text-center large-centered">
    <?= $this->Form->create($workspace, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Add Workspace') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
