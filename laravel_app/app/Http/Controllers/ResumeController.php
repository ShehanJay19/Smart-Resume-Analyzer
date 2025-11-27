<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ResumeController extends Controller
{
    public function analyze(Request $request){
          $file = $request->file('resume');

          $response = Http::attach(
            'resume',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
         )->post('http://127.0.0.1:8000/analyze');

         return view('result',[
            'text'=>$response['resume_text'],
            'catogory'=>$response['catogory'],

         ]);
    }
}
