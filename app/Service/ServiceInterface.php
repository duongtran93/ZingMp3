<?php


namespace App\Service;


interface ServiceInterface
{
    function create($request, $user_id);
    function findById($id);
    function update($request, $id);
    function delete($object);
}
