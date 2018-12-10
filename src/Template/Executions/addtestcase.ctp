<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCase[]|\Cake\Collection\CollectionInterface $testCases
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($execution, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Add Test Case To Execute') ?></legend>
        <?php
            echo $this->Form->control('projects_id', ['value' => $this->request->session()->read('projectid'), 'type' => 'hidden']);
            echo $this->Form->control('test_cases_id', ['options' => $testCases, 'empty' => true]);
            echo $this->Form->control('users_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('status', ['value' => 'Not Run', 'type' => 'hidden']);
            echo $this->Form->control('phases_id', ['value' => $this->request->session()->read('phaseid'), 'type' => 'hidden']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
