<?php

namespace App\Controller;

use App\Repository\CommentRepository;

class CommentController extends Controller
{

    protected function addComment()
    {
        $errors = [];

        if (isset($_POST['newComment'])) {

            $commentRepository = new CommentRepository();

            $comment = $commentRepository->createOrUpdateOne($_POST['comment']);

        }

    }

}

// CODE EN COURS DE CREATION