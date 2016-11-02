<?php

namespace App\Http\Controllers;

use App\BCertificate;
use App\Employe;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;


class DetailController extends Controller
{
    //Contain all the controllers related to population Details Management
    
    
    public function loadAddDetail(){
        
        return view('Population.AddBCDetails');
        
    }
    
    
    public function add(Request $request){
        
        $bCertificate=new BCertificate();

        $bCertificate->nic=$request['nic'];
        $bCertificate->name=$request['pName'];
        $bCertificate->address=$request['address'];
        $bCertificate->mName=$request['mName'];

        //save the image

        if(true){

            //$image1=$request->file('image1');
            $image1=Input::file('image1');
            $filename=$bCertificate->nic.'-a.'.$image1->getClientOriginalExtension();
            $location=public_path('BCImages/'.$filename);
            Image::make($image1)->save($location);

            $bCertificate->imgSide1=$filename;
        }

       $bCertificate->save();

        
        alert('done');
        //return back();

    }

    //Load View Birth Certificate Detail page with data
    public function loadBCDetails()
    {

        $bcDetails=DB::table('b_certificates')->get();
        return view('Population.viewBCDetails',compact('bcDetails'));
        //return var_dump($bcDetails);
        
    }
    
    public function isNicUsed(Request $request){
        //$bCertificate = Employe::where('id_num','=',$request['NIC'])-get();
        $bCertificate = Employe::where('id_num','=',$request['NIC'])->count();
        if($bCertificate > 0) {
            return 'false';

        } else {
            return 'true';
        }
    }


    
}
