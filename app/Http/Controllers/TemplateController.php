<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;

class TemplateController extends Controller
{
    public function index() {
        return Template::all();
    }

    public function search($id) {
        $message = Template::find($id)->message;
        $template = Template::find($id);
        
        return (['message' => $message, 'template' => $template]);
    }

    public function store(Request $request) {
        return Template::create($request->all());
    }

    public function update(Request $request, $id) {
        $template = Template::findOrFail($id);
        $template->update($request->all());
    
        return $template;
    }

    public function copy(Request $request, $id) {
        $template = Template::findOrFail($id);
        $newTemplate = $template->replicate();
        $newTemplate->save();
    
        return $template;
    }

    public function delete(Request $request, $id) {
        $template = Template::findOrFail($id);
        $template->delete();

        return 204;
    }

    public function view(Request $request, $id) {
        return view('form', compact('id'));
    }
}
