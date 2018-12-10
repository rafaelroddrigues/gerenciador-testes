<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCase[]|\Cake\Collection\CollectionInterface $testCases
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= __('Test Cases') ?></h3>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_plans_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('execution_type') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testCases as $testCase): ?>
            <tr>
                <td><?= $this->Html->link(__($testCase->name), ['action' => 'view', $testCase->id]) ?></td>
                <td><?= $testCase->has('test_plan') ? $this->Html->link($testCase->test_plan->name, ['controller' => 'TestPlans', 'action' => 'view', $testCase->test_plan->id]) : '' ?></td>
                <td><?= $testCase->execution_type==0 ? h('Manual') : h('Automated') ?></td>
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
