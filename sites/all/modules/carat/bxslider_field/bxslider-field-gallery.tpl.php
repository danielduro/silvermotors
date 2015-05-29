<div class="bxslider-field-gallery-wrapper" data-entity-id="<?php print $entity_id; ?>">

  <div class="bxslider-field-gallery">
    <?php foreach($slides as $index => $slide): ?>

      <div class="picture-wrapper <?php if ($index == 0) { print "active"; } ?>">
        <?php print $slide; ?>
      </div>
    <?php endforeach; ?>
  </div><!-- /.gallery -->

  <div class="bx-pager">
    <?php foreach($pager as $index => $page): ?>
      <a class="bx-page <?php if($index == 0) { print 'active'; } ?>" data-slide-index="<?php print $index; ?>">
        <?php print $page; ?>
      </a>
    <?php endforeach; ?>
  </div><!-- /.gallery-thumbnails -->
</div> <!-- /#gallery-wrapper -->