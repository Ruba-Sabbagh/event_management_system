<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRcodeGenerateController extends Controller
{
    public function qrcode($userid){
        $qrCodes = [];
        $qrCodes['simple'] =
        QrCode::size(150)->generate($userid);
      /*  $qrCodes['changeColor'] =
        QrCode::size(150)->color(255, 0, 0)->generate('https://minhazulmin.github.io/');
        $qrCodes['changeBgColor'] =
        QrCode::size(150)->backgroundColor(255, 0, 0)->generate('https://minhazulmin.github.io/');
        $qrCodes['styleDot'] =
        QrCode::size(150)->style('dot')->generate('https://minhazulmin.github.io/');
        $qrCodes['styleSquare'] = QrCode::size(150)->style('square')->generate('https://minhazulmin.github.io/');
        $qrCodes['styleRound'] = QrCode::size(150)->style('round')->generate('https://minhazulmin.github.io/');
        */
        //return view('pages.invitations.qrcode',$qrCodes);
        return $qrCodes;

    }
}
