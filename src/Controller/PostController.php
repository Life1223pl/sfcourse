<?php

namespace App\Controller;


use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();
        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }
    public function create(Request $request){
        $post = new Post();
        $post->setTitle('This is going to be a title');

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();
        return new Response('Post was created');
    }

    public function show($id , PostRepository $postRepository){
       $post = $postRepository->find($id);

        return $this->render('post/show.html.twig',[
            'post' => $post
        ]);
    }
    public function remove($id , PostRepository $postRepository){
        $post = $postRepository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();

        return new Response('Post has been removed');
    }
}
