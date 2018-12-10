<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TestCaseStep $testCaseStep
 */
?>
<div class="text-center">
        <br>
    <div>
        <h3><?= h($testCaseStep->name) ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($testCaseStep->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Results') ?></th>
            <td><?= h($testCaseStep->expected_results) ?></td>
        </tr>
    </table>
    <div class="related text-center large-centered">
        <h4><?= __('Test Cases') ?></h4>
        <?php if (!empty($testCaseStep->test_cases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
            </tr>
            <?php foreach ($testCaseStep->test_cases as $testCases): ?>
            <tr>
                <td><?= h($testCases->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <br>
    <div class="text-center">
        <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">
            <li><a href="/test-case-steps/edit/<?php echo $testCaseStep->id ?>"><?php echo $this->Html->image("/img/edit.png"); ?></a></li>
            <?= $this->Form->create('Post', array('url' => '/test-case-steps/permaDelete/'.$testCaseStep->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete this step?\");")) ?>
                <li><?php echo $this->Form->submit('/img/delete.png');?></li>
            <?= $this->Form->end() ?>
        </ul>
    </div>
</div>
