<?php

namespace Modules\Retainer\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Retainer\Entities\RetainerUtility;
use App\Events\DefaultData;

class DataDefault
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DefaultData $event)
    {   
        $company_id = $event->company_id;
        $workspace_id = $event->workspace_id;
        $user_module = $event->user_module;
        if(!empty($user_module))
        {
            if (in_array("Retainer", $user_module))
            {
                RetainerUtility::defaultdata($company_id,$workspace_id);
            }
        }
    }
}