<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Message;

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
        $newTemplate->title = 'Duplicate of ' . $newTemplate['title'];
        $newTemplate->save();

        $messages = Template::find($id)->message;

        foreach($messages as $value) {
            $message['title'] = $value['title'];
            $message['template_id'] = $newTemplate['id'];
            $message['type'] = $value['type'];
            $message['text'] = $value['text'];
            $message['preview_image_url'] = $value['preview_image_url'];
            $message['video_url'] = $value['video_url'];

            Message::create($message);
        }

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
