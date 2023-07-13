<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Traits\ExportTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExportController extends Controller
{
    use ExportTrait;

    public function test(Request $request)
    {
        $data = Agent::first();
        
        $data['bureau_ar'] = $data->bureau->nom_bureau_ar;
        $data['service_ar'] = $data->bureau->service->nom_service_ar;
        $data['grade_ar'] = $data->grade->nom_grade_ar;
        $data['date_rec2'] = $data->date_rec->format('Y-m-d');

        $filename = $this->exportWord($data->toArray(),'exemple','شهادة ادارية');

        return response()->download($filename)->deleteFileAfterSend(true);
    }




















}
