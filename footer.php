
</main><!-- main end -->

<?php wp_footer(); ?>

<?php
// Mobile Header
get_template_part("layout/base/footer");
?>

<?php
$google_analytics = get_field('google_analytics', 'options');
?>

<?php if($google_analytics && $google_analytics != "") : ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $google_analytics ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?= $google_analytics ?>');
</script>
<?php endif; ?>

</body>
</html>