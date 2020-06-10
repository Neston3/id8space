<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public function employee()
    {
        return $this->hasMany(Employee::class,'company_id');
    }

}
