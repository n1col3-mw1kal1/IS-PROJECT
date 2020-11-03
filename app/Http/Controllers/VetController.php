<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Answer;

class VetController extends Controller
{
    public function index(Request $request){
    	$vet = User::where('id', $request->user()->id)->where('role', 'vet')->first();
    	$questions = Question::where('is_answered', 0)->get();

    	return View('vet', compact('vet', 'questions'));
    }


	public function vets(){
		$vets = User::where('role', 'vet')->get();
		
		return View('vets', compact('vets', 'questions'));
	}

	public function edit($id){
		$vet = User::where('id', $id)->first();

	   	return View('vets.update', compact('vet'));
	}

	public function update($id, Request $request){
		$vet = User::where('id', $id)->first();
	   	$vet->name = $request->input('name');
	   	$vet->email = $request->input('email');
	   	$vet->phone = $request->input('phone');
	   	$vet->address = $request->input('address');

	   	$vet->update();

	   	return redirect('vets');
	}

	public function delete($id){
		$user = User::where('id', $id)->first();
		//$user->delete();
		

		return redirect('vets')->with('message', 'Vet has been deleted successfully!');
	}

	public function profile($id)
	{
		$user = User::where('id', $id)->first();
		return View('vets.profile', compact('user'));
	}

	public function answer($id, Request $request){
		$answer = new Answer;
		$answer->question_id = $id;
		$answer->vet_id = $request->user()->id;
		$answer->answer = $request->input('answer');
		$answer->save();

		$question = Question::where('id', $id)->first();
		$question->is_answered = 1;
		$question->update();

		return redirect('vet')->with('message', 'Your answer has been sent successfully!');
	}
}
