<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Models\StoredFiles;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function storeFile(Request $request){
        $validator = Validator::make($request->all(),
            [
                'user_id' => 'required',
                'file' => 'required|mimes:doc,docx,pdf,txt,ppt,pptx,xls,xlsx|max:5000',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('file')) {

            //Store file to S3
            $file = Storage::disk('s3')->put('documents/', $request->file);

            //Keep a Log of the stored file in the DB
            $storedfile = new StoredFiles();
            $storedfile->filename = $file;
            $storedfile->user_id = $request->user_id;
            $storedfile->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => "https://ibialfiles.s3-us-west-2.amazonaws.com/" . $file
            ]);

        }

    }

    public function storeImage(Request $request){

        $validator = Validator::make($request->all(),
        [
            'user_id' => 'required',
            'file' => 'required|mimes:jpeg,jpg,bmp,png,gif,svg|max:10000',
        ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('file')) {

            //Store file to S3
            $file = Storage::disk('s3')->put('images/', $request->file);

            //Keep a Log of the stored file in the DB
            $storedfile = new StoredFiles();
            $storedfile->filename = $file;
            $storedfile->user_id = $request->user_id;
            $storedfile->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => "https://ibialfiles.s3-us-west-2.amazonaws.com/" . $file
            ]);

        }
    }

    public function storeVideo(Request $request){

        $validator = Validator::make($request->all(),
        [
            'user_id' => 'required',
            'file' => 'required|mimes:mp4,mov,ogg,qt|max:50000',
        ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('file')) {

            //Store file to S3
            $file = Storage::disk('s3')->put('videos/', $request->file);

            //Keep a Log of the stored file in the DB
            $storedfile = new StoredFiles();
            $storedfile->filename = $file;
            $storedfile->user_id = $request->user_id;
            $storedfile->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => "https://ibialfiles.s3-us-west-2.amazonaws.com/" . $file
            ]);

        }

    }

    public function storeAudio(Request $request){
        $validator = Validator::make($request->all(),
        [
            'user_id' => 'required',
            'file' => 'required|mimes:mp3,wav,mpg,mpeg|max:30000',
        ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('file')) {

            //Store file to S3
            $file = Storage::disk('s3')->put('audio/', $request->file);

            //Keep a Log of the stored file in the DB
            $storedfile = new StoredFiles();
            $storedfile->filename = $file;
            $storedfile->user_id = $request->user_id;
            $storedfile->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => "https://ibialfiles.s3-us-west-2.amazonaws.com/" . $file
            ]);

        }
    }

    public function storeOther(Request $request){
        $validator = Validator::make($request->all(),
        [
            'user_id' => 'required',
            'file' => 'required|max:15000',
        ]
        );

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('file')) {

            //Store file to S3
            $file = Storage::disk('s3')->put('others/', $request->file);

            //Keep a Log of the stored file in the DB
            $storedfile = new StoredFiles();
            $storedfile->filename = $file;
            $storedfile->user_id = $request->user_id;
            $storedfile->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => "https://ibialfiles.s3-us-west-2.amazonaws.com/" . $file
            ]);

        }
    }
}
