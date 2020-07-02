<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearch extends Controller
{
    public function index()
    {
        return view('admin\products\index');
    }
    public function action(Request $request)
    {
        $output = '';
        
            $query = $request->query;
            dd($query);

            if ($query != '') {
                $data = DB::table('products')->where('name', 'like','%'.$query.'%')
                ->orWhere('slug', 'like','%'.$query.'%')
                ->orWhere('detail', 'like','%'.$query.'%')
                ->orderBy('id','desc')->get();
            }else
            {
                $data = DB::table('products')->orderBy('id','desc')->get();
            }
            $total_row = $data->count();

            if ($total_row > 0) 
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                        <td>'.$row->name.'</td>
                        <td>'. $row->prix_achat.'</td>
                        <td>'. $row->prix_vente.'</td>
                        
                    </tr>';
                }
            }else
            {
                $output = '<tr>
                    <td align="center" colspan="4">Not Product Found</td>
                </tr>';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row,
            );
            echo json_encode($data);
            
       
        
    }
}
