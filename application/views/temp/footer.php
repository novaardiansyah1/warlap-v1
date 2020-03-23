    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer bg-indigo text-white text-center">
    Copyright &copy; <?= date('Y') ?> <strong>
      <a href="<?= site_url() ?>" class="text-white" id="base_url">Warlap</a>.</strong>
    All rights reserved.
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Sweetalert -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<!-- Moment -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<!-- TempusDominus -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- All -->
<script src="<?= base_url('assets/owner/js/all.js?v='.time()) ?>"></script>
<!-- My Script -->
<?php if(isset($script)) : ?>
<script src="<?= base_url('assets/owner/js/'.$script.'?v='.time()) ?>"></script>
<?php endif; ?>

</body>
</html>