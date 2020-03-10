<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";

// Generate CSRF token
if(empty($_SESSION['token'])) {
    $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
$token = $_SESSION['token'];

?>
<!-- Send PHP info to JS -->
<div id="token" hidden><?php echo $token ?></div>

<!-- Title -->
<div class="page-header">
    <h1>指定要从Pi-hole查询数据库查询的日期范围</h1>
</div>


<div class="row">
    <div class="col-md-12">
<!-- Date Input -->
      <div class="form-group">
        <label>日期及时间范围:</label>

        <div class="input-group">
          <div class="input-group-addon">
            <i class="far fa-clock"></i>
          </div>
          <input type="text" class="form-control pull-right" id="querytime" value="Click to select date and time range">
        </div>
        <!-- /.input group -->
      </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label>Query status:</label>
    </div>
    <div class="form-group">
        <div class="col-md-2">
            <div class="checkbox">
                <label><input type="checkbox" id="type_gravity" checked>拦截 (精确)</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="checkbox">
                <label><input type="checkbox" id="type_forwarded" checked>成功 (已转发)</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="checkbox">
                <label><input type="checkbox" id="type_cached" checked>成功 (已缓存)</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="checkbox">
                <label><input type="checkbox" id="type_regex" checked>拦截 (正则表达式/通配符)</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="checkbox">
                <label><input type="checkbox" id="type_blacklist" checked>拦截 (黑名单)</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="checkbox">
                <label><input type="checkbox" id="type_external" checked>拦截 (外部)</label>
            </div>
        </div>
    </div>
</div>

<div id="timeoutWarning" class="alert alert-warning alert-dismissible fade in" role="alert" hidden="true">
    根据你指定的范围大小，当Pi-hole试图检索所有数据时，请求可能超时.<br/><span id="err"></span>
</div>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 class="statistic" id="ads_blocked_exact">---</h3>
                <p>拦截查询</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-hand"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 class="statistic" id="ads_wildcard_blocked">---</h3>
                <p>拦截查询 (通配符)</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-hand"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3 class="statistic" id="dns_queries">---</h3>
                <p>查询总数</p>
            </div>
            <div class="icon">
                <i class="ion ion-earth"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3 class="statistic" id="ads_percentage_today">---</h3>
                <p>拦截查询</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-md-12">
      <div class="box" id="recent-queries">
        <div class="box-header with-border">
          <h3 class="box-title">最近查询</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="all-queries" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>时间</th>
                        <th>类型</th>
                        <th>域名</th>
                        <th>用户</th>
                        <th>状态</th>
                        <th>活动</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>时间</th>
                        <th>类型</th>
                        <th>域名</th>
                        <th>用户</th>
                        <th>状态</th>
                        <th>活动</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
<!-- /.row -->

<script src="scripts/vendor/moment.min.js"></script>
<script src="scripts/vendor/daterangepicker.js"></script>
<script src="scripts/pi-hole/js/db_queries.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>
