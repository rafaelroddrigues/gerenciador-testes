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
                ['action' => 'delete', $testCasesTestCaseStep->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesTestCaseStep->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Test Cases Test Case Steps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Test Case Steps'), ['controller' => 'TestCaseSteps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case Step'), ['controller' => 'TestCaseSteps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testCasesTestCaseSteps form large-9 medium-8 columns content">
    <?= $this->Form->create($testCasesTestCaseStep) ?>
    <fieldset>
        <legend><?= __('Edit Test Cases Test Case Step') ?></legend>
        <?php
            echo $this->Form->control('test_cases_id', ['options' => $testCases, 'empty' => true]);
            echo $this->Form->control('test_case_steps_id', ['options' => $testCaseSteps, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
