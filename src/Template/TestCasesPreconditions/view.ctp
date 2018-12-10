<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCasesPrecondition $testCasesPrecondition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Test Cases Precondition'), ['action' => 'edit', $testCasesPrecondition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Test Cases Precondition'), ['action' => 'delete', $testCasesPrecondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesPrecondition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Test Cases Preconditions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Cases Precondition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Preconditions'), ['controller' => 'Preconditions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Precondition'), ['controller' => 'Preconditions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="testCasesPreconditions view large-9 medium-8 columns content">
    <h3><?= h($testCasesPrecondition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Test Case') ?></th>
            <td><?= $testCasesPrecondition->has('test_case') ? $this->Html->link($testCasesPrecondition->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $testCasesPrecondition->test_case->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precondition') ?></th>
            <td><?= $testCasesPrecondition->has('precondition') ? $this->Html->link($testCasesPrecondition->precondition->id, ['controller' => 'Preconditions', 'action' => 'view', $testCasesPrecondition->precondition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($testCasesPrecondition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($testCasesPrecondition->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($testCasesPrecondition->modified) ?></td>
        </tr>
    </table>
</div>
