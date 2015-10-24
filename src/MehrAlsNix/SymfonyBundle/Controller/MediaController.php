<?php

namespace MehrAlsNix\SymfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MediaController extends Controller
{
    public function postMediaAction($entry, $id)
    {}

    public function getMediaAction($entry)
    {}

    public function deleteMediaAction($entry, $id)
    {} // "delete_user_comment" [DELETE] /users/{slug}/comments/{id}

    public function newMediaAction($entry)
    {} // "new_user_comments"   [GET] /users/{slug}/comments/new

    public function editMediaAction($entry, $id)
    {} // "edit_user_comment"   [GET] /users/{slug}/comments/{id}/edit

    public function removeMediaAction($entry, $id)
    {} // "remove_user_comment" [GET] /users/{slug}/comments/{id}/remove
}
