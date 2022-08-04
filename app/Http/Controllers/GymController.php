<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Monitoring;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GymController extends Controller
{

    //CREA UN ESERCIZIO
    public function store_exercise(Request $request)
    {
        try {
            //$user = $request->user();
            $exercise = new Exercise();

            $exercise->nome=$request->nome;
            $exercise->categoria=$request->categoria;
            $exercise->difficolta=$request->difficolta;
            $exercise->calorie_perse=$request->calorie_perse;
            //$brands->id_employee=$user->id;
            $exercise->created_at=Carbon::now();
            $exercise->updated_at=Carbon::now();

            $exercise->save();
            return response()->json([
                'message'=>'Esercizio creato',
                'Esercizio'=>$exercise,
                'status'=>200,

            ]);
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'Esercizio non creato',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }


//CREAZIONE MONITORAGGIO DA PARTE DELL'ATLETA
    public function store_monitoraggio(Request $request)
    {

        try {
        $user = $request->user();

        $monitoring = new Monitoring();

        $monitoring->girovita=$request->girovita;
        $monitoring->petto=$request->petto;
        $monitoring->bicipite=$request->bicipite;
        $monitoring->girocoscia=$request->girocoscia;
        $monitoring->id_user=$user->id;
        $monitoring->created_at=Carbon::now();
        $monitoring->updated_at=Carbon::now();

        $monitoring->save();

            return response()->json([
                'message'=>'Monitoraggio creato',
                'Esercizio'=>$monitoring,
                'status'=>200,

            ]);
        }
        catch (\exception $e)
        {
            return response()->json([
                'message'=>'Monitoraggio non creato',
                'status'=>201,
                '4'=>$e,

            ]);
        }
    }




//MODIFICA ESERCIZIO TRAMITE RICHIESTA POST
    public function update_exercise(Request $request)
    {

        try {
            $exercise = Exercise::find($request->id_exercise);

            $exercise->nome = $request->nome;
            $exercise->categoria = $request->categoria;
            $exercise->difficolta = $request->difficolta;
            $exercise->calorie_perse = $request->calorie_perse;
            $exercise->created_at = Carbon::now();
            $exercise->updated_at = Carbon::now();

            $exercise->save();

            return response()->json([
                'message'=>'Esercizio modificato',
                'Esercizio'=>$exercise,
                'status'=>200,

            ]);
        }
        catch (\exception $e) {

            return response()->json([
                'message'=>'Esercizio non creato',
                'status'=>201,
                '4'=>$e,

            ]);

        }

    }



//ELIMINA UN ESERCIZIO TRAMITE RICHIESTA HTTP (LO FACCIO COSI' PERCHE' IL METODO "DELETE" E' SUPPORTATO SOLO COSI'
    public function delete_exercise($id_exercise)
    {
        $exercise = Exercise::find($id_exercise);

        if(is_null($exercise))
        {
            return response()->json(['message' => 'id non trovato', 'status'=>'404']);
        }
        $exercise->delete();

        return response()->json([
            'message'=>'occhiali eliminati',
            'status'=>200,
        ]);
    }



}
