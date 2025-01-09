<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use DB;

class AdvertisementController extends Controller
{
    public function newAdvertisement()
    { 
        $addAdvertisementList = DB::table('advertisements')->join('teacher', 'advertisements.Teacher_ID', '=', 'teacher.Teacher_ID')->where('advertisements.status', 0 )->get();

        return view('admin.advertisementManagement.newAdvertisement')->with([

            'addAdvertisementList'  =>  $addAdvertisementList, 
        ]);
    }

    
    public function ApproveAdvertisement($id)
    {
        $update = [
            'status' => 1,
            'visible' => 1,
        ];

        Advertisement::where('id',$id)->update($update);
        return redirect()->back()->with('success', 'Advertisement Approved Successfully!');

    }

    public function RejectApproveAdvertisement($id)
    {
        $update = [
            'status' => 2,
        ];

        Advertisement::where('id',$id)->update($update);
        return redirect()->back()->with('success', 'Advertisement Approved Successfully!');
    }
}
