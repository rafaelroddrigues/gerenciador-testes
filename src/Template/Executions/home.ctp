<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$cakeDescription = 'Object Edge Quality Manager';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->script('jquery') ?>
    <?= $this->Html->script('submit') ?>
</head>
<body>

<header class="row">
    <div class="header-image"></div>
</header>

<div class="text-center large-centered large-6 columns">
    <?= $this->Form->create('phase', ['url'=>'/executions/selected']) ?>
    <fieldset>
        <legend>Manual Execution</legend>
    <?php
        echo $this->Form->select('phase',
            $phases,
            ['empty' =>'Choose Phase']
        );
    ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['id' => 'submit-button','class' => 'button round']) ?>
    <?= $this->Form->end() ?>
</div>

</body>
</html>
