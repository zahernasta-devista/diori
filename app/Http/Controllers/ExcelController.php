<?php
     
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
    
class ExcelController extends Controller
{
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request) 
    {
        $month = $request->input('month');
        $year = $request->input('year');
        $project = $request->input('project');

        return Excel::download(new UsersExport($year, $month, $project), 'Summary.xlsx');
    }
    
}