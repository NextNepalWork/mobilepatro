<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Videos;
use App\Models\Backend\Youtube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VideosController extends BackendController
{
    public function add_videos(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Videos Panel'));
            return view($this->backendPath . 'add_videos', $this->data);
        }
    }

    public function save_videos(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|min:5',
                'video' => 'required|unique:videos,video',
                'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
            ]);

            $data['title'] = $request->title;
            $data['video'] = $request->video;
            $data['status'] = $request->status;
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $name = time() . '.' . $thumbnail->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/thumbnails');
                $thumbnail->move($destinationPath, $name);
                $data['thumbnail'] = $name;

            }
            if (Videos::create($data)) {
                Session::flash('success', 'Your Videos has Been Added');
                return redirect()->back();

            }

        }

    }

    public function show_videos(Request $request)
    {
        if ($request->isMethod('get')) {
            $videos = Videos::orderby('id', 'desc')->paginate(10);
            $this->data('videos', $videos);
            $this->data('title', $this->setTitle('your videos'));
            return view($this->backendPath . 'show-videos', $this->data);
        }
    }

    public function delete_file($id)
    {
        $findData = Videos::findorfail($id);
        $fileName = $findData->thumbnail;
        $deletePath = public_path('uploads/thumbnails/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function delete_videos(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $video = Videos::findorfail($id);
            if ($this->delete_file($id) && $video->delete()) {
                return redirect()->back()->with('success', 'Your video has been deleted');
            }

        }
    }

    public function youtube_videos(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Youtube-links'));
            $youtubedata = Youtube::orderby('id', 'desc')->paginate(10);
            $this->data('youtubedata', $youtubedata);
            return view($this->backendPath . 'add_youtube', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|min:5',
                'url' => 'required|unique:youtubes,url',
                'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
            ]);

            $data['title'] = $request->title;
            $data['url'] = $request->url;
            $data['status'] = $request->status;
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $name = time() . '.' . $thumbnail->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/thumbnails');
                $thumbnail->move($destinationPath, $name);
                $data['thumbnail'] = $name;

            }

            $youtube = Youtube::create($data);
            if ($youtube) {
                Session::flash('success', 'Video has been posted');
                return redirect()->back();
            }


        }
    }

    public function delete_youtube(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $youtube = Youtube::findorfail($id);
            $deletePath = public_path('uploads/thumbnails/' . $youtube->thumbnail);
            if (file_exists($deletePath) && is_file($deletePath)) {
                unlink($deletePath);
            }
            $delete = $youtube->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'Video Link Deleted');
            }
        }

    }
}
