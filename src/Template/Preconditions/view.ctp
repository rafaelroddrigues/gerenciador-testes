<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Precondition $precondition
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= h($precondition->name) ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($precondition->description) ?></td>
        </tr>
    </table>
    <br>
    <div class="text-center">
        <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">
            <li><a href="/preconditions/edit/<?php echo $precondition->id ?>"><?php echo $this->Html->image("/img/edit.png"); ?></a></li>
            <?= $this->Form->create('Post', array('url' => '/preconditions/permaDelete/'.$precondition->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete $precondition->name?\");")) ?>
                <li><?php echo $this->Form->submit('/img/delete.png');?></li>
            <?= $this->Form->end() ?>
        </ul>
    </div>
</div>
