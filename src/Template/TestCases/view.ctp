<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCase $testCase
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= h($testCase->name) ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Summary') ?></th>
            <td><?= h($testCase->summary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Execution Type') ?></th>
            <td><?php
            if($testCase->execution_type==0) {
            echo 'Manual';
            }
            else {
            echo 'Automated';
            }
            ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Preconditions') ?></h4>
        <?php if (!empty($testCase->preconditions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
            <?php foreach ($testCase->preconditions as $preconditions): ?>
            <tr>
                <td><?= h($preconditions->description) ?></td>
                <td class="actions">
		    <?= $this->Form->create('Post', array('url' => '/preconditions/delete/'.$preconditions->id.'/'.$testCase->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete this precondition from this test case?\");")) ?>
		        <?php echo $this->Form->submit('/img/delete16.png');?>
		    <?= $this->Form->end() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Requirements') ?></h4>
        <?php if (!empty($testCase->requirements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
            <?php foreach ($testCase->requirements as $requirements): ?>
            <tr>
                <td><?= h($requirements->description) ?></td>
                <td class="actions">
		    <?= $this->Form->create('Post', array('url' => '/requirements/delete/'.$requirements->id.'/'.$testCase->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete this requirement from this test case?\");")) ?>
                        <?php echo $this->Form->submit('/img/delete16.png');?>
                     <?= $this->Form->end() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Steps') ?></h4>
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
                <td class="actions">
		    <?= $this->Form->create('Post', array('url' => '/test-case-steps/delete/'.$testCaseSteps->id.'/'.$testCase->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete this step from this test case?\");")) ?>
                        <?php echo $this->Form->submit('/img/delete16.png');?>
                    <?= $this->Form->end() ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <br>
    <div class="text-center">
        <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">
            <li><a href="/test-cases/edit/<?php echo $testCase->id ?>"><?php echo $this->Html->image("/img/edit.png"); ?></a></li>
            <?= $this->Form->create('Post', array('url' => '/test-cases/indexDelete/'.$testCase->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete $testCase->name?\");")) ?>
                <li><?php echo $this->Form->submit('/img/delete.png');?></li>
            <?= $this->Form->end() ?>
        </ul>
    </div>
</div>
