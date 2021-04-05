<?php

use munkireport\models\MRModel as Eloquent;

class Bluesky_model extends Eloquent
{
    protected $table = 'bluesky';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number',
      'version',

    ];
}
