<?php
$maps=scandir('./maps/');
foreach($maps as $mk=>$map) {
    if ($map == '.' || $map == '..') {
        unset($maps[$mk]);
    }
}
$taglist=[
    'defence'=>[
        'name'=>'defence',
        'type'=>'success'
    ]
];
?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8;"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
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
                <h1>MO3 MAPs</h1>
                <?php
                if(@$taglist[@$_GET['tag']]){
                    echo '<p class="lead">Tag '.$taglist[$_GET['tag']]['name'].' Limited.</p>';
                    $limit_tag=true;
                }else{
                    echo '<p class="lead">Welcome to MO3 Maps.You can upload or download your maps.</p>';
                    $limit_tag=false;
                }?>
            </div>
        </div>
    </div>
<div class="row">
<?php
foreach($maps as $map){
    if($map=='.' || $map=='..'){
        continue;
    }
    $info=json_decode(file_get_contents('./maps/'.$map.'/info.json'));
    if($limit_tag){
        $se=true;
        foreach ($info->tags as $tag) {
            if($tag == $_GET['tag']){
                $se=false;
                break;
            }
        }
        if($se){
            continue;
        }
    }
?>
    <div class="col-lg-4">
        <div class="card border-primary mb-3">
            <h3 class="card-header"><?php echo $info->name; ?></h3>
            <img style="height: 200px; width: 100%; display: block;" src="./maps/<?php echo urlencode($map); ?>/cover.png" alt="<?php echo $info->name; ?>">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                <?php foreach($info->tags as $tag){
                    echo '<a href="index.php?tag='.urlencode($tag).'"><span class="badge badge-'.$taglist[$tag]['type'].'">'.$taglist[$tag]['name'].'</span></a>';
                }?>
            </div>
            <div class="card-body">
                <a href="<?php echo './detail.php?name='.urlencode($map);?>" class="card-link">Details</a>
                <a href="<?php echo './maps/'.urlencode($map).'/'.urlencode($map).'.zip';?>" class="card-link">Download</a>
            </div>
            <div class="card-footer text-muted">
                <?php echo $info->version; ?> Powered by <?php echo $info->author; ?>
            </div>
        </div>
    </div>
<?php
    }
?>
</div>
</div>
</body>
</html>
