<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function showCode(){
        return view('read_code');
    }

    public function writeCode(Request $request) {
        $fp = fopen('../resources/views/read_code.php', 'w') or die("Unable to open file!");
        $editorCode = $request->input;
        fwrite($fp, $editorCode);
        fclose($fp);
    }
}
