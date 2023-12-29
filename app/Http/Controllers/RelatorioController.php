<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;

class RelatorioController extends Controller
{
    public function gerarRelatorio()
    {
        $dadosRelatorio = DB::table('relatorio_livros')->get();

        $pdf = PDF::loadView('relatorios.livros', compact('dadosRelatorio'));
        return $pdf->download('relatorio_livros.pdf');
    }
}
