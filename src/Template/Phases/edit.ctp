<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="phases view large-5 columns content text-center large-centered">
    <?= $this->Form->create($phase) ?>
    <fieldset>
        <legend><?= __('Edit Phase') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('projects_id', ['options' => $projects, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
