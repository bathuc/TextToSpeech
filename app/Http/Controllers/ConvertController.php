<?php

namespace App\Http\Controllers;

use App\Helpers\TTS;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function textToSpeech(Request $request)
    {
        if($request->isMethod('post')) {
            $file = $request->file('file');
            $filenameWithExtension = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $textContent = file_get_contents($file);

            TTS::textToSpeech($textContent, $filename);

            session()->flash('message', 'Audio was created successful!');
        }

        return view('front.textToSpeech');
    }
}
