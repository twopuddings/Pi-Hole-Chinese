<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";

$list = $_GET['l'];

if($list !== "white" && $list !== "black"){
    echo "Invalid list parameter";
    require "scripts/pi-hole/php/footer.php";
    die();
}

function getFullName() {
    global $list;
    if($list == "white")
        echo "Whitelist";
    else
        echo "Blacklist";
}
?>
<!-- Send list type to JS -->
<div id="list-type" hidden><?php echo $list ?></div>

<!-- Title -->
<div class="page-header">
    <h1><?php getFullName(); ?></h1>
</div>

<!-- Domain Input -->
<div class="form-group input-group">
    <input id="domain" type="text" class="form-control" placeholder="Add a domain (example.com or sub.example.com)">
    <span class="input-group-btn">
    <?php if($list === "black") { ?>
        <button id="btnAdd" class="btn btn-default" type="button">添加 (精确)</button>
        <button id="btnAddWildcard" class="btn btn-default" type="button">添加 (通配符)</button>
        <button id="btnAddRegex" class="btn btn-default" type="button">添加 (正则表达式)</button>
    <?php }else{ ?>
        <button id="btnAdd" class="btn btn-default" type="button">添加</button>
    <?php } ?>
        <button id="btnRefresh" class="btn btn-default" type="button"><i class="fa fa-sync"></i></button>
    </span>
</div>

<!-- Alerts -->
<div id="alInfo" class="alert alert-info alert-dismissible fade in" role="alert" hidden="true">
    <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    添加到 <?php getFullName(); ?>...
</div>
<div id="alSuccess" class="alert alert-success alert-dismissible fade in" role="alert" hidden="true">
    <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    成功! 列表将会刷新.
</div>
<div id="alFailure" class="alert alert-danger alert-dismissible fade in" role="alert" hidden="true">
    <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    失败! 哪里出错了, 请检查:<br/><br/><pre><span id="err"></span></pre>
</div>
<div id="alWarning" class="alert alert-warning alert-dismissible fade in" role="alert" hidden="true">
    <button type="button" class="close" data-hide="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    至少有一个域已经存在，请参阅下面的输出:<br/><br/><pre><span id="warn"></span></pre>
</div>


<!-- Domain List -->
<?php if($list === "black") { ?>
<h3>精确拦截</h3>
<?php } ?>
<ul class="list-group" id="list"></ul>
<?php if($list === "black") { ?>
<h3><a href="https://docs.pi-hole.net/ftldns/regex/overview/" target="_blank" title="Click for Pi-hole Regex documentation">正则表达式</a> &amp; 通配符拦截</h3>
<ul class="list-group" id="list-regex"></ul>
<?php } ?>

<script src="scripts/pi-hole/js/list.js"></script>

<?php
require "scripts/pi-hole/php/footer.php";
?>
