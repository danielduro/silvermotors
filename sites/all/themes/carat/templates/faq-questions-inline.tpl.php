<?php

/**
 * @file
 * Template file for the FAQ page if set to show the questions inline.
 */

/**
 * Available variables:
 *
 * $nodes
 *   The array of nodes to be displayed.
 *   Each node stored in the $nodes array has the following information:
 *     $node['question'] is the question text.
 *     $node['body'] is the answer text.
 *     $node['links'] represents the node links, e.g. "Read more".
 * $question_label
 *   The question label, intended to be pre-pended to the question text.
 * $answer_label
 *   The answer label, intended to be pre-pended to the answer text.
 * $use_teaser
 *   Tells whether $node['body'] contains the full body or just the teaser
 */
?>
<a id="top"></a>


<?php if (count($nodes)): ?>
  <?php foreach ($nodes as $node): ?>
    <?php // Cycle through the $nodes array so that we now have a $node variable to work with. ?>

    <div class="block block-shadow white faq-item block-margin">
      <div class="block-inner">
        <div class="row">
          <div class="col-md-1">
            <div class="question-mark">
              <i class="icon icon-normal-question-mark"></i>
            </div>
          </div>

          <div class="col-md-11">
            <div class="faq-question">
              <?php if (!empty($question_label)): ?>
                <strong class="faq-question-label">
                <?php print $question_label; ?>
                </strong>
              <?php endif; ?>
              <div class="block-title">
                <h2><?php print $node['question']; ?></h2>
              </div>
            </div> <!-- Close div: faq-question -->

            <div class="faq-answer">
              <?php if (!empty($answer_label)): ?>
                <strong class="faq-answer-label">
                <?php print $answer_label; ?>
                </strong>
              <?php endif; ?>
              <?php print $node['body']; ?>
            </div> <!-- Close div: faq-answer -->

            <div class="actions">
              <?php if (isset($node['links'])): ?>
                <?php print $node['links']; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

