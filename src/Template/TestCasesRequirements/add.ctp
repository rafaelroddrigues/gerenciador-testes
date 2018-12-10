<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Test Cases Requirements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testCasesRequirements form large-9 medium-8 columns content">
    <?= $this->Form->create($testCasesRequirement) ?>
    <fieldset>
        <legend><?= __('Add Test Cases Requirement') ?></legend>
        <?php
            echo $this->Form->control('test_cases_id', ['options' => $testCases, 'empty' => true]);
            echo $this->Form->control('requirements_id', ['options' => $requirements, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
