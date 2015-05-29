
<div class="col-md-3">
  <div class="overviews">

    <?php foreach($records['overview'] as $overview): ?>
      <div class="overview <?php if($overview == reset($records['overview'])) { print "active"; } ?>">

        <div class="overview-table">
          <div class="item title">
            <?php if(isset($overview['title'])): ?>
            <h3>
              <?php print $overview['title']; ?>
            </h3>
            <?php endif; ?>

            <?php if(isset($overview['subtitle'])): ?>
              <div class="subtitle">
                <?php print $overview['subtitle']; ?>
              </div>
            <?php endif; ?>
          </div>

          <?php if(isset($overview['price'])): ?>
          <div class="item tags">
            <div class="price">
              <?php print $overview['price']; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php foreach($overview['fields'] as $line): ?>
            <?php if($line['content']): ?>
              <div class="item line">
                <?php if(isset($line['label'])): ?>
                  <div class="property">
                    <?php print $line['label']; ?>
                  </div>
                <?php endif; ?>
                <div class="value">
                  <?php print $line['content']; ?>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>

      </div>
    <?php endforeach; ?>

    <div id="slider-navigation">
      <div class="prev"></div><!-- /.prev -->
      <div class="next"></div><!-- /.next -->
    </div><!-- /.slider-navigation -->
  </div>
</div>

<div class="col-md-7">

  <div class="carat-slider">
    <?php foreach($records['image'] as $image): ?>
      <div class="slide <?php if($image == reset($records['image'])) { print "active"; } ?>">
        <?php print $image; ?>
        <div class="color-overlay"></div>
      </div>
    <?php endforeach; ?>
  </div>

</div>