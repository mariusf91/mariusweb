<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class CrappyBird extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    protected $fillable = array('user_id', 'score', 'map_of_death');

    protected $table = 'crappybird';

}
