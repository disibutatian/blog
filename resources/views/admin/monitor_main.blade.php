<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>项目监控 | 监控总览</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.useso.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ URL::asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ URL::asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ URL::asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ URL::asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/main">
                <img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" />
                        <span class="username username-hide-on-mobile"> Nick </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="page_user_lock_1.html">
                                <i class="icon-lock"></i> Lock Screen </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="page_user_login_1.html">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper hide">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!--todo 菜单 -->
                <li class="nav-item start open active">
                    <a href="/main" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">监控总览</span>
                    </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">详情分析</h3>
                </li>
                <li class="nav-item  ">
                    <a href="/port" class="nav-link nav-toggle">
                        <i class="fa fa-plug"></i>
                        <span class="title">接口监控</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="/room" class="nav-link nav-toggle">
                        <i class="icon-puzzle"></i>
                        <span class="title">机房监控</span>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a href="server" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">服务器监控</span>
                    </a>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler"> </div>
                <div class="toggler-close"> </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                        </ul>
                    </div>
                    <div class="theme-option">
                        <span> Theme Style </span>
                        <select class="layout-style-option form-control input-sm">
                            <option value="square" selected="selected">Square corners</option>
                            <option value="rounded">Rounded corners</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <!--todo 导航 -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="/main">监控总览</a>
                        <i class="fa fa-circle"></i>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <div class="actions">
                        <div class="btn-group">
                            <a class="btn green btn-outline " href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-tv"></i>
                                <span class="hidden-xs" id="projectPanel" data-value="1">选择项目：手机卫士</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right panel-info select-panel">
                                <li>
                                    <a href="javascript:;" data-for="projectPanel" data-value="1">手机卫士</a></li>
                                 <li><a href="javascript:;" data-for="projectPanel" data-value="2">手机助手</a></li>
                                 <li><a href="javascript:;" data-for="projectPanel" data-value="3">花椒直播</a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn red btn-outline" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-clock-o"></i>
                                <span class="hidden-xs" id="timespanPanel" data-value="30">时间区间：近30分钟</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right panel-info select-panel">
                                <li>
                                    <a href="javascript:;" data-for="timespanPanel" data-value="30"> 近30分钟 </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-for="timespanPanel" data-value="60"> 近1小时 </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-for="timespanPanel" data-value="360"> 近6小时 </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-for="timespanPanel" data-value="720"> 近12小时 </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-for="timespanPanel" data-value="1440"> 近24小时 </a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!--todo 内容 -->
            <div class="page-header">
                <h1><strong id="proName">手机卫士</strong>  <strong class="text-danger">（整体评分：<span id="scoreNum"></span>分）</strong></h1>
            </div>
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- Begin: life time stats -->
                    <!-- Begin: 折线图 -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-body">
                                    <div id="echartContainer" style="height:400px;width:100%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Begin: 折线图 -->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-body">
                                    <div id="errorCharts" style="height:400px;width:100%;"></div>
                                </div>
                            </div>
                            <!-- End: 折线图 -->
                        </div>
                    </div>

                    <!-- End: 折线图 -->

                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">所有接口概况</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-container">
                                <table class="table table-striped table-bordered table-hover" id="table_port">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th > 接口名称 </th>
                                        <th > 所在机房 </th>
                                        <th > 所在服务器 </th>
                                        <th > 平均连接时间(ms) </th>
                                        <th > 平均处理时间(ms) </th>
                                        <th > 平均页面大小 </th>
                                        <th > 响应次数 </th>
                                        <th > 错误率 </th>
                                        <th > 综合评分</th>
                                    </tr>
                                    </thead>
                                    <tbody> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">所有服务器概况</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-container">
                                <table class="table table-striped table-bordered table-hover" id="table_server">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th > 服务器名称 </th>
                                        <th > 所在机房 </th>
                                        <th > 平均连接时间(ms) </th>
                                        <th > 平均处理时间(ms) </th>
                                        <th > 平均页面大小 </th>
                                        <th > 响应次数 </th>
                                        <th > 错误率 </th>
                                        <th > 综合评分</th>
                                    </tr>
                                    </thead>
                                    <tbody> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">所有机房概况</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-container">
                                <table class="table table-striped table-bordered table-hover" id="table_room">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th > 机房名称 </th>
                                        <th > 平均连接时间(ms) </th>
                                        <th > 平均处理时间(ms) </th>
                                        <th > 平均页面大小 </th>
                                        <th > 响应次数 </th>
                                        <th > 错误率 </th>
                                        <th > 综合评分</th>
                                    </tr>
                                    </thead>
                                    <tbody> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End: life time stats -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2016 &copy; 蜗牛
         </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="{{ URL::asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ URL::asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ URL::asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--<script src="{{ URL::asset('assets/pages/scripts/table-datatables-ajax.js') }}" type="text/javascript"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ URL::asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/echarts.min.js') }}" type="text/javascript"></script>

