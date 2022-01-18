<!DOCTYPE html>
<html lang="en">
<head>
<title><?= h($this->fetch('title')) ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->Html->css('myapp/sidebar');
echo $this->Html->css('myapp/myapp');
echo $this->Html->script('jquery-3.6.0.min.js');
?>
</head>
<body>
<!-- If you'd like some sort of menu to
show up on all of your views, include it here -->
<div id="header">
    <div id="menu">
        <?php echo $this->element('myapp/header'); ?>
    </div>
</div>

<!-- Here's where I want my views to be displayed -->
<div class="container-fluid">
<div class="row">
    <div class="col-lg-2 p-0">
        <?php echo $this->element('myapp/sidebar'); ?>
    </div>
    <div class="col-lg-10">
        <div class="content mb-5">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>

</div>
<!-- Add a footer to each displayed page -->
<div id="footer" class="fixed-bottom">
    <?php echo $this->element('myapp/footer'); ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php echo $this->fetch('script');?>
</body>
</html>