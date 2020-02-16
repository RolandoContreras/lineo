<div class=content-item-wrap>
  <div class="learn-press-video-intro thim-lesson-media">
    <div class=wrapper>
        <iframe width=980 height=550 src="https://www.youtube.com/embed/<?php echo $video_link;?>" frameborder allowfullscreen></iframe>
    </div>
  </div>
  <div class=content-item-summary>
    <h3 class="course-item-title question-title"><?php echo $obj_courses->name;?></h3>
    <div class="content-item-description lesson-description">
        <a class="section-item-link" href="#">
            <span class="item-name">Fecha: <?php echo formato_fecha_dia_mes($obj_courses->date);?></span>
        </a><br/>
        <p>
            <?php echo $obj_courses->description;?>
        </p>
    </div>
  </div>
</div>