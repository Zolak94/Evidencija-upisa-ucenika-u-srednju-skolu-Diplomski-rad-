<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ucenik extends Model
{
    public $table="ucenici";
    
    public function odeljenje()
	{
		return $this->belongsTo(Odeljenje::class, 'odeljenje_id')
            ->withDefault([
                'naziv' => $this->naziv,
            ]);
    }

    public function smer()
	{
		return $this->belongsTo(Smer::class, 'smer_id')
            ->withDefault([
                'naziv' => $this->naziv,
            ]);
    }
}
