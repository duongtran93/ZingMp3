<?php

namespace App\Http\Controllers;


use App\Service\Implement\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    private $songService;
    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    function create()
    {
        return view('song.create');
    }

    function store(Request $request, $user_id)
    {
        try {
            $message = 'Them moi thanh Cong';
            $this->songService->create($request, $user_id);
            return $message;
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }
    function editSong($id)
    {
        try {
            $song = $this->songService->findById($id);
        }catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    function updateSong(Request $request, $id)
    {
        try {
            $message = 'Them moi thanh Cong';
            $this->songService->update($request, $id);
            return $message;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    function deleteSong($id)
    {
        try {
            $message = 'Xoa bai hat thanh Cong';
            $song = $this->songService->findById($id);
            $this->songService->delete($song);
            return $message;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
