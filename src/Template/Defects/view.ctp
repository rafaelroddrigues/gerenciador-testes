<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defect $defect
 */
?>
<div class="text-center">
<br>
    <h3><?= h($defect->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($defect->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($defect->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Test Case Step') ?></th>
            <td><?= $defect->has('test_case_step') ? $this->Html->link($defect->test_case_step->action, ['controller' => 'TestCaseSteps', 'action' => 'view', $defect->test_case_step->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phase') ?></th>
            <td><?= $defect->has('phase') ? $defect->phase->name : '' ?></td>
        </tr>
    </table>
    <br>
    <div class="text-center">
        <?= $this->Form->create('Post', array('url' => '/defects/edit/'.$defect->id)) ?>
            <ul class="large-block-grid-3">
                <li><?php echo $this->Form->submit('/img/notrun.png', array("id" => "status", "name" => "status", "value" => "0"));?></li>
		<?= $this->Form->create('Post', array('url' => '/defects/delete/'.$defect->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete $defect->name?\");")) ?>
	                <li><?php echo $this->Form->submit('/img/delete.png');?></li>
                <?= $this->Form->end() ?>
                <li><?php echo $this->Form->submit('/img/ok.jpg', array("id" => "status", "name" => "status", "value" => "1"));?></li>
            </ul>
        <?= $this->Form->end() ?>
    </div>
</div>
