<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Execution[]|\Cake\Collection\CollectionInterface $executions
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= __('Manual Executions') ?></h3>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('test_cases_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
		<th scope="col" class="actions"><?= __('') ?></th>
		<th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($executions as $execution): ?>
            <tr>
                <td><?= $execution->has('test_case') ? $this->Html->link($execution->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $execution->test_case->id]) : '' ?></td>
                <td><?php
                if($execution->status == 0) {
                    echo "Not Run";
                } else if($execution->status == 1) {
                    echo "Passed";
                } else if($execution->status == 2) {
                    echo "Failed";
                }
                ?></td>
                <td><?= $execution->has('user') ? $execution->user->name : '' ?></td>
                <td class="">
		    <a href="/executions/view/<?php echo $execution->id ?>"><?php echo $this->Html->image("/img/play.gif"); ?></a>
		</td>
		<td class="">
		    <a href="/executions/edit/<?php echo $execution->id ?>"><?php echo $this->Html->image("/img/user16.jpg"); ?></a>
		<td class="">
		    <?= $this->Form->create('Post', array('url' => '/executions/delete/'.$execution->id, 'onsubmit' => "return confirm(\"Are you sure you want to remove this test case from this phase?\");")) ?>
                        <?php echo $this->Form->submit('/img/delete16.png');?>
                    <?= $this->Form->end() ?>
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
