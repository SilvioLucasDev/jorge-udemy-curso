<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\Readline\Hoa\_Protocol;

class ContatoController extends Controller
{
    public function contato() {
        return view('site.contato', ['titulo' => 'Contato']);
    }
}
