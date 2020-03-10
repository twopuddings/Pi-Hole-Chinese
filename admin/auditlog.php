<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>
<!-- Send PHP info to JS -->
<div id="token" hidden><?php echo $token ?></div>
<!-- Title -->
<div class="page-header">
    <h1>审计日志 (显示实时数据)</h1>
</div>

<div class="row">
    <div class="col-md-6">
      <div class="box" id="domain-frequency">
        <div class="box-header with-border">
          <h3 class="box-title">允许查询</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                    <th>域名</th>
                    <th>命中</th>
                    <th>活动</th>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
        <div class="overlay">
          <i class="fa fa-sync fa-spin"></i>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6">
      <div class="box" id="ad-frequency">
        <div class="box-header with-border">
          <h3 class="box-title">拦截查询</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                    <th>域名</th>
                    <th>命中</th>
                    <th>活动</th>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
        <div class="overlay">
          <i class="fa fa-sync fa-spin"></i>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-12">
        <p><strong>重要:</strong> 注意！黑白名单不会自动应用以避免频繁重启DNS服务. 取而代之, 点击这个按钮, 使新设置生效:</p>

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<button class="btn btn-lg btn-primary btn-block" id="gravityBtn" disabled="true">更新黑白名单</button>

<script src="scripts/pi-hole/js/auditlog.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
