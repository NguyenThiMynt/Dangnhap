<?php
//nếu đăng nhập rồi mới cho hiển thị
if (isset($_SESSION['admin'])): ?>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13-pre
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
</footer>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

<!-- ./wrapper -->
<?php endif; ?>
<!-- jQuery 3 -->
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script type="text/javascript"
        src="{{ asset('backend/ckeditor/ckeditor.js') }}">

</script>
<script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>