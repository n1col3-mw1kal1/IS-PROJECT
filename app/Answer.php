<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Answer extends Model
{
    protected $table = 'answers';

    public function vet(){
    	$vet = User::where('id', $this->vet_id)->first();
    	return $vet->name;
    }
}
