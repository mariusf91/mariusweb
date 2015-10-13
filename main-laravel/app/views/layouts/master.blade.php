<header>
    <!--jQuery-->
    {{ HTML::style('effects/jquery/jquery-ui.css') }}
    {{ HTML::script('effects/jquery/external/jquery/jquery.js') }}
    {{ HTML::script('effects/jquery/jquery-ui.js') }}

    <!--Sweet Alert-->
    {{ HTML::script('effects/sweetalert/dist/sweetalert.min.js') }}
    {{ HTML::style('effects/sweetalert/dist/sweetalert.css') }}

    <!--CSS-->
    {{ HTML::style('css/master.css') }}
    {{ HTML::style('css/inputs.css') }}
    {{ HTML::style('css/areas.css') }}

    <!--JavaScript-->
    {{ HTML::script('js/views/master.js') }}
    {{ HTML::script('js/views/type.js') }}
    {{ HTML::script('js/views/app-url.js') }}

</header>
<body style="background-color: black;">


@if(Session::get('message'))
    <script type="text/javascript">
        $(document).ready(function(){
            displayAlert("Success!", "<?php echo Session::get('message');?>", "3000", "success");
        });
    </script>
@endif
@if($errors->has())
    <?php
        $timer = 1000 * count($errors) + 2000;
        $message = "";
    ?>
    @foreach($errors->all() as $error)
        <?php
                $message = $message . $error . "\\n";
        ?>
    @endforeach
    <script type="text/javascript">
        $(document).ready(function(){
            displayAlert("Error!", "<?php echo $message . '", "' . $timer;?>", "error");
        });
    </script>
@endif


<div id="bg-object-container">
    <object id="bg-object" data="swf/matrix-city-bg.swf">
        <param name="quality" value="best"/>
        <param name="scale" value="exactfit"/>
        <param name="wmode" value="transparent">
    </object>
</div>

<table class="fill-space">
    <tr>
        <td width="25%">

        </td>
        <td width="50%" valign="top">
            <div style="width: 100%; height:100px;">
                <!--Menu content-->
            </div>
            <div style="overflow: hidden;">
                @yield('content')
            </div>
        </td>
        <td width="25%">

        </td>
    </tr>
</table>
</body>