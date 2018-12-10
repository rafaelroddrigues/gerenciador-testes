<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($precondition, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Add Precondition') ?></legend>
        <?php
            echo $this->Form->control('projects_id', ['value' => $this->request->session()->read('projectid'), 'type' => 'hidden']);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('test_cases._ids', ['options' => $testCases]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
