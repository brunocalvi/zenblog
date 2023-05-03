
<div class="col-lg-4">

  <?php foreach ($viewpost->postMaster() as $value) { ?>

    <div class="post-entry-1 lg">
      <?php if($value['path'] <> null) { ?>
      <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>">
        <img src="assets/img/<?php echo $value['path']; ?>" alt="<?php echo $value['titulo']; ?>" class="img-fluid">
      </a>
      <?php } ?>

      <div class="post-meta">
        <span class="date"><?php echo $value['tags']; ?></span> 
        <span class="mx-1">&bullet;</span> <span><?php echo horario($value['data_upload']); ?></span>
      </div>

      <h2><a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>"><?php echo $value['titulo']; ?></a></h2>
      <p class="mb-4 d-block"><?php echo $value['descricao']; ?></p>

      <div class="d-flex align-items-center author">
        <div class="name">
          <h3 class="m-0 p-0"><?php echo $value['fonte'] <> null ? 'FONTE: '.$value['fonte'] : ''; ?></h3>
        </div>
      </div>
    </div>

  <?php } ?>

</div>

