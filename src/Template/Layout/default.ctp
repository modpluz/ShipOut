<?php
use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ShipOut!
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?=$this->Html->script('jquery.js')?>
    <?=$this->Html->script('bootstrap.min.js')?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <section class="header text-center">
        <h2>ShipOut!</h2>
    </section>
    <nav class="navbar navbar-inverse col-md-8 col-md-offset-2">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ShipOut!</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
                <ul class="nav navbar-nav">
                    <li class="<?php if($this->request->here == Router::url(['_name' => 'Shipment::Index'])){ echo 'active';}?>?>">
                        <a href="<?=Router::url(['_name' => 'Shipment::Index'])?>">Shipments</a>
                    </li>
                    <li class="<?php if($this->request->here == Router::url(['_name' => 'Shipment::Create'])){ echo 'active';}?>?>">
                        <a href="<?=Router::url(['_name' => 'Shipment::Create'])?>">Create a Shipment</a>
                    </li>
                    <li class="<?php if($this->request->here == Router::url(['_name' => 'Shipment::TrackIndex'])){ echo 'active';}?>?>">
                        <a href="<?=Router::url(['_name' => 'Shipment::TrackIndex'])?>">Track Shipment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container clearfix">
        <?= $this->Flash->render() ?>
        <div class="col col-md-10">
            <div class="col col-md-10 col-md-offset-2">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </section>
    <footer>
    </footer>
</body>
</html>
