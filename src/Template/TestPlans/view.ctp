<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestPlan $testPlan
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= h($testPlan->name) ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($testPlan->description) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Test Cases') ?></h4>
        <?php if (!empty($testCases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Summary') ?></th>
                <th scope="col"><?= __('Execution Type') ?></th>
            </tr>
            <?php foreach ($testCases as $testCase): ?>
            <tr>
                <td><?php echo $this->Html->link(__($testCase['name']), ['controller' => 'TestCases', 'action' => 'view', $testCase['id']]);?></td>
                <td><?php echo $testCase['summary'];?></td>
                <td><?php
                    if($testCase['execution_type'] == 0) {
                        echo "Manual";
                    } else {
                        echo "Automated";
                    }
                ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <br>
    <div class="text-center">
        <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">
            <li><a href="/test-plans/edit/<?php echo $testPlan->id ?>"><?php echo $this->Html->image("/img/edit.png"); ?></a></li>
            <?= $this->Form->create('Post', array('url' => '/test-plans/delete/'.$testPlan->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete $testPlan->name?\");")) ?>
	        <li><?php echo $this->Form->submit('/img/delete.png');?></li>
            <?= $this->Form->end() ?>
        </ul>
    </div>
</div>
