<?php

namespace Modules\ActivityLog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Modules\ActivityLog\Entities\AllActivityLog;
use Modules\Hrm\Entities\Employee;
use Modules\Hrm\Events\UpdateEmployee;

class UpdateEmployeeLis
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
    public function handle(UpdateEmployee $event)
    {
        if (module_is_active('ActivityLog')) {
            $employee = $event->employee;

            $activity                   = new AllActivityLog();
            $activity['module']         = 'HRM';
            $activity['sub_module']     = 'Employee';
            $activity['description']    = __('Employee ') . Employee::employeeIdFormat($employee->employee_id) . __(' Updated by the ');
            $activity['user_id']        =  Auth::user()->id;
            $activity['url']            = '';
            $activity['workspace']      = $employee->workspace;
            $activity['created_by']     = $employee->created_by;
            $activity->save();
        }
    }
}
