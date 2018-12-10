<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCaseStep[]|\Cake\Collection\CollectionInterface $testCaseSteps
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= __('Test Case Steps') ?></h3>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_results') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testCaseSteps as $testCaseStep): ?>
            <tr>
                <td><?= $this->Html->link(__($testCaseStep->action), ['action' => 'view', $testCaseStep->id]) ?></td>
                <td><?= h($testCaseStep->expected_results) ?></td>
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
