<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use DateTime;
use DB;
use Redirect;
use App\LearnerDocument;

class UploadFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function uploadRequirements(Request $request)
    {
    	$id = Auth::id();

    	$fileNamesArray = array("form_137", "form_138", "good_crt", "ncae_res", "brth_crt", "g10_cert", "brgy_clr", "id_pctrs");

    	$mime_types = [
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/pdf',
            'image/jpeg'
        ];

        try
        {
        	foreach ($fileNamesArray as $file) {
		 		if ($request->hasFile($file)) {
		 			//Input data validation.
			        $this->validate(request(), [
			            $file => 'required|file|mimetypes:'.implode($mime_types,',').'|max:1024',
			        ]);
		 			$newFileName = $id . "-" . $file;
		 			$newFullFileName = $newFileName . "." . $request->file($file)->extension();

		 			// If filename already exists in the database, update the uploaded file.
		 			$fileExists = LearnerDocument::where('filename', $newFileName)->first();

		 			if ($fileExists != null) {
	                    $fileUpload = $fileExists;
		 			}
	                else
	                    $fileUpload = new LearnerDocument;

		            $fileUpload->learners_id = $id;
		            $fileUpload->filename = $newFileName;
		            $fileUpload->extension = $request->file($file)->extension();
		            $fileUpload->filesize = $request->file($file)->getClientSize();

		            // Upload file to server location.
		            $fileUpload->location = $request->file($file)->storeAs('storage/forms', $newFullFileName);
		            // Save info to DB.
					$fileUpload->save();
		        }
	    	}
	    }
        catch (\Illuminate\Database\QueryException $e) {
        	$request->session()->flash('update_error', 'ERROR! Cannot upload file. Please check and try again.');
        }
 
        return redirect()->route('home');
    }
}