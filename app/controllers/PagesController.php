<?php

namespace App\Controllers;

class PagesController {
    public function about() {
        return view('about');
    }

    public function design() {
        return view('design');
    }

    public function landing() {
        return view('landing');
    }
}
