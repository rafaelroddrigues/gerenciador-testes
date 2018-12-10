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
</head>
<body class="home">

<header class="row">
    <div class="header-image"></div>
</header>

<div>
    <div class="text-center large-centered">
        <h3>Test Management</h3>
        <h5><?= $this->Html->link(__('Test Plans'), ['controller' => 'TestPlans', 'action' => 'index']) ?></h5>
        <h5><?= $this->Html->link(__('Test Cases'), ['controller' => 'TestCases', 'action' => 'index']) ?></h5>
        <h5><?= $this->Html->link(__('Test Case Steps'), ['controller' => 'TestCaseSteps', 'action' => 'index']) ?></h5>
        <h5><?= $this->Html->link(__('Requirements'), ['controller' => 'Requirements', 'action' => 'index']) ?></h5>
        <h5><?= $this->Html->link(__('Preconditions'), ['controller' => 'Preconditions', 'action' => 'index']) ?></h5>
	<h5><?= $this->Html->link(__('Defects'), ['controller' => 'Defects', 'action' => 'index']) ?></h5>
        <br>
        <h3>Test Execution</h3>
        <h5><?= $this->Html->link(__('Manual'), ['controller' => 'Executions', 'action' => 'home']) ?></h5>
        <h5><?= $this->Html->link(__('Automated'), ['controller' => 'Executions', 'action' => 'automated']) ?></h5>
        <br>
        <h3>Reports</h3>
        <h5><?= $this->Html->link(__('Execution Dashboard'), ['controller' => 'Executions', 'action' => 'report']) ?></h5>
    </div>
</div>

</body>
</html>
