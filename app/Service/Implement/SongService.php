<?php


namespace App\Service\Implement;


use App\Repository\Implement\SongRepository;
use App\Service\ServiceInterface;
use App\Song;
use Illuminate\Support\Facades\Storage;

class SongService implements ServiceInterface
{

    private $songRepository;
    public function __construct(SongRepository $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    function create($request)
    {
        $newSong = new Song();

        $newSong->name = $request->name;
        $newSong->desc = $request->description;
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $path = $file->store('songs', 'public');
            $newSong->file = $path;
        }
        if ($request->hasFile('image')){
            $img = $request->file('image');
            $path = $img->store('img', 'public');
            $newSong->image = $path;
        }
        $newSong->user_id = $request->user_id;
        $this->songRepository->save($newSong);
    }

    function findById($id)
    {
        return $this->songRepository->findById($id);
    }
    function update($request, $id)
    {
        $song = $this->songRepository->findById($id);
        $song->name = $request->name;
        $song->description = $request->description;
        if ($request->hasFile('file')){
            $oldImage = $song->file;
            if ($oldImage){
                Storage::disk('public')->delete($oldImage);
            }
            $newImage = $request->file;
            $pathImage = $newImage->store('songs/files', 'public');
            $song->file = $pathImage;
        }
        if ($request->hasFile('images')){
            $oldImage = $song->file;
            if ($oldImage){
                Storage::disk('public')->delete($oldImage);
            }
            $newImage = $request->file;
            $pathImage = $newImage->store('songs/images', 'public');
            $song->file = $pathImage;
        }
        $this->songRepository->save($song);
    }
    public function delete($object)
    {
        $this->songRepository->delete($object);
    }
}
