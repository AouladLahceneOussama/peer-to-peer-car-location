<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\Annonce;
use App\Models\Annoncedispo;
class partnerController extends Controller
{
    public function index()
    {
        if (Gate::denies('manage-demande'))
            abort(403);
        return view('/partner/index');
    }


    public function max1()
    {
        return DB::table('annonces')->max('id');
    }

    function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|min:5',
            'desc' => 'required|max:255',
            'price' => 'required',
            'carModel' => 'required',
            'image.0' => 'required|mimes:jpg,png,jpeg',
            'image.1' => 'required|mimes:jpg,png,jpeg',
            'image.2' => 'required|mimes:jpg,png,jpeg',


        ]);


        $title = $request->input('title');
        $desc = $request->input('desc');
        $carModel = $request->input('carModel');
        $price = $request->input('price');
        $city = $request->input('city');
        $premium = $request->input('premium');
        $days = $request->input('days');
        //$monday = $request->input('monday');
        $time1 = $request->input('time1');
        $time2 = $request->input('time2');
        //$tuesday = $request->input('tuesday');
        $time3 = $request->input('time3');
        $time4 = $request->input('time4');
        //$wednesday = $request->input('wednesday');
        $time5 = $request->input('time5');
        $time6 = $request->input('time6');
        //$thursday = $request->input('thursday');
        $time7 = $request->input('time7');
        $time8 = $request->input('time8');
        //$friday = $request->input('friday');
        $time9 = $request->input('time9');
        $time10 = $request->input('time10');
        //$saturday = $request->input('saturday');
        $time11 = $request->input('time11');
        $time12 = $request->input('time12');
        //$sunday = $request->input('sunday');
        $time13 = $request->input('time13');
        $time14 = $request->input('time14');
        $AllDays = [
            'monday' => $request->input('monday'),
            'tuesday' => $request->input('tuesday'),
            'wednesday' => $request->input('wednesday'),
            'thursday' => $request->input('thursday'),
            'friday' => $request->input('friday'),
            'saturday' => $request->input('saturday'),
            'sunday' => $request->input('sunday'),
        ];
        //dd(strtotime($time1));

        // $image0 = $request->input('image.0');
        $file0 = request()->file('image.0');
        $file1 = request()->file('image.1');
        $file2 = request()->file('image.2');

        $file0->store('carsImages', ['disk' => 'storage']);
        $file1->store('carsImages', ['disk' => 'storage']);
        $file2->store('carsImages', ['disk' => 'storage']);


        $color = $request->input('color');
        if((!isset($premium)) && (($days == 7) || ($days == 15))){
            return redirect()->back()->with('messageError', 'ERROR : You have to enable premium button first ! ');
        }
        if((strtotime($time1) > strtotime($time2))||(strtotime($time3) > strtotime($time4))||(strtotime($time5) > strtotime($time6))||(strtotime($time7) > strtotime($time8))||(strtotime($time9) > strtotime($time10))||(strtotime($time11) > strtotime($time12))||(strtotime($time13) > strtotime($time14))){
            return redirect()->back()->with('messageError', 'ERROR: The start time should be lower than the end time !!');
        }
        else{
        Annonce::create([
            'user_id' => auth()->user()->id,
            'title' => $title,
            'description' => $desc,
            'car_model' => $carModel,
            'price' => $price,
            'city' => $city,
            'premium' => $premium,
            'stat' => 1,
            'premium_duration' => $days,
            'image1' => "/storage/carsImages/" . request()->file('image.0')->hashName(),
            'image2' => "/storage/carsImages/" . request()->file('image.1')->hashName(),
            'image3' => "/storage/carsImages/" . request()->file('image.2')->hashName(),
            'color' => $color
        ]);
        }
        $i=1;
        foreach ($AllDays as $key => $value) {

            if ($value == 'on') {
                $max = $this->max1();

                Annoncedispo::create([
                    'annonce_id' => $max,
                    'day' => "$key",
                    'from' => ${'time'.$i},
                    'to' => ${'time'.$i+1},
                    'stat' => 1
                ]);
            }
            $i++;
        }



        return redirect()->back()->with('message', 'Article added successfully');
    }
    public function create()
    {
        if (Gate::denies('manage-demande'))
            abort(403);
        return view('/partner/addAnnonce');
    }
}
