<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Document;

class DocumentController extends Controller
{
    public function insert(DocumentRequest $request)
    {
        $document = new Document;
        $document->fill($request->all());
        $document->save();
    }
    public function update(DocumentRequest $request, $id)
    {
        
        
    }

    public function get($id)
    {
        $document = Document::findOrFail($id);
        return response([
            'status' => 'success',
            'data' => [$document]
        ], 200); 
    }
}
