<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
    protected $table = 'questions';
    
    public function farmer(){
    	$farmer = User::where('id', $this->farmer_id)->first();
    	return $farmer->name;
    }

    public function vet(){
    	$vet = User::where('id', $this->user_id)->first();
    	return $user->name;
    }
}
