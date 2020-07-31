<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index() {
        return Message::all();
    }

    public function search($id) {
        return Message::find($id);
    }

    public function store(Request $request) {
        // for text message
        if ($request->type === 'text') {
            // validate text message
            $request->validate([
                'title' => 'required',
                'text' => 'required',
                'template_id'=> 'required',
                'type' => 'required'
            ]);

            return Message::create($request->all());
        }

        // for rich message
        if ($request->type === 'rich') {
            // validate text message
            $request->validate([
                'title' => 'required',
                'template_id'=> 'required',
                'type' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg|max:1024'
            ]);

            $input = $request->all();
            $images = array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $destination_path = 'public/files';
                    $name=$file->getClientOriginalName();
                    $file->move($destination_path, $name);
                    $images[]=$name;
                }
            }
            $images = json_encode($images);
            $input['images'] = $images;

            return Message::create($input);
        }
        // for video message
        if ($request->type === 'video') {
            // validate video message
            $request->validate([
                'title' => 'required',
                'template_id'=> 'required',
                'type' => 'required',
                'preview_image_url' => 'required|image|mimes:jpeg,png,jpg|max:1024',
                'video_url' => 'required | max:10240'
            ]);

            $videoMsg = $request->all();
            
            if ($request->hasFile('video_url')) {
                $destination_path = 'public/files';
                $video = $request->file('video_url');
                $video_name = $video->getClientOriginalName();
                $path = $request->file('video_url')->move($destination_path, $video_name);

                $videoMsg['video_url'] = $video_name;
            }

            if ($request->hasFile('preview_image_url')) {
                $destination_path = 'public/files';
                $image = $request->file('preview_image_url');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('preview_image_url')->move($destination_path, $image_name);
    
                $videoMsg['preview_image_url'] = $image_name;
            }

            return Message::create($videoMsg);
        }
    }

    public function update(Request $request, $id) {
        if ($request->type === 'text') {
            // validate text message
            $request->validate([
                'title' => 'required',
                'text' => 'required',
                'template_id'=> 'required',
                'type' => 'required'
            ]);
            
            $message = Message::findOrFail($id);
            $message->update($request->all());

            return $message;
        } 

        // for rich message
        if ($request->type === 'rich') {
            // validate text message
            $request->validate([
                'title' => 'required',
                'template_id'=> 'required',
                'type' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg|max:1024'
            ]);

            $input = $request->all();
            $images = array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $destination_path = 'public/files';
                    $name=$file->getClientOriginalName();
                    $file->move($destination_path, $name);
                    $images[]=$name;
                }
            }
            $images = json_encode($images);
            $input['images'] = $images;

            $message = Message::findOrFail($id);
            $message->update($input);
            
            return $message;
        }

        if ($request->type === 'video') {
            // validate video message
            $request->validate([
                'title' => 'required',
                'template_id'=> 'required',
                'type' => 'required',
                'preview_image_url' => 'max:1024',
                'video_url' => 'required | max:10240'
            ]);

            $videoMsg = $request->all();
            
            if ($request->hasFile('video_url')) {
                $destination_path = 'public/files';
                $video = $request->file('video_url');
                $video_name = $video->getClientOriginalName();
                $path = $request->file('video_url')->move($destination_path, $video_name);

                $videoMsg['video_url'] = $video_name;
            }

            if ($request->hasFile('preview_image_url')) {
                $destination_path = 'public/files';
                $image = $request->file('preview_image_url');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('preview_image_url')->move($destination_path, $image_name);
    
                $videoMsg['preview_image_url'] = $image_name;
            }

            $message = Message::findOrFail($id);
            $message->update($videoMsg);

            return $message;
        }
    }

    public function delete(Request $request, $id) {
        $message = Message::findOrFail($id);
        $message->delete();

        return 204;
    }
    
    public function copy(Request $request, $id) {
        $message = Message::findOrFail($id);
        $newMessage = $message->replicate();
        $newMessage->save();
    
        return $message;
    }
}
