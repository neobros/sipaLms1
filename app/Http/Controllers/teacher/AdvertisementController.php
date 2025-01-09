<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassDetails;
use App\Models\Advertisement;
use DB;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    public function advertisementList()
    { 
        $addAdvertisementList = DB::table('advertisements')->get();

        return view('teacher.advertisementManagement.advertisementList')->with([

            'addAdvertisementList'  =>  $addAdvertisementList, 
        ]);
    }

    
    public function addAdvertisement()
    { 
        return view('teacher.advertisementManagement.addAdvertisement')->with([

        ]);
    }

    public function advertisementPay(Request $request)
    { 
        $file = $request->file('image');
       
        $base64String = base64_encode(file_get_contents($file));

        // Optionally, you can include the file's MIME type
        $mimeType = $file->getMimeType();
        $base64StringWithMime = 'data:' . $mimeType . ';base64,' . $base64String;

     
        return view('teacher.advertisementManagement.payment')->with([
            'image'  =>  $base64StringWithMime, 
        ]);
    
    }

    public function storeAdvertisement(Request $request)
    { 

        $base64Image = $request->image; // Get the Base64 string from the request
 
        if ($base64Image) {
            // Split the string to separate the MIME type from the data
            $base64Parts = explode(',', $base64Image);
    
            if (count($base64Parts) === 2) {
                $mimeType = explode(';', explode(':', $base64Parts[0])[1])[0];
                $base64Data = $base64Parts[1];
    
                // Decode the Base64 string to binary data
                $imageData = base64_decode($base64Data);
    
                // Generate a unique filename
                $extension = explode('/', $mimeType)[1]; // Get the file extension (e.g., png, jpeg)
                $filename = date('YmdHi') . '_' . Str::random(10) . '.' . $extension;
    
                // Define the file path
                $filePath = public_path('uploads/' . $filename);
    
                // Save the decoded image to the public/uploads directory
                file_put_contents($filePath, $imageData);

            }
   
 
 
         // Create customer
         $Teacher = Advertisement::create([
             'Teacher_ID' =>   Auth::guard('teacher')->user()->Teacher_ID ,
             'advertisementimage' => $filename,
             'price' => 1000,
             'status' => 0,  
         ]);
          
        }

        return redirect('teacher/advertisementManagement/addAdvertisement')->with('success', 'Advertisement added Successfully.');
        
    }

    public function advertisementVisible($type,$id)
    {
        $update = [
            'visible' => $type,
        ];

        Advertisement::where('id',$id)->update($update);
        return redirect()->back()->with('success', 'Advertisement Visible Changed Successfully!');
    }



}
