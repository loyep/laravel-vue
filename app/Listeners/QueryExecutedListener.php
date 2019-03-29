<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class QueryExecutedListener
{
    /**
     * Handle the event.
     *
     * @param QueryExecuted $queryExecuted
     */
    public function handle(QueryExecuted $queryExecuted)
    {
        if (App::environment() == 'local') {
            Log::info($this->sqlBindings($queryExecuted));
        }
    }

    /**
     * @param QueryExecuted $queryExecuted
     *
     * @return string
     */
    protected function sqlBindings(QueryExecuted $queryExecuted)
    {
        foreach ($queryExecuted->bindings as $i => $binding) {
            if ($binding instanceof \DateTime) {
                $queryExecuted->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
            } else {
                if (is_string($binding)) {
                    $queryExecuted->bindings[$i] = "'$binding'";
                }
            }
        }
        $query = str_replace(array('%', '?'), array('%%', '%s'), $queryExecuted->sql);
        return vsprintf("[ SQL ] [ Driver: %s] %s [ RunTime: %u ms]", [
            $queryExecuted->connectionName,
            vsprintf($query, $queryExecuted->bindings),
            $queryExecuted->time]);
    }

}
