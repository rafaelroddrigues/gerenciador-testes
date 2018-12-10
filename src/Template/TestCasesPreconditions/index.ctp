<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCasesPrecondition[]|\Cake\Collection\CollectionInterface $testCasesPreconditions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Test Cases Precondition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Preconditions'), ['controller' => 'Preconditions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Precondition'), ['controller' => 'Preconditions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testCasesPreconditions index large-9 medium-8 columns content">
    <h3><?= __('Test Cases Preconditions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_cases_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('preconditions_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testCasesPreconditions as $testCasesPrecondition): ?>
            <tr>
                <td><?= $this->Number->format($testCasesPrecondition->id) ?></td>
                <td><?= $testCasesPrecondition->has('test_case') ? $this->Html->link($testCasesPrecondition->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $testCasesPrecondition->test_case->id]) : '' ?></td>
                <td><?= $testCasesPrecondition->has('precondition') ? $this->Html->link($testCasesPrecondition->precondition->id, ['controller' => 'Preconditions', 'action' => 'view', $testCasesPrecondition->precondition->id]) : '' ?></td>
                <td><?= h($testCasesPrecondition->created) ?></td>
                <td><?= h($testCasesPrecondition->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $testCasesPrecondition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $testCasesPrecondition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $testCasesPrecondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesPrecondition->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
