<?php

namespace App\Helpers;

require_once __DIR__ . '/../../vendor/autoload.php';

use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TTS
{
    public static function correct_encoding($text) {
        $current_encoding = mb_detect_encoding($text, 'auto');
        $text = iconv($current_encoding, 'UTF-8', $text);
        return $text;
    }

    public static function textToSpeech($textContent = null, $fileName = 'output')
    {
        $credentialPath = Storage::disk('secret')->path('textToSpeech.json');
        $client = new TextToSpeechClient([
            'credentials' => $credentialPath
        ]);

        $textContent = self::correct_encoding($textContent);
        // sets text to be synthesised
        $synthesisInputText = (new SynthesisInput())
            ->setText($textContent);

        // build the voice request, select the language code ("en-US") and the ssml
        // voice gender
        $voice = (new VoiceSelectionParams())
            ->setLanguageCode('en-US')
            ->setSsmlGender(SsmlVoiceGender::FEMALE);

        // Effects profile
        $effectsProfileId = "telephony-class-application";

        // select the type of audio file you want returned
        $audioConfig = (new AudioConfig())
            ->setAudioEncoding(AudioEncoding::MP3)
            ->setEffectsProfileId(array($effectsProfileId));

        // perform text-to-speech request on the text input with selected voice
        // parameters and audio file type
        $response = $client->synthesizeSpeech($synthesisInputText, $voice, $audioConfig);
        $audioContent = $response->getAudioContent();

        if (!File::isDirectory(public_path('audio'))) {
            File::makeDirectory(public_path('audio'), 0777, true, true);
        }

        // the response's audioContent is binary
        file_put_contents("audio/$fileName.mp3", $audioContent);
    }

}