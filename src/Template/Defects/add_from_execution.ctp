<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="defects view large-5 columns content text-center large-centered">
    <?= $this->Form->create($defect) ?>
    <fieldset>
        <legend><?= __('Add Defect') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
	    echo $this->Form->control('status', ['value' => '0', 'type' => 'hidden']);
            echo $this->Form->control('test_case_steps_id', ['value' => $step, 'type' => 'hidden']);
            echo $this->Form->control('executions_id', ['value' => $execution, 'type' => 'hidden']);
	    echo $this->Form->control('projects_id', ['value' => $this->request->session()->read('projectid'), 'type' => 'hidden']);
	    echo $this->Form->control('phases_id', ['value' => $this->request->session()->read('phaseid'), 'type' => 'hidden']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>
