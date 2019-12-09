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

    function create($request, $user_id)
    {
        $newSong = new Song();

        $newSong->name = $request->name;
        $newSong->description = $request->description;
        if ($request->hasFile('mp3')){
            $image = $request->file;
            $path = $image->store('songs/files', 'public');
            $newSong->file = $path;
        }
        if ($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('songs/images', 'public');
            $newSong->image = $path;
        }
        $newSong->user_id = $user_id;
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
        if ($request->hasFile('image')){
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
