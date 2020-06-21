<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odeljenje extends Model
{
    public $table="odeljenja";

    public function smer()
	{
		return $this->belongsTo(Smer::class, 'smer_id')
            ->withDefault([
                'naziv' => $this->naziv,
            ]);
    }
    
    public function staresina()
	{
		return $this->belongsTo(Staresina::class, 'staresina_id')
            ->withDefault([
                'ime_prezime' => $this->ime_prezime,
            ]);
    }

    public function ucenici()
	{
		return $this->hasMany(Ucenik::class);
    }
}
