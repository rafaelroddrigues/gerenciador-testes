<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCase[]|\Cake\Collection\CollectionInterface $testCases
 */
?>
<!DOCTYPE html>
<html>
<head>
<?= $this->Html->script('automation') ?>
</head>
<body>
<div>
    <div class="text-center">
        <br>
        <h3><?= __('Automated Executions') ?></h3>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $idoutput = 1; ?>
            <?php foreach ($testCases as $testCase): ?>
            <tr>
                <td><?= h($testCase->name) ?></td>
                <td><?php echo "<div id='output".$idoutput."'></div>" ?></td>
                <td>
		    <?= $this->Form->button('Add Script', ['class' => 'button round','onclick' => 'location.href=\'/executions/new/'.$testCase->id.'\'']) ?>
                    <?= $this->Form->button('Run', ['type' => 'button', 'id' => $workspace.'-'.$project.'-'.$testCase->name , 'class' => 'button round', 'onclick' => 'prepareButton(\''.$workspace.'-'.$project.'-'.$testCase->name.'\')']) ?>
		    <?= $this->Form->button('View Script', ['class' => 'button round','onclick' => 'location.href=\'/executions/viewscript/'.$workspace.'-'.$project.'-'.$testCase->name.'\'']) ?>
		</td>
            </tr>
            <?php $idoutput+=1; ?>
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
</body>
</html>
