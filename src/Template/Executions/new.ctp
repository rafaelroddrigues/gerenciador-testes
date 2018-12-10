<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Execution $execution
 */
?>
<!DOCTYPE html>
<html>
<head>
<?= $this->Html->script('jquery') ?>
<?= $this->Html->script('new') ?>
</head>
<body>
<div>
    <div class="text-center">
    <br>
        <h3><?= $this->Html->link($testCase->name, ['controller' => 'TestCases', 'action' => 'view', $testCase->id]) ?></h3>
    </div>
    
    <div class="related text-center">
        <h4><?= __('Test Case Steps') ?></h4>
        <?php if (!empty($testCase->test_case_steps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Expected Results') ?></th>
            </tr>
            <?php foreach ($testCase->test_case_steps as $testCaseSteps): ?>
            <tr>
                <td><?= h($testCaseSteps->action) ?></td>
                <td><?= h($testCaseSteps->expected_results) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <?= $this->Form->create() ?>
        <div class="small-8 small-centered columns text-center">
            <legend><?= __('URL') ?></legend>
                <?= $this->Form->control('url',['label' => false, 'required' => true, 'oninvalid' => "this.setCustomValidity('This field cannot be left empty')", 'oninput' => "this.setCustomValidity('')"]); ?>
        </div>
        <div id='stepsGroup' class="row">
            <div id='stepActionDiv1' class="large-6 columns text-center">
                <label for="testcasesteps-action" id="action">Action 1</label>
                <?php echo $this->Form->control('TestCaseSteps.action', ['name' => 'action1', 'options' => ['Click','Type','Hover','Press Key'], 'empty' => true, 'label' => false, 'required' => true, 'oninvalid' => "this.setCustomValidity('This field cannot be left empty')", 'oninput' => "this.setCustomValidity('')"]); ?>
            </div>
            <div id='stepExpectedResultsDiv1' class="large-6 columns text-center">
                <label for="testcasesteps-expected-results">Web Selector 1</label>
                <?php echo $this->Form->control('TestCaseSteps.expected_results', ['name' => 'expected_results1', 'label' => false, 'required' => true, 'oninvalid' => "this.setCustomValidity('This field cannot be left empty')", 'oninput' => "this.setCustomValidity('')"]); ?>
            </div>
            <div id='separador1' class="large-12 columns"></div>
        </div>
        <br>
        <div class="small-centered columns text-center" id="newPageButtons">
            <button type='button' id='addButton' class='button round'>ADD ACTION</button>
            <button type='button' id='removeButton' class='button round'>REMOVE ACTION</button>
        </div>
        <div class="small-8 small-centered columns text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
        </div>
        <?= $this->Form->end() ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
