<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users view large-5 columns content text-center large-centered">
    <?php $testCase = null; ?>
    <?= $this->Form->create($testCase) ?>
    <fieldset>
        <legend><?= __('Add Existing Test Case') ?></legend>
        <?php
            echo $this->Form->control('test_cases_id', ['options' => $testCases, 'empty' => true]);
            echo $this->Form->control('test_plans_id', ['options' => $testPlans, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>