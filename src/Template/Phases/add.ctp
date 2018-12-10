<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($phase) ?>
    <fieldset>
        <legend><?= __('Add Phase') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('projects_id', ['options' => $projects, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
