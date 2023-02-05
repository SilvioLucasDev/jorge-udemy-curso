<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    // ------- Definir parâmetros na URL faz com que os parâmetros recebidos pela URL cheguem na controller
    public function teste(int $p1, int $p2) {
        // echo "A soma de $p1 + $p2 é: ".($p1 + $p2);

        // ------- A fn view começa a procurar a partir do diretório resources/views/..
        // ------- Formas de enviar as variáveis para a view

        // ------- Array associativo
        // return view('site.teste', ['p1' => $p1, 'p2' => $p2]);

        // ------- Método with
        // return view('site.teste')->with('p1', $p1)->with('p2', $p2);

        // ------- Método compact (Mais usado)
        return view('site.teste', compact('p1', 'p2'));
    }
}