<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator,Redirect,Response,File;
use App\Image;

class ImageController extends Controller
{
    public function save(Request $request)
}

	request()->validate([

		'image'=> 'required',
		'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
 ']);

 if ($image = $request->file('image')) {
            foreach ($image as $files) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert[]['image'] = "$profileImage";
            }
        }
       
        $check = Image::insert($insert);
 
        return Redirect::to("image")->withSuccess('Great! Image has been successfully uploaded.');
 
    }
}
