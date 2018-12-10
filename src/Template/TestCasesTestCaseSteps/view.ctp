<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCasesTestCaseStep $testCasesTestCaseStep
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Test Cases Test Case Step'), ['action' => 'edit', $testCasesTestCaseStep->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Test Cases Test Case Step'), ['action' => 'delete', $testCasesTestCaseStep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesTestCaseStep->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Test Cases Test Case Steps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Cases Test Case Step'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Test Case Steps'), ['controller' => 'TestCaseSteps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Case Step'), ['controller' => 'TestCaseSteps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="testCasesTestCaseSteps view large-9 medium-8 columns content">
    <h3><?= h($testCasesTestCaseStep->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Test Case') ?></th>
            <td><?= $testCasesTestCaseStep->has('test_case') ? $this->Html->link($testCasesTestCaseStep->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $testCasesTestCaseStep->test_case->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Test Case Step') ?></th>
            <td><?= $testCasesTestCaseStep->has('test_case_step') ? $this->Html->link($testCasesTestCaseStep->test_case_step->id, ['controller' => 'TestCaseSteps', 'action' => 'view', $testCasesTestCaseStep->test_case_step->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($testCasesTestCaseStep->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($testCasesTestCaseStep->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($testCasesTestCaseStep->modified) ?></td>
        </tr>
    </table>
</div>
