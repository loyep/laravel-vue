<?php

namespace App\Models;

use App\Models\Traits\Cachable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    use Cachable;

}
