<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCasesTestCaseStep[]|\Cake\Collection\CollectionInterface $testCasesTestCaseSteps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Test Cases Test Case Step'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case'), ['controller' => 'TestCases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Test Case Steps'), ['controller' => 'TestCaseSteps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Test Case Step'), ['controller' => 'TestCaseSteps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="testCasesTestCaseSteps index large-9 medium-8 columns content">
    <h3><?= __('Test Cases Test Case Steps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_cases_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_case_steps_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testCasesTestCaseSteps as $testCasesTestCaseStep): ?>
            <tr>
                <td><?= $this->Number->format($testCasesTestCaseStep->id) ?></td>
                <td><?= $testCasesTestCaseStep->has('test_case') ? $this->Html->link($testCasesTestCaseStep->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $testCasesTestCaseStep->test_case->id]) : '' ?></td>
                <td><?= $testCasesTestCaseStep->has('test_case_step') ? $this->Html->link($testCasesTestCaseStep->test_case_step->id, ['controller' => 'TestCaseSteps', 'action' => 'view', $testCasesTestCaseStep->test_case_step->id]) : '' ?></td>
                <td><?= h($testCasesTestCaseStep->created) ?></td>
                <td><?= h($testCasesTestCaseStep->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $testCasesTestCaseStep->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $testCasesTestCaseStep->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $testCasesTestCaseStep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $testCasesTestCaseStep->id)]) ?>
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
