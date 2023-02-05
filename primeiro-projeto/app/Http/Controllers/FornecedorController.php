<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = ['fornecedor'];

        $p1 = 10;

        return view('app.fornecedor.index', compact('fornecedores', 'p1'));
    }
}
