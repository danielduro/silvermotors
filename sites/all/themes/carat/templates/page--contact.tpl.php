<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<div id="page-wrapper"><div id="page" class="page-contact">

<div id="topbar" class="gray">
  <div class="container">
    <div class="row">

      <div class="col-xs-12 col-md-6">
        <div class="header-top-left">
          <?php if($page['topbar_left']): ?>
            <?php print render($page['topbar_left']); ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-md-6 col-xs-12">
        <div class="header-top-right">
          <?php if($page['topbar_right']): ?>
            <?php print render($page['topbar_right']); ?>
          <?php endif; ?>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /#topbar -->

<div id="header">
  <div class="header-inner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="brand">
            <div class="logo">
              <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                  <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                </a>
              <?php endif; ?>
            </div>

            <?php if ($site_slogan): ?>
              <div class="slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div>


          <?php if ($title): ?>
              <div id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span></span></a>
              </div>
          <?php endif; ?>

          <?php if (!empty($page['navigation'])): ?>


            <div id="navigation-wrapper" class="navbar-collapse collapse">
              <nav id="navigation" role="navigation">
                <?php print render($page['navigation']); ?>
              </nav>
            </div>

          <?php endif; ?>
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.header-inner -->


  <div id="infobar">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <?php if (!empty($breadcrumb)): ?>
            <div id="breadcrumb" class="pull-left">
              <?php print $breadcrumb; ?>
            </div>
          <?php endif; ?>

          <div id="infobar-right" class="pull-right">
            <?php if($page['infobar_right']): ?>
              <?php print render($page['infobar_right']); ?>
            <?php endif; ?>
          </div>
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /#infobar -->
</div><!-- /#header -->

<div id="page-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="heading">
          <?php print render($title_prefix); ?>
          <?php if (!empty($title)): ?>
            <div class="title">
              <h1><?php print $title; ?></h1>
            </div>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <!-- /.title -->
        </div>
        <!-- /.heading -->
      </div>
      <!-- /.col-md-8 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>

<?php if (!empty($page['highlighted'])): ?>
  <div id="highlighted-wrapper">
    <div id="highlighted">

      <?php print render($page['highlighted']); ?>

    </div>
    <!-- /#highlighted -->
  </div><!-- /#highlighted-wrapper -->
<?php endif; ?>



<?php if($messages): ?>
  <div id="messages" class="section gray-light">
    <div class="container">
      <div class="col-md-12">
        <?php print $messages; ?>
      </div><!-- /.col-md-12 -->
    </div><!-- /.container -->
  </div><!-- /#messages -->
<?php endif; ?>


<?php if(!empty($page['featured'])): ?>
  <div class="section gray-light">
    <div id="featured">
      <div class="container">
        <div class="col-md-12">
          <div class="row">
            <?php print render($page['featured']); ?>
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /#featured -->
  </div><!-- /.section -->
<?php endif; ?>

<?php if(!empty($page['content_top'])): ?>
  <div class="section white">
    <div id="content-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php print render($page['content_top']); ?>
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section -->
  </div>
<?php endif; ?>


<div id="content-triptych" class="section gray-light">
  <div class="container">
    <div class="row">
      <?php if(!empty($page['content_triptych_first'])): ?>
        <div id="content-triptych-first" class="col-xs-12 col-sm-4 col-md-4">
          <?php print render($page['content_triptych_first']); ?>
        </div><!-- /#content-triptych-first -->
      <?php endif ;?>

      <?php if(!empty($page['content_triptych_second'])): ?>
        <div id="content-triptych-second" class="col-xs-12 col-sm-4 col-md-4">
          <?php print render($page['content_triptych_second']); ?>
        </div><!-- /#content-triptych-second -->
      <?php endif ;?>

      <?php if(!empty($page['content_triptych_third'])): ?>
        <div id="content-triptych-third" class="col-xs-12 col-sm-4 col-md-4">
          <?php print render($page['content_triptych_third']); ?>
        </div><!-- /#content-triptych-third -->
      <?php endif ;?>
    </div> <!-- /.row -->
  </div><!-- /.container -->
</div> <!-- /#content-triptych -->


<div class="section gray-light">
  <div class="main-container container">


    <div class="row">
      <?php if (!empty($page['sidebar_first'])): ?>
        <aside class="col-md-3" role="complementary">
          <?php print render($page['sidebar_first']); ?>
        </aside>  <!-- /#sidebar-first -->
      <?php endif; ?>

      <section<?php print str_replace('sm', 'md', $content_column_class); ?>>
        <a id="main-content"></a>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
      </section>

      <?php if (!empty($page['sidebar_second'])): ?>
        <aside class="col-md-3" role="complementary">
          <?php print render($page['sidebar_second']); ?>
        </aside>  <!-- /#sidebar-second -->
      <?php endif; ?>

    </div>
  </div>
</div>


<?php if(!empty($page['content_bottom'])): ?>
  <div class="section gray-light">
    <div id="content-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php print render($page['content_bottom']); ?>
          </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /#content-bottom-->
  </div><!-- /.section -->
<?php endif; ?>



<footer id="footer">
  <div class="container">
    <div class="row">
      <?php if(!empty($page['footer_triptych_first'])): ?>
        <div id="footer-triptych-first" class="col-xs-12 col-sm-4 col-md-4">
          <?php print render($page['footer_triptych_first']); ?>
        </div><!-- /#footer-triptych-first -->
      <?php endif ;?>

      <?php if(!empty($page['footer_triptych_second'])): ?>
        <div id="footer-triptych-second" class="col-xs-12 col-sm-4 col-md-4">
          <?php print render($page['footer_triptych_second']); ?>
        </div><!-- /#footer-triptych-second -->
      <?php endif ;?>

      <?php if(!empty($page['footer_triptych_third'])): ?>
        <div id="footer-triptych-third" class="col-xs-12 col-sm-4 col-md-4">
          <?php print render($page['footer_triptych_third']); ?>
        </div><!-- /#footer-triptych-third -->
      <?php endif ;?>
    </div> <!-- /.row -->
  </div><!-- /.container -->
</footer> <!-- /#footer -->


<div id="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if(!empty($page['footer_bottom_left'])): ?>
          <div class="footer-bottom-left" id="pull-left">
            <?php print render($page['footer_bottom_right']); ?>
          </div><!-- /#footer-bottom-left -->
        <?php endif; ?>

        <?php if(!empty($page['footer_bottom_right'])): ?>
          <div class="footer-bottom-right" id="pull-right">
            <?php print render($page['footer_bottom_right']); ?>
          </div><!-- /#footer-bottom-right -->
        <?php endif; ?>
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /#footer-bottom -->

</div>
</div> <!-- /#page, /#page-wrapper -->
