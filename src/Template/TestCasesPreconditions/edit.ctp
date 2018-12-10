<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $testCasesPrecondition->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesPrecondition->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Test Cases Preconditions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Preconditions'), ['controller' => 'Preconditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Precondition'), ['controller' => 'Preconditions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testCasesPreconditions form large-9 medium-8 columns content">
    <?= $this->Form->create($testCasesPrecondition) ?>
    <fieldset>
        <legend><?= __('Edit Test Cases Precondition') ?></legend>
        <?php
            echo $this->Form->control('test_cases_id', ['options' => $testCases, 'empty' => true]);
            echo $this->Form->control('preconditions_id', ['options' => $preconditions, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
