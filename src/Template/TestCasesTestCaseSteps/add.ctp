<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div>
    <?= $this->Form->create($testCasesTestCaseStep) ?>
    <fieldset>
        <legend><?= __('Add Test Cases Test Case Step') ?></legend>
        <?php
            echo $this->Form->control('test_cases_id', ['options' => $testCases, 'empty' => true]);
            echo $this->Form->control('test_case_steps_id', ['options' => $testCaseSteps, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>