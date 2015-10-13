@extends('layouts.master')

@section('content')

    <script>
        $(document).ready(function () {
            $.getScript("/js/commands/general.js")
                    .done(function (script, textStatus) {
                        $('#commandLine').val("Awaiting command");
                    })
                    .fail(function (jqxhr, settings, exception) {
                        $('#commandLine').val("Error loading");
                    });
            $('#commandLine').keypress(function (e) {
                if (e.which == 13) {
                    var input = $('#commandLine').val();
                    var complete = commandInput(input);
                    $("#output").prepend(complete);
                    this.select();
                }
            });
        });
    </script>

    <div id="div-loading">
        <!-- <img id="img-loading" src="img/loading/loading-medium1.png" /> -->
        <object width="500" height="500" data="swf/loader.swf">
            <param name="wmode" value="transparent"/>
            <param name="quality" value="best"/>
            <param name="scale" value="exactfit"/>
        </object>
    </div>

    <div id="div-loading-gray" class="fill-space">
    </div>

    <table style="width: 100%; height: 100%;">
        <tr>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-left.png"/>
            </td>
            <td class="td-input-middle">
                <input id="commandLine" type="text" class="font-text input-matrix caps type" spellcheck="false" autocomplete="off"/>
            </td>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-right.png"/>
            </td>
        </tr>
        <tr>
            <td />
            <td>
                <div class="field-outer">
                    <div class="field-inner">
                        <table id="output" style="width: 100%;">
                            <!-- Commands and Output -->
                        </table>
                    </div>
                </div>
            </td>
            <td />
        </tr>
    </table>

@endsection
