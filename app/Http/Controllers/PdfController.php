<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function pdfPago($no_boleta){

        $pago = DB::select(
            '
                SELECT PG.ID NO_BOLETA, EST.NOMBRE NOMBRE_ESTUDIANTE, SM.NOMBRE SEMESTRE, PG.MES, PG.ANIO, TP.NOMBRE TIPO_DE_PAGO, MP.NOMBRE METODO_DE_PAGO, PG.MONTO
                FROM PAGO PG
                INNER JOIN ESTUDIANTE EST ON PG.ID_ESTUDIANTE = EST.ID
                INNER JOIN SEMESTRE SM ON PG.ID_SEMESTRE = SM.ID
                INNER JOIN TIPO_PAGO TP ON PG.ID_TIPO_PAGO = TP.ID
                INNER JOIN METODO_PAGO MP ON PG.ID_METODO_PAGO = MP.ID
                WHERE PG.ID = ?
            ', [$no_boleta]
        );
    
        $pdf = \PDF::loadView('tesoreria.pdf', compact('pago'));

        return $pdf->stream('comprobante.pdf');
    }
}