<script>
    //加载datatable
    $(function(){
        var loadPage = function(){
            var project = $('#projectPanel').attr('data-value');
            var timespan = $('#timespanPanel').attr('data-value');
            loadLines(project,timespan);
            loadErrorLines(project,timespan);
            loadPorts(project,timespan);
            loadServers(project,timespan);
            loadRooms(project,timespan);
            getScore(project,timespan);
        };
        //绑定toggle点击事件。
        $('.select-panel').on('click','a',function(){
            var self = $(this);
            var panel =  $('#'+self.attr('data-for')).text().trim();
            var text =panel.slice(0,5);
            var now = panel.slice(5);
            var value = self.attr('data-value');
            if(now !== self.text().trim()){
                $('#'+self.attr('data-for')).html(text+self.text().trim()).attr('data-value',value);
                $('#proName').text($('#projectPanel').text().trim().slice(5));
                loadPage();
            }
        });

        function getScore(project,timespan){
            $.get('/getProjectScore',{'id_project':project,"timespan":timespan},function(d){
            $('#scoreNum').text(d);
            },'text')
        }
        var table_config = {
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "暂无数据",
                "info": "第 _START_ 到 _END_ 条，共 _TOTAL_ 条数据",
                "infoEmpty": "无记录",
                "infoFiltered": "(从  _MAX_ 条记录中过滤)",
                "lengthMenu": "每页 _MENU_ 条",
                "search": "搜索:",
                "zeroRecords": "没有符合要求的记录",
                "paginate": {
                    "previous":"上一页",
                    "next": "下一页",
                    "last": "尾页",
                    "first": "首页"
                }
            },
            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
            "paging":true,
            "ordering": true,
            "bFilter": false,
            "bAutoWidth":false,
            "bSearch":true,
//            "columnDefs": [ {
//                "targets": 0,
//                "orderable": false,
//                "searchable": false
//            }],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "全部"] // change per page values here
            ],
            "processing": true,
            "serverSide": true,
            // set the initial value
            "pageLength": 5,
            "pagingType": "bootstrap_full_number"
        };
        function loadLines(project,timespan){
            var myChart = echarts.init(document.getElementById("echartContainer"));
            myChart.showLoading();
            $.get('/getProjectAffairsInfo',{"id_project":project,"timespan":timespan},function(data){
                var option = {
                    title:{text:'Web事务',left:'left',top:'top'},
                    tooltip: {
                        trigger: 'axis'
                    },
                    grid: {
                        right: '0'
                    },
                    legend: {
                        data:['平均连接时间','平均处理时间','响应次数','平均文件大小']
                    },
                    xAxis: [
                        {
                            type: 'category',
                            axisTick: {
                                alignWithLabel: true
                            },
                            data: data.category
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value',
                            name: '平均连接时间',
                            position: 'left',
                            axisLabel: {
                                formatter: '{value} ms'
                            }
                        },
                        {
                            type: 'value',
                            name: '平均处理时间',
                            position: 'right',
                            offset: 80,
                            axisLabel: {
                                formatter: '{value} ms'
                            },
                            show:false
                        },
                        {
                            type: 'value',
                            name: '响应次数',
                            position: 'left',
                            axisLabel: {
                                formatter: '{value} 次'
                            },
                            show:false
                        },
                        {
                            type: 'value',
                            name: '平均文件大小',
                            position: 'left',
                            offset:60,
                            show:false,
                            axisLabel: {
                                formatter: '{value} k'
                            }
                        }
                    ],
                    series: [
                        {
                            name:'平均连接时间',
                            type:'line',
                            areaStyle: {
                                normal: {
                                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                                        offset: 0,
                                        color: '#ed6b75'
                                    }, {
                                        offset: 1,
                                        color: '#fff'
                                    }])
                                }
                            },
                            smooth:true,
                            data:data.link
                        },
                        {
                            name:'平均处理时间',
                            type:'line',
                            smooth:true,
                            yAxisIndex: 1,
                            data:data.process
                        },
                        {
                            name:'响应次数',
                            type:'line',
                            smooth:true,
                            yAxisIndex: 2,
                            data:data.response
                        }
                        ,
                        {
                            name:'平均文件大小',
                            type:'line',
                            smooth:true,
                            yAxisIndex: 2,
                            data:data.length
                        }
                    ]
                };
                myChart.hideLoading();
                myChart.setOption(option);
            },'json');
        }
        function loadErrorLines(project,timespan){
            var errorCharts = echarts.init(document.getElementById("errorCharts"));
            errorCharts.showLoading();
            $.get('/getErrorProb',{"id_project":project,"timespan":timespan},function(data){
                var option = {
                    tooltip: {
                        trigger: 'axis'
                    },
                    title:{text:'错误率',left:'left',top:'top'},
                    legend: {
                        data:['错误率']
                    },
                    xAxis: {
                        type: 'category',
                        data:data.category,
                        axisTick: {
                            alignWithLabel: true
                        }
                    },
                    yAxis: [
                        {
                            type: 'value',
                            splitLine: {
                                show: true
                            },
                            name:"错误率",
                            offset:-8
                        }
//                        ,
//                        {
//                            type: 'value',
//                            position: 'right',
//                            name:"总响应次数"
//                        }
                    ],
                    series: [{
                        name: '错误率',
                        type: 'line',
                        data: data.error,
                        smooth:true
                    }
//                        , {
//                        name: '总响应次数',
//                        type: 'line',
//                        data: data.total,
//                        smooth:true
//                    }
                    ]
                };
                errorCharts.hideLoading();
                errorCharts.setOption(option);
            },'json');

        }

        var port_table,server_table,room_table;
        function loadPorts(project,timespan){
            // begin first table
            if ($.fn.dataTable.isDataTable('#table_port')) {
                port_table.destroy();
            }
            port_table=$('#table_port').DataTable(
                    $.extend({
                        "ajax": {
                            "url": "/getInterfaceInfo",
                            "data": function ( d ) {
                                return $.extend( {}, d, {
                                    "id_project":project,
                                    "timespan":timespan
                                } );
                            }
                        },
                        "columns": [
                            { "data": "interface_name" },
                            { "data": "machine_room_name" },
                            { "data": "server_name" },
                            { "data": "ave_link_time" },
                            { "data": "ave_process_time" },
                            { "data": "ave_page_size" },
                            { "data": "response_times" },
                            { "data": "error_rate" },
                            { "data": "score" }
                        ],
                        "order": [
                            [8, "asc"]
                        ],// set first column as a default sort by asc
                        "columnDefs": [
                            {
                                "render": function ( data, type, row ) {
                                    return '<a href="/port?port='+row.interface_id+'&name='+data+'">'+data+'</a>';
                                },
                                "targets": 0
                            },{ targets: [6], orderable: false }
                        ]
                    },table_config));
        }
        function loadServers(project,timespan) {
            if ($.fn.dataTable.isDataTable('#table_server')) {
                server_table.destroy();
            }
            server_table=$('#table_server').DataTable(
                    $.extend({
                        "ajax": {
                            "url": "/getServerInfo",
                            "data": function ( d ) {
                                return $.extend( {}, d, {
                                    "id_project":project,
                                    "timespan":timespan
                                } );
                            }
                        },
                        "columns": [
                            { "data": "server_name" },
                            { "data": "machine_room_name" },
                            { "data": "ave_link_time" },
                            { "data": "ave_process_time" },
                            { "data": "ave_page_size" },
                            { "data": "response_times" },
                            { "data": "error_rate" },
                            { "data": "score" }
                        ],
                        "order": [
                            [7, "asc"]
                        ],// set first column as a default sort by asc
                        "columnDefs": [
                            {
                                "render": function ( data, type, row ) {
                                    return '<a href="/server?server='+row.server_id+'&name='+data+'">'+data+'</a>';
                                },
                                "targets": 0
                            },
                            {
                                "render": function ( data, type, row ) {
                                    return '<a href="/room?room='+row.machine_room_id+'&name='+data+'">'+data+'</a>';
                                },
                                "targets": 1
                            },{ targets: [5], orderable: false }
                        ]
                    },table_config));
        }
        function loadRooms(project,timespan) {
            if ($.fn.dataTable.isDataTable('#table_room')) {
                room_table.destroy();
            }
            room_table=$('#table_room').DataTable(
                $.extend({
                    "ajax": {
                        "url": "/getMachineRoomInfo",
                        "data": function ( d ) {
                            return $.extend( {}, d, {
                                "id_project":project,
                                "timespan":timespan
                            } );
                        }
                    },
                    "columns": [
                        { "data": "machine_room_name" },
                        { "data": "ave_link_time" },
                        { "data": "ave_process_time" },
                        { "data": "ave_page_size" },
                        { "data": "response_times" },
                        { "data": "error_rate" },
                        { "data": "score" }
                    ],
                    "order": [
                        [6, "asc"]
                    ],// set first column as a default sort by asc
                    "columnDefs": [
                        {
                            "render": function ( data, type, row ) {
                                return '<a href="/room?room='+row.machine_room_id+'&name='+data+'">'+data+'</a>';
                            },
                            "targets": 0
                        },{ targets: [4], orderable: false }
                    ]
                },table_config));

        }
        loadPage();
    });
</script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
