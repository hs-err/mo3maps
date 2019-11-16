<?php
require('./vendor/autoload.php');
$info=json_decode(file_get_contents('./maps/'.$_GET['name'].'/info.json'));

$maps = scandir('./maps/');
foreach ($maps as $mk => $map) {
    if ($map == '.' || $map == '..') {
        unset($maps[$mk]);
    }
}
$taglist = [
    'demo' => [
        'name' => '样例',
        'type' => 'success'
    ]
];

?>
<html lang="en">
<head><link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">MO3 maps</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./detail.php?name=<?php echo urlencode($maps[array_rand($maps)]);?>">Random</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/hs-err/mo3maps/">Github</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1><?php echo $info->name;?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Author
                            <span class="badge badge-primary badge-pill"><?php echo $info->author;?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Version
                            <span class="badge badge-primary badge-pill"><?php echo $info->version;?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tags
                            <?php foreach($info->tags as $tag){
                                echo '<a href="index.php?tag='.urlencode($tag).'"><span class="badge badge-'.$taglist[$tag]['type'].'">'.$taglist[$tag]['name'].'</span></a>';
                            }?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            GITHUB
                            <?php foreach($info->tags as $tag){
                                echo '<a href="https://github.com/hs-err/mo3maps/blob/master/maps/'.urlencode($_GET['name']).'"><span class="badge badge-success">Link to github</span></a>';
                            }?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <img style="height: 200px; width: 100%; display: block;" src="./maps/<?php echo urlencode($_GET['name']);?>/cover.png" alt="<?php echo $info->name; ?>">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-primary mb-3">
                <h3 class="card-header">Download</h3>
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href='<?php echo './maps/'.urlencode($_GET['name']).'/'.urlencode($_GET['name']).'.zip';?>';">local</button>
                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href='<?php echo 'https://github.com/hs-err/mo3maps/raw/master/maps/'.urlencode($_GET['name']).'/'.urlencode($_GET['name']).'.zip';?>';">Github</button>
                </div>
                <div class="card-footer text-muted">
                    Size: <?php echo filesize('./maps/'.$_GET['name'].'/'.$_GET['name'].'.zip')/1024/1024;?> MB
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1 id="containers">README.md</h1>
            </div>
            <div class="bs-component">
                <div class="jumbotron">
                    <?php
                        $Parsedown = new Parsedown();
                        echo $Parsedown->setSafeMode(true)->text(file_get_contents('./maps/'.$_GET['name'].'/README.md'));
                    ?>
                </div>
        </div>
    </div>
</div>
</body>
</html>

