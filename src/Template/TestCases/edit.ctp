<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($testCase, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Edit Test Case') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('summary');
            echo $this->Form->control('execution_type', ['options' => ['Manual','Automated'], 'empty' => true]);
            echo $this->Form->control('test_plans_id', ['options' => $testPlans, 'empty' => true]);
            echo $this->Form->control('preconditions._ids', ['options' => $preconditions]);
            echo $this->Form->control('requirements._ids', ['options' => $requirements]);
            echo $this->Form->control('test_case_steps._ids', ['options' => $testCaseSteps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
