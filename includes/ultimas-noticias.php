
<ul class="trending-post">

  <?php 
  $i = 1;
  foreach ($viewpost->listPost() as $value) { 
  ?>

    <li>
      <a href="<?php echo PATH_DEFAULT.'single-post/'.$value['id']; ?>">
        <span class="author"><?php echo horario($value['data_upload']); ?></span>
        <span class="number"><?php echo $i; ?></span>
        <h3><?php echo $value['titulo']; ?></h3>        
      </a>
    </li>

  <?php 
    $i++;
  } 
  ?>

</ul>