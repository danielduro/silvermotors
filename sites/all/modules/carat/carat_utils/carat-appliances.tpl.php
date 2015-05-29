<?php if($columns): ?>
  <div class="row">
    <?php foreach($columns as $column): ?>
      <div class="col-sm-6 col-md-6">
        <ul class="appliances">
        <?php foreach($column as $item): ?>
          <li>
            <span class="dot"></span>
            <?php print $item['value']; ?>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>