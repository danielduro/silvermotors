<div class="row">
  <div class="category-boxes">
    <?php foreach($parent_terms as $parent_term): ?>
      <div class="category-box col-sm-6 col-md-3">
        <div class="wrapper">

          <?php if($parent_term['image']) : ?>
            <div class="picture">
              <?php print render($parent_term['image']); ?>
            </div>
          <?php endif; ?>

          <div class="meta">
              <div class="title">
                <?php print l($parent_term['name'], $parent_term['uri']); ?>
              </div>
          </div>
          <?php if(count($parent_term['child'])): ?>
            <div class="options">
              <ul>
              <?php foreach($parent_term['child'] as $child_term): ?>
                <li>
                    <?php print l($child_term['name'], $child_term['uri']); ?>
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>