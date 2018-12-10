<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="users view large-5 columns content text-center large-centered">
    <?= $this->Form->create($testCase, array('novalidate' => true)) ?>
    <fieldset>
        <legend><?= __('Add Test Case') ?></legend>
        <?php
            echo $this->Form->control('projects_id', ['value' => $this->request->session()->read('projectid'), 'type' => 'hidden']);
            echo $this->Form->control('name');
            echo $this->Form->control('summary');
            echo $this->Form->control('execution_type', ['options' => ['Manual','Automated'], 'empty' => true]);
            echo $this->Form->control('test_plans_id', ['options' => $testPlans, 'empty' => true]);
        ?>
    </fieldset>
    <div class="small-8 small-centered columns text-center">
        <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
</body>
</html>
