<div class="contact">
  <?php if ($mobile): ?>
    <div class="contact-item phone">
      <div class="label"><i class="icon icon-normal-mobile-phone"></i></div><!-- /.label -->
      <div class="value"><?php print $mobile; ?></div><!-- /.value -->
    </div><!-- /.phone -->
  <?php endif; ?>

  <?php if ($mail): ?>
    <div class="contact-item mail">
      <div class="label"><i class="icon icon-normal-mail"></i></div><!-- /.label -->
      <div class="value"><a href="<?php print $mail; ?>"><?php print $mail; ?></a></div><!-- /.value -->
    </div><!-- /.mail -->
  <?php endif; ?>

  <?php if ($hours): ?>
    <div class="contact-item opening">
      <div class="label"><i class="icon icon-normal-clock"></i></div><!-- /.label -->
      <div class="value"><?php print $hours; ?></div><!-- /.value -->
    </div><!-- /.opening -->
  <?php endif; ?>
</div>