<?php
namespace App\Backend\Modules\Deconnexion;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class DeconnexionController extends BackController
{
    public function executeLogout ()
    {
        $this->app->user()->setAuthenticated(false);
        $this->app->httpResponse()->redirect('.');
    }

}

