<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCasesRequirement[]|\Cake\Collection\CollectionInterface $testCasesRequirements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Test Cases Requirement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Requirement'), ['controller' => 'Requirements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testCasesRequirements index large-9 medium-8 columns content">
    <h3><?= __('Test Cases Requirements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_cases_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('requirements_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testCasesRequirements as $testCasesRequirement): ?>
            <tr>
                <td><?= $this->Number->format($testCasesRequirement->id) ?></td>
                <td><?= $testCasesRequirement->has('test_case') ? $this->Html->link($testCasesRequirement->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $testCasesRequirement->test_case->id]) : '' ?></td>
                <td><?= $testCasesRequirement->has('requirement') ? $this->Html->link($testCasesRequirement->requirement->name, ['controller' => 'Requirements', 'action' => 'view', $testCasesRequirement->requirement->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $testCasesRequirement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $testCasesRequirement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $testCasesRequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesRequirement->id)]) ?>
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
