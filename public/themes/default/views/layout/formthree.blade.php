<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 footer-sticky navbar-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 footer-sticky navbar-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 footer-sticky navbar-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie footer-sticky navbar-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="footer-sticky navbar-sticky"><!-- <![endif]-->
<head>
    <title>{{ Config::get('site.name') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <!--
    **********************************************************
    In development, use the LESS files and the less.js compiler
    instead of the minified CSS loaded by default.
    **********************************************************
    {{--
    <link rel="stylesheet" href="{{ URL::to('coral') }}/assets/css/admin/module.admin.stylesheet-complete.layout_fixed.true.min.css" />
    --}}
    -->
    <link rel="stylesheet/less" href="{{ URL::to('coral') }}/assets/less/admin/module.admin.stylesheet-complete.layout_fixed.true.less" />

    <link rel="stylesheet" href="{{  URL::to('/') }}/css/typography.css">
    {{ HTML::style('css/jquery.tagsinput.css') }}

        <!--[if lt IE 9]><link rel="stylesheet" href="{{ URL::to('coral') }}/assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ URL::to('coral')}}/assets/components/library/jquery/jquery.min.js?v=v1.9.6&sv=v0.0.1"></script>
    <script src="{{ URL::to('coral')}}/assets/components/library/jquery/jquery-migrate.min.js?v=v1.9.6&sv=v0.0.1"></script>
    <script src="{{ URL::to('coral')}}/assets/components/library/modernizr/modernizr.js?v=v1.9.6&sv=v0.0.1"></script>
    <script src="{{ URL::to('coral')}}/assets/components/plugins/less-js/less.min.js?v=v1.9.6&sv=v0.0.1"></script>
    <script src="{{ URL::to('coral')}}/assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.9.6&sv=v0.0.1"></script>
    <script src="{{ URL::to('coral')}}/assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.9.6&sv=v0.0.1"></script>
    <script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>

    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>

    <script type="text/javascript">
        var base = '{{ URL::to('/') }}/';
    </script>

</head>
<body class=" menu-right-hidden">

    <!-- Main Container Fluid -->
    <div class="container-fluid menu-hidden">

        <!-- Content -->
        <div id="content">


        <div class="navbar hidden-print main navbar-default" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a id="logo" href="{{ URL::to('/')}}" class="animated fadeInDown pull-left"><b class="fa fa-3x fa-bar-chart-o"></b></a>
            </div>

            <div class="navbar-collapse collapse">

                @include('partials.topnav')

                <div class="user-action visible-xs user-action-btn-navbar pull-right">
                    <button class="btn btn-sm btn-navbar-right btn-primary btn-stroke"><i class="fa fa-fw fa-arrow-right"></i><span class="menu-left-hidden-xs"> Modules</span></button>
                </div>

                <div class="col-md-3 visible-md visible-lg pull-right padding-none">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" placeholder="Search stories ...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div><!-- /input-group -->
                </div>

                <div class="user-action pull-right menu-right-hidden-xs menu-left-hidden-xs hidden-xs">
                    <div class="dropdown dropdown-icons padding-none">
                        <a data-toggle="dropdown" href="#" class="btn btn-primary btn-circle dropdown-toggle"><i class="fa fa-user"></i> </a>
                        <ul class="dropdown-menu">
                            <li data-toggle="tooltip" data-title="Photo Gallery" data-placement="left" data-container="body"><a href="gallery_photo.html?lang=en"><i class="fa fa-camera"></i></a></li>
                            <li data-toggle="tooltip" data-title="Tasks" data-placement="left" data-container="body"><a href="tasks.html?lang=en"><i class="fa fa-code-fork"></i></a></li>
                            <li data-toggle="tooltip" data-title="Employees" data-placement="left" data-container="body"><a href="employees.html?lang=en"><i class="fa fa-group"></i></a></li>
                            <li data-toggle="tooltip" data-title="Contacts" data-placement="left" data-container="body"><a href="contacts_2.html?lang=en"><i class="fa fa-phone-square"></i></a></li>
                        </ul>
                    </div>
                </div>

                <ul class="notifications pull-right hidden-xs">
                    <li class="dropdown notif">
                        <a href="" class="dropdown-toggle"  data-toggle="dropdown"><i class="notif-block fa fa-comments-o"></i><span class="badge badge-primary">7</span></a>
                        <ul class="dropdown-menu chat media-list">
                            <li class="media">
                                <a class="pull-left" href="#"><img class="media-object thumb" src="{{ URL::to('coral')}}/assets/images/people/100/15.jpg" alt="50x50" width="50"/></a>
                                <div class="media-body">
                                    <span class="label label-default pull-right">5 min</span>
                                    <h5 class="media-heading">Adrian D.</h5>
                                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="#"><img class="media-object thumb" src="{{ URL::to('coral')}}/assets/images/people/100/16.jpg" alt="50x50" width="50"/></a>
                                <div class="media-body">
                                    <span class="label label-default pull-right">2 days</span>
                                    <h5 class="media-heading">Jane B.</h5>
                                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </li>
                            <li class="media">
                                <a class="pull-left" href="#"><img class="media-object thumb" src="{{ URL::to('coral')}}/assets/images/people/100/17.jpg" alt="50x50" width="50"/></a>
                                <div class="media-body">
                                    <span class="label label-default pull-right">3 days</span>
                                    <h5 class="media-heading">Andrew M.</h5>
                                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </li>
                            <li><a href="#" class="btn btn-primary"><i class="fa fa-list"></i> <span>View all messages</span></a></li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
</div>
<!-- // END navbar -->

            <div class="layout-app">

                    <div class="container-fluid">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12">
                                <h4><a href="{{ URL::to($back)}}"><i class="fa fa-arrow-left"></i></a> {{ $title }}</h4>

                                {{ Breadcrumbs::render() }}
                            </div>
                        </div>

                        <div class="col-separator-h"></div>

                        <!-- row -->
                            {{Former::open_for_files_horizontal($submit,'POST',array('class'=>'custom'))}}


                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-4">

                                        <!-- Widget -->
                                        <div class="widget widget-inverse" >

                                            <!-- Widget heading -->
                                            <div class="widget-head" style="height:45px;padding:4px;text-align:right;">
                                                {{ HTML::link($back,'Cancel',array('class'=>'btn btn-info'))}}&nbsp;&nbsp;
                                                {{ Form::submit('Save',array('class'=>'btn btn-primary'))}}
                                            </div>
                                            <!-- // Widget heading END -->

                                            <div class="widget-body">
                                                @yield('left')
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <!-- Widget -->
                                        <div class="widget widget-inverse" >

                                            <!-- Widget heading -->
                                            {{--
                                            <div class="widget-head">
                                                <h4 class="heading">Default Inputs</h4>
                                            </div>
                                            --}}
                                            <!-- // Widget heading END -->

                                            <div class="widget-body">
                                                @yield('middle')
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <!-- Widget -->
                                        <div class="widget widget-inverse" >

                                            <!-- Widget heading -->
                                            {{--
                                            <div class="widget-head">
                                                <h4 class="heading">Default Inputs</h4>
                                            </div>
                                            --}}
                                            <!-- // Widget heading END -->

                                            <div class="widget-body">
                                                @yield('right')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            {{Former::close()}}

                            @yield('aux')
                        <!-- // END row -->

                    </div>
                    <!-- // END col-app -->

                </div>
                <!-- // END col-table-row -->

            </div>
            <!-- // END col-table -->

        </div>
        <!-- // END col-separator -->

    </div>
    <!-- // END col -->

</div>
<!-- // END row-app -->




        </div>
        </div>
        </div>
        <!-- // Content END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->

                <!-- Footer -->
        <div id="footer" class="hidden-print">
            <div class="copy">&copy; 2012 - 2014 - {{ Config::get('site.name') }} - All Rights Reserved.</div>
            <!--  End Copyright Line -->
        </div>
        <!-- // Footer END -->


    </div>
    <!-- // Main Container Fluid END -->

    <!-- Global -->
    <script data-id="App.Config">
    var basePath = '',
        commonPath = '../assets/',
        rootPath = '../',
        DEV = false,
        componentsPath = '../assets/components/',
        layoutApp = false,
        module = 'admin';

    var primaryColor = '#eb6a5a',
        dangerColor = '#b55151',
        successColor = '#609450',
        infoColor = '#4a8bc2',
        warningColor = '#ab7a4b',
        inverseColor = '#45484d';

    var themerPrimaryColor = primaryColor;
    </script>

    <script src="{{ URL::to('coral')}}/assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral')}}/assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral')}}/assets/components/plugins/breakpoints/breakpoints.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral')}}/assets/components/plugins/preload/pace/pace.min.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral')}}/assets/components/core/js/preload.pace.init.js?v=v1.9.6"></script>
<script src="{{ URL::to('coral')}}/assets/components/common/gallery/blueimp-gallery/assets/lib/js/blueimp-gallery.min.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral')}}/assets/components/common/gallery/blueimp-gallery/assets/lib/js/jquery.blueimp-gallery.min.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral')}}/assets/components/plugins/image-preview/image-preview.js?v=v1.9.6&sv=v0.0.1"></script>

<!-- graphs -->
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.resize.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/flot/assets/lib/plugins/jquery.flot.tooltip.min.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/flot/assets/custom/js/flotcharts.common.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-line-2.init.js?v=v1.9.6"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-bars-horizontal.init.js?v=v1.9.6"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-mixed-1.init.js?v=v1.9.6"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/easy-pie/assets/lib/js/jquery.easy-pie-chart.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/easy-pie/assets/custom/easy-pie.init.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/sparkline/jquery.sparkline.min.js?v=v1.9.6&sv=v0.0.1"></script>
<script src="{{ URL::to('coral') }}/assets/components/modules/admin/charts/sparkline/sparkline.init.js?v=v1.9.6&sv=v0.0.1"></script>


<script src="{{ URL::to('coral')}}/assets/components/core/js/core.init.js?v=v1.9.6"></script>
<script src="{{ URL::to('coral')}}/assets/components/core/js/animations.init.js?v=v1.9.6"></script>

    @include('layout.js')


</body>
</html>