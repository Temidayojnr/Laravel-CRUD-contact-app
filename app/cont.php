<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cont extends Model
{
        protected $fillable = ['name'=> 'name', 'phone'=>'Phone Number'];
        
        public function cont()
        {
            $cont = App\cont::create(['name'=>'Full Name', 'phone'=>'Phone Number']);
        }
}
