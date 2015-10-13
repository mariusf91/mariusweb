@extends('layouts.master')

@section('content')



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

    {{ Form::open(array('url' => 'users/create')) }}
    <?php
    if(isset($from)){
        echo "<input type='hidden' name='from' value=$from />";
    }
    ?>
    <table style="width: 100%">
        <tr style="height: 20px;">
            <td colspan="3"/>
        </tr>
        <tr>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-left.png"/>
            </td>
            <td class="td-input-middle">
                {{ Form::text('username', null, array('class' => 'font-text input-matrix caps type', 'spellcheck' => 'false', 'autocomplete' => 'off', 'maxlength' => '15')) }}
                <img src="/img/labels/label-enter-username.png" class="label-input"/>
            </td>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-right.png"/>
            </td>
        </tr>
        <tr style="height: 40px;">
            <td colspan="3"/>
        </tr>
        <tr>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-left.png"/>
            </td>
            <td class="td-input-middle">
                {{ Form::password('password', array('class' => 'font-text input-matrix type')) }}
                <img src="/img/labels/label-enter-password.png" class="label-input"/>
            </td>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-right.png"/>
            </td>
        </tr>
        <tr style="height: 40px;">
            <td colspan="3"/>
        </tr>
        <tr>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-left.png"/>
            </td>
            <td class="td-input-middle">
                {{ Form::password('password2', array('class' => 'font-text input-matrix type')) }}
                <img src="/img/labels/label-re-enter-password.png" class="label-input"/>
            </td>
            <td class="td-input-side">
                <img src="img/input/input-matrix-bg-right.png"/>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                {{ Form::submit('', array('id' => 'btn-register', 'class' => 'btn-register btn-page-login')) }}
            </td>
            <td>

            </td>
        </tr>
    </table>
    {{ Form::close() }}

@endsection
