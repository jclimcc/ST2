<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TypeaheadController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
 
    public function autocompleteSearchTag(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Tag::where('tag', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 

    
}
