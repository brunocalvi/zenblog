
<ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="true">+ Vistas</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">+ Recentes</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-coment-tab" data-bs-toggle="pill" data-bs-target="#pills-coment" type="button" role="tab" aria-controls="pills-coment" aria-selected="false">+ Populares</button>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">

  <!-- + Vistas -->
  <div class="tab-pane fade show active" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">

    <?php foreach ($viewpost->listHits() as $value) { ?> 

      <div class="post-entry-1 border-bottom">
        <div class="post-meta">
          <span class="date"><?php echo $value['tags']; ?></span> 
          <span class="mx-1">&bullet;</span> 
          <span><?php echo horario($value['data_upload']); ?></span>
        </div>
        <h2 class="mb-2">
          <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>">
            <?php echo $value['titulo']; ?>
          </a>
        </h2>
        <span class="author mb-3 d-block"><?php echo $value['fonte'] <> null ? 'FONTE: '.$value['fonte'] : ''; ?></span>
      </div>

    <?php  } ?>

  </div>
  <!-- End + Vistas -->

  <!-- + Recentes -->
  <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">

    <?php foreach ($viewpost->listPost() as $value) { ?> 

      <div class="post-entry-1 border-bottom">
        <div class="post-meta">
          <span class="date"><?php echo $value['tags']; ?></span> 
          <span class="mx-1">&bullet;</span> 
          <span><?php echo horario($value['data_upload']); ?></span>
        </div>
        <h2 class="mb-2">
          <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>">
            <?php echo $value['titulo']; ?>
          </a>
        </h2>
        <span class="author mb-3 d-block"><?php echo $value['fonte'] <> null ? 'FONTE: '.$value['fonte'] : ''; ?></span>
      </div>

    <?php  } ?>

  </div>
  <!-- End + Recentes -->

  <!-- + Populares -->
  <div class="tab-pane fade show active" id="pills-coment" role="tabpanel" aria-labelledby="pills-coment-tab">

    <?php 
    foreach($viewpost->listPopu() as $value_popu) { 
      foreach ($viewpost->postUnique($value_popu['id_post']) as $value) {
    ?> 

      <div class="post-entry-1 border-bottom">
        <div class="post-meta">
          <span class="date"><?php echo $value['tags']; ?></span> 
          <span class="mx-1">&bullet;</span> 
          <span><?php echo horario($value['data_upload']); ?></span>
        </div>
        <h2 class="mb-2">
          <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>">
            <?php echo $value['titulo']; ?>
          </a>
        </h2>
        <span class="author mb-3 d-block"><?php echo $value['fonte'] <> null ? 'FONTE: '.$value['fonte'] : ''; ?></span>
      </div>

    <?php 
      }
    } 
    ?>

  </div>
  <!-- End + Populares -->

</div>