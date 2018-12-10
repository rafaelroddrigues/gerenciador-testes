<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defect[]|\Cake\Collection\CollectionInterface $defects
 */
?>
<div class="text-center">
<br>
    <h3><?= __('Defects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('test_case_step') ?></th>
		<th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phase') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($defects as $defect): ?>
            <tr>
		<td><?= $this->Html->link(__($defect->name), ['action' => 'view', $defect->id]) ?></td>
                <td><?= h($defect->description) ?></td>
                <td><?= $defect->has('test_case_step') ? $this->Html->link($defect->test_case_step->action, ['controller' => 'TestCaseSteps', 'action' => 'view', $defect->test_case_step->id]) : '' ?></td>
		<td><?php
                if($defect->status == 0) {
                    echo "Open";
		} else if($defect->status == 1) {
                    echo "Fixed";
                }
                ?></td>
                <td><?= $defect->has('phase') ? $defect->phase->name : '' ?></td>
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
