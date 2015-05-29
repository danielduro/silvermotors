<div class="block default-dark">
  <div class="row">
    <div class="col-sm-8 col-md-8">
      <div id="magazine-slider">
        <?php foreach($records as $id => $fields): ?>
          <div class="slide">
            <?php print $fields['image']; ?>

            <div class="inline-description">
              <div class="inner">
                <?php foreach($fields['content'] as $field): ?>
                  <?php print $field; ?>
                <?php endforeach; ?>
              </div>
            </div><!-- /.inline-description -->
          </div>
        <?php endforeach; ?>
      </div><!-- .magazine-slider -->
    </div>

    <div class="col-sm-4 col-md-4">
      <div id="magazine-slider-pager">
        <?php $index = 0; ?>
        <?php foreach($records as $id => $fields): ?>

          <div class="bx-page <?php if($index == 0) { print 'active'; } ?>" data-slide-index="<?php print $index; ?>">
            <div class="inner">
              <?php $index++; ?>
              <?php foreach($fields['pager'] as $field): ?>
                <?php print $field; ?>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div><!-- /#magazine-slider-pager -->
    </div>
  </div><!-- /.row -->
</div><!-- /.block -->