
<div class="col-lg-4 border-start custom-border">

  <?php foreach($viewpost->postPares() as $value) {  ?>
    <div class="post-entry-1">

      <?php if($value['path'] <> null) { ?>
        <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>">
          <img src="assets/img/<?php echo $value['path']; ?>" alt="<?php echo $value['titulo']; ?>" class="img-fluid">
        </a>
      <?php } ?>

      <div class="post-meta">
        <span class="date"><?php echo $value['tags']; ?></span> 
        <span class="mx-1">&bullet;</span> 
        <span><?php echo horario($value['data_upload']); ?></span>
      </div>
      <h2><a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>"><?php echo $value['titulo']; ?></a></h2>
    </div>
  <?php } ?>

</div>

<div class="col-lg-4 border-start custom-border">

  <?php foreach($viewpost->postImpares() as $value) {  ?>
    <div class="post-entry-1">

      <?php if($value['path'] <> null) { ?>
        <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>">
          <img src="assets/img/<?php echo $value['path']; ?>" alt="<?php echo $value['titulo']; ?>" class="img-fluid">
        </a>
      <?php } ?>
      
      <div class="post-meta">
        <span class="date"><?php echo $value['tags']; ?></span> 
        <span class="mx-1">&bullet;</span> 
        <span><?php echo horario($value['data_upload']); ?></span>
      </div>
      <h2><a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>"><?php echo $value['titulo']; ?></a></h2>
    </div>
  <?php } ?>

</div>
