<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCasesRequirement $testCasesRequirement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Test Cases Requirement'), ['action' => 'edit', $testCasesRequirement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Test Cases Requirement'), ['action' => 'delete', $testCasesRequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesRequirement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Test Cases Requirements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Cases Requirement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="testCasesRequirements view large-9 medium-8 columns content">
    <h3><?= h($testCasesRequirement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Test Case') ?></th>
            <td><?= $testCasesRequirement->has('test_case') ? $this->Html->link($testCasesRequirement->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $testCasesRequirement->test_case->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirement') ?></th>
            <td><?= $testCasesRequirement->has('requirement') ? $this->Html->link($testCasesRequirement->requirement->name, ['controller' => 'Requirements', 'action' => 'view', $testCasesRequirement->requirement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($testCasesRequirement->id) ?></td>
        </tr>
    </table>
</div>
