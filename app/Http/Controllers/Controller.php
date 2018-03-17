<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use MetaTag;
/*
class Controller extends BaseController
{
}
*/
abstract class Controller extends BaseController 
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//    use DispatchesCommands, ValidatesRequests;

    public function __construct()
    {
        // Defaults
        MetaTag::set('description', 'Blog Wes Anderson bicycle rights, occupy Shoreditch gentrify keffiyeh.');
        MetaTag::set('image', asset('image/geu_jogja.jpg'));
    }
}
