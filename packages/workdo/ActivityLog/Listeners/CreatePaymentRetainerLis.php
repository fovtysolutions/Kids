<?php

namespace Modules\ActivityLog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Modules\ActivityLog\Entities\AllActivityLog;
use Modules\Retainer\Entities\Retainer;

class CreatePaymentRetainerLis
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
    public function handle($event)
    {
        if (module_is_active('ActivityLog')) {
            $retainer = $event->retainer;

            $activity                   = new AllActivityLog();
            $activity['module']         = 'Retainer';
            $activity['sub_module']     = '--';
            $activity['description']    = __('New Payment Add in retainer ') . Retainer::retainerNumberFormat($retainer->retainer_id) . __(' by the ');
            $activity['user_id']        =  Auth::user()->id;
            $activity['url']            = '';
            $activity['workspace']      = $retainer->workspace;
            $activity['created_by']     = $retainer->created_by;
            $activity->save();
        }
    }
}
