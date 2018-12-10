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

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

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
<div class="users view large-5 columns content text-center large-centered">
    <div>
        <h3><?= __('Manual Execution Dashboard') ?></h3>
    </div>
    <table>
        <tbody>
                <?php
                $qanotrun = 0;
                $qapassed = 0;
                $qafailed = 0;
                $hmlnotrun = 0;
                $hmlpassed = 0;
                $hmlfailed = 0;
                $prodnotrun = 0;
                $prodpassed = 0;
                $prodfailed = 0;
                foreach ($executionsqa as $qastatus):
                    if($qastatus->status == 0) {
                        $qanotrun++;
                    } else if($qastatus->status == 1) {
                        $qapassed++;
                    } else if($qastatus->status == 2) {
                        $qafailed++;
                    }
                endforeach;
                foreach ($executionshml as $hmlstatus):
                    if($hmlstatus->status == 0) {
                        $hmlnotrun++;
                    } else if($hmlstatus->status == 1) {
                        $hmlpassed++;
                    } else if($hmlstatus->status == 2) {
                        $hmlfailed++;
                    }
                endforeach;
                foreach ($executionsprod as $prodstatus):
                    if($prodstatus->status == 0) {
                        $prodnotrun++;
                    } else if($prodstatus->status == 1) {
                        $prodpassed++;
                    } else if($prodstatus->status == 2) {
                        $prodfailed++;
                    }
                endforeach;
                ?>
            <div>
                <h2><pre>QA</pre></h2>
                <h3><pre>Progress: <?php 
                    echo ( $qa == 0 ? 0 : number_format((float)($qapassed/$qa)*100, 2, '.', '') );
                    echo "%"
                ?></pre></h3>
                <pre>Total Executions: <?php echo $qa ?></pre>
                <pre>Not Run: <?php echo $qanotrun ?></pre>
                <pre>Passed: <?php echo $qapassed ?></pre>
                <pre>Failed: <?php echo $qafailed ?></pre>
                <br>
            </div>
            <div>
                <h2><pre>HML</pre></h2>
                <h3><pre>Progress: <?php 
                    echo ( $hml == 0 ? 0 : number_format((float)($hmlpassed/$hml)*100, 2, '.', '') );
                    echo "%"
                ?></pre></h3>
                <pre>Total Executions: <?php echo $hml ?></pre>
                <pre>Not Run: <?php echo $hmlnotrun ?></pre>
                <pre>Passed: <?php echo $hmlpassed ?></pre>
                <pre>Failed: <?php echo $hmlfailed ?></pre>
                <br>
            </div>
            <div>
                <h2><pre>PROD</pre></h2>
                <h3><pre>Progress: <?php 
                    echo ( $prod == 0 ? 0 : number_format((float)($prodpassed/$prod)*100, 2, '.', '') );
                    echo "%"
                ?></pre></h3>
                <pre>Total Executions: <?php echo $prod ?></pre>
                <pre>Not Run: <?php echo $prodnotrun ?></pre>
                <pre>Passed: <?php echo $prodpassed ?></pre>
                <pre>Failed: <?php echo $prodfailed ?></pre>
                <br>
            </div>
        </tbody>
    </table>
</div>
</body>
</html>