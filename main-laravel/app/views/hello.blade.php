@extends('layouts.master')



@section('content')
    <?php
            if(Auth::check()){
                $app_command = "img/apps/app-command.png";
            }else{
                $app_command = "img/apps/app-command-locked.png";
            }
            ?>
    <table style="width: 100%; height: 100%;">
        <tr>
            <td />
            <td height="50px">

            </td>
            <td />
        </tr>
        <tr>
            <td />
            <td>
                <div class="field-outer">
                    <div class="field-inner">
                        <table id="output" style="width: 100%;">
                            <!-- Apps -->
                            <tr>
                                <td>
                                    <div id="app-crappybird" class="app-div area-text-green" style="background-image: url('/img/apps/app-crappybird.png');">
                                        <p>
                                            A cheap, shitty version of the world famous <br />
                                            "Flappy Bird" game. Click on the screen to <br />
                                            jump, and avoid being hit by the various <br />
                                            obstacles. Register and login to qualify for <br />
                                            the highscore list, or just play as a guest.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="app-command" class="app-div area-text-green" style="background-image: url('<?php echo $app_command; ?>');">
                                        <p>
                                            A command prompt with various functions. <br />
                                            Use this tool to solve math equations, <br />
                                            get information about various currencies, <br />
                                            view informations from various databases, <br />
                                            and more.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="app-skydump-timed" class="app-div area-text-green" style="background-image: url('img/apps/app-skydump-timed.png');">
                                        <p>
                                            Click to take a dump from the sky, and <br />
                                            hit as many targets as possible within 1 <br />
                                            minute. An online score system is not yet <br />
                                            implemented, and your score will only be <br />
                                            available until you close the game.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="app-skydump-survival" class="app-div area-text-green" style="background-image: url('img/apps/app-skydump-survival.png');">
                                        <p>
                                            Click to take a dump from the sky, and <br />
                                            stop enemies from getting over to the <br />
                                            other side. An online score system is not <br />
                                            yet implemented, and your score will only <br />
                                            be available until you close the game.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
            <td />
        </tr>
    </table>

@endsection