<?php

namespace App\Http\Controllers;

use App\Helpers\TTS;

class TestController extends Controller
{
    public function test()
    {
        TTS::textToSpeech();
        return;
    }

    public function test1()
    {
        /*$client = new TextToSpeechClient();
        $response = $client->listVoices();
        $voices = $response->getVoices();

        foreach ($voices as $voice) {
            // display the voice's name. example: tpc-vocoded
            printf('Name: %s' . PHP_EOL, $voice->getName());

            // display the supported language codes for this voice. example: 'en-US'
            foreach ($voice->getLanguageCodes() as $languageCode) {
                printf('Supported language: %s' . PHP_EOL, $languageCode);
            }

            // SSML voice gender values from TextToSpeech\V1\SsmlVoiceGender
            $ssmlVoiceGender = ['SSML_VOICE_GENDER_UNSPECIFIED', 'MALE', 'FEMALE',
                'NEUTRAL'];

            // display the SSML voice gender
            $gender = $voice->getSsmlGender();
            printf('SSML voice gender: %s' . PHP_EOL, $ssmlVoiceGender[$gender]);

            // display the natural hertz rate for this voice
            printf('Natural Sample Rate Hertz: %d' . PHP_EOL,
                $voice->getNaturalSampleRateHertz());
        }

        $client->close();*/

    }

}
