<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Farmer;
use App\Question;

class FarmerController extends Controller
{
    public function index(){
   	$users = User::all();
   	return View('farmer.users', compact('users'));
   }

   public function create(){
   	return View('farmer.create');
   }

   public function save(Request $request){
   	$farmer = new Farmer;
   	$farmer->name = $request->input('name');
   	$farmer->address = $request->input('address');
   	$farmer->email = $request->input('email');
   	$farmer->phone = $request->input('phone');
   	$farmer->save();

   	return redirect('farmers');
   	} 

   public function show(){
   	 $farmer = User::where('role', 'farmer')->get();

   	 return View('farmer.show', compact('farmer'));
   	
   }

   public function edit($id)
   {
   	$farmer = User::where('id', $id)->first();

   	return View('farmer.update', compact('farmer'));

   }

   public function update($id, Request $request){
   	$farmer = User::where('id', $id)->first();
   	$farmer->name = $request->input('name');
   	$farmer->email = $request->input('email');
   	$farmer->phone = $request->input('phone');
   	$farmer->address = $request->input('address');

   	$farmer->update();

   	return redirect('farmers');

   }

   public function delete($id){
   	return $request->input(['farmer']);
   		$farmer = User::where('id', $id)->first();

   		$farmer->delete();

   		return redirect('farmers');
	}

   public function farmer(Request $request){
      $farmer = User::where('id', $request->user()->id)->first();
      $questions = Question::where('farmer_id', $farmer->id)->paginate(10);
      $answered = Question::where('is_answered', 1)->where('farmer_id', $farmer->id)->paginate(10);
      return View('farmer.farmer', compact('farmer', 'questions', 'answered'));
   }

   public function question(Request $request){
      $user = User::where('id', $request->user()->id)->first();
      $id = $user->id;
      return View('questions.create', compact('id'));
   }

   public function do_question($id, Request $request){
      $question = new Question;
      $question->farmer_id = $id;
      $question->question = $request->input('question');
      $question->save();

      return redirect('farmer')->with('message','Your question has been sent successfully!');
   }

   public function profile(Request $request){
      $user = User::where('id', $request->user()->id)->first();
      return View('farmer.profile',compact('user'));

   }


}
