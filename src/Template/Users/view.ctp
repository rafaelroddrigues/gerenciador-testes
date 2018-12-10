<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div>
    <div class="text-center">
        <br>
        <h3><?= h($user->name) ?></h3>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? h($user->role->name) : '' ?></td>
        </tr>
    </table>
<div class="text-center">
        <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2">
            <li><a href="/users/edit/<?php echo $user->id ?>"><?php echo $this->Html->image("/img/edit.png"); ?></a></li>
            <?= $this->Form->create('Post', array('url' => '/users/permaDelete/'.$user->id, 'onsubmit' => "return confirm(\"Are you sure you want to delete $user->name?\");")) ?>
                <li><?php echo $this->Form->submit('/img/delete.png');?></li>
            <?= $this->Form->end() ?>
        </ul>
    </div>
</div>
