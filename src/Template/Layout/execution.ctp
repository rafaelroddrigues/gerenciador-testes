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

$cakeDescription = 'Object Edge Quality Manager';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('jquery') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="/projects/selected"><?php 
                if($this->request->session()->read('projectid')) {
                echo 'Project '.$this->request->session()->read('projectname'); //MELHORIA: Fazer um set e get para Sessions (no AppController?)
                } ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <?php if ($this->request->action != 'report' || $this->request->action != 'automated'): ?>
                <ul class="left">
                    <li class="name">
                        <h1><a href="/executions/selected"><?php 
                        if($this->request->session()->read('phaseid')) {
                        echo $this->request->session()->read('phasename').' Phase'; //MELHORIA: Fazer um set e get para Sessions (no AppController?)
                        }?></a></h1>
                    </li>
                </ul>
            <?php endif; ?>
            <ul class="right">
                <?php if ($this->request->action == 'selected'): ?>
                    <li><?= $this->Html->link(__('Add Test Case'), ['controller' => 'Executions', 'action' => 'addtestcase']) ?></li>
                <?php endif; ?>
                <?php if ($this->request->action != 'selected'): ?>
                        <?php if ($this->request->action != 'report'): ?>
                            <?php if ($this->request->action != 'viewscript'): ?>
                                <?php if ($this->request->action != 'new'): ?>
                                    <?php if ($this->request->action != 'automated'): ?>
                                        <li><?= $this->Html->link(__('List Execution'), ['controller' => 'Executions', 'action' => 'selected']) ?></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->request->action == 'viewscript' || $this->request->action == 'new'): ?>
                    <li><?= $this->Html->link(__('Automated Executions'), ['controller' => 'Executions', 'action' => 'automated']) ?></li>
                <?php endif; ?>
                <?php if ($this->request->action != 'home'): ?>
                        <?php if ($this->request->action != 'report'): ?>
                            <?php if ($this->request->action != 'automated'): ?>
				<?php if ($this->request->action != 'new'): ?>
					<?php if ($this->request->action != 'viewscript'): ?>
		                                <li><?= $this->Html->link(__('Select Phase'), ['controller' => 'Executions', 'action' => 'home']) ?></li>
					<?php endif; ?>
				<?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                <?php endif; ?>
                <?php if ($username): ?>
                    <li><?= $this->Html->link(__('Select Project'), ['controller' => 'Projects', 'action' => 'home']) ?></li>
                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
