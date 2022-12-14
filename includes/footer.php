<div class="bg-info p-3 text-center">
    <p>All right reserved &#169- Designed by Rajshree Roy</p>
</div>
  <!-- alertifyJS -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
    <?php if(isset($_SESSION['message'])){?>
     alertify.set('notifier','position', 'top-center');
 alertify.success('<?= $_SESSION['message']; ?>');
  </script>
  <?php
unset($_SESSION['message']);
}
?>
  <!-- alertifyJS -->
