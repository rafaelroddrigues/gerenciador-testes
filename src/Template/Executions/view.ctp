<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Execution $execution
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= $execution->has('test_case') ? $this->Html->link($execution->test_case->name, ['controller' => 'TestCases', 'action' => 'view', $execution->test_case->id]) : '' ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?php
                if($execution->status == 0) {
                    echo "Not Run";
                } else if($execution->status == 1) {
                    echo "Passed";
                } else if($execution->status == 2) {
                    echo "Failed";
                }
                ?>                    
                </td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $execution->has('user') ? $this->Html->link($execution->user->name, ['controller' => 'Users', 'action' => 'view', $execution->user->id]) : '' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Preconditions') ?></h4>
        <?php if (!empty($testCase->preconditions)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($testCase->preconditions as $preconditions): ?>
            <tr>
                <td><?= h($preconditions->description) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Requirements') ?></h4>
        <?php if (!empty($testCase->requirements)): ?>
        <table cellpadding="0" cellspacing="0">
            <?php foreach ($testCase->requirements as $requirements): ?>
            <tr>
                <td><?= h($requirements->description) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Test Case Steps') ?></h4>
        <?php if (!empty($testCase->test_case_steps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Expected Results') ?></th>
		<th scope="col" class="actions"><?= __('') ?></th>
            </tr>
            <?php foreach ($testCase->test_case_steps as $testCaseSteps): ?>
            <tr>
                <td><?= h($testCaseSteps->action) ?></td>
                <td><?= h($testCaseSteps->expected_results) ?></td>
		<td class="">
                    <a href="/defects/addFromExecution/<?php echo $testCaseSteps->id ?>/1"><?php echo $this->Html->image("/img/bug16.png"); ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <br>
    <div class="text-center">
	<?= $this->Form->create('Post', array('url' => '/executions/edit/'.$execution->id)) ?>
	    <ul class="large-block-grid-3">
                <li><?php echo $this->Form->submit('/img/notrun.png', array("id" => "status", "name" => "status", "value" => "0"));?></li>
                <li><?php echo $this->Form->submit('/img/ok.jpg', array("id" => "status", "name" => "status", "value" => "1"));?></li>
                <li><?php echo $this->Form->submit('/img/fail.png', array("id" => "status", "name" => "status", "value" => "2"));?></li>
	    </ul>
	<?= $this->Form->end() ?>
    </div>
</div>
