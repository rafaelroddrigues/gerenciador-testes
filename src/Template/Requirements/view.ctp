<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 */
?>
<div class="text-center">
        <br>
    <div>
        <h3><?= h($requirement->name) ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($requirement->description) ?></td>
        </tr>
    </table>
    <br>
    <div class="text-center">
        <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">
            <li><a href="/requirements/edit/<?php echo $requirement->id ?>"><?php echo $this->Html->image("/img/edit.png"); ?></a></li>
            <?= $this->Form->create('Post', array('url' => '/requirements/permaDelete/'.$requirement->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete $requirement->name?\");")) ?>
                <li><?php echo $this->Form->submit('/img/delete.png');?></li>
            <?= $this->Form->end() ?>
        </ul>
    </div>
</div>
