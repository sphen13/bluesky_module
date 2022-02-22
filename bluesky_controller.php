<?php

/**
 * bluesky class
 *
 * @package munkireport
 * @author
 **/
class Bluesky_controller extends Module_controller
{
	  public function __construct()
    {
        // Store module path
        $this->module_path = dirname(__FILE__);
    }

    /**
    * Default method
    **/
    public function index()
    {
        echo "You've loaded the bluesky module!";
    }

    /**
    * Get bluesky information for serial_number
    *
    * @param string $serial serial number
    **/
    public function get_data($serial_number = '')
    {
        jsonView(
            Bluesky_model::select('bluesky.*')
            ->whereSerialNumber($serial_number)
            ->filter()
            ->limit(1)
            ->first()
            ->toArray()
        );
    }

    public function get_list($column = '')
    {
        jsonView(
            Bluesky_model::select("bluesky.$column AS label")
                ->selectRaw('count(*) AS count')
                ->filter()
                ->groupBy($column)
                ->orderBy('count', 'desc')
                ->get()
                ->toArray()
        );
    }

    /**
    * Get  stats
    *
    * @return void
    * @author
    **/
    public function get_stats($hours = 24)
    {
       $timestamp = time() - 60 * 60 * (int) (24 * 7);
        $now = time();
        $today = $now - 3600 * 24;
        $week_ago = $now - 3600 * 24 * 7;
        $month_ago = $now - 3600 * 24 * 30;
       jsonView(
               Bluesky_model::selectRaw("sum(version > 0) AS total")
            	->filter()
            	->first()
            	->toLabelcount()
       );
    }
}
