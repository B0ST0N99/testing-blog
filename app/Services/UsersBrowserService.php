<?php


namespace App\Services;


class UsersBrowserService
{
    public function getAllBrowser()
    {
        $browsers =\Cache::get('browsers');
        $browsers_view = [];
        foreach ($browsers as $browser => $browser_items){
            $browsers_view[$browser] = count($browser_items);
        }

        return $browsers_view;
    }
}
