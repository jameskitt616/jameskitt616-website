<?php

declare(strict_types = 1);

namespace App\Home\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ConsoleController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="home")
     */
    public function show(): Response
    {
        return $this->render('home/console.html.twig');
    }

    /**
     * @param Request $request
     *
     * @return Response
     * @Route("/resolve", name="resolve_input", methods={"POST"})
     */
    public function resolveInput(Request $request): Response
    {
        $input = $request->request->get('input');

        //        TODO: hide this as easter-egg? e.g. sudo shutdown...
        return new Response('01100110 01101001 01101110 01100100 00100000 01100001 00100000 01101000 01101111 01100010 01100010 01111001 00100000 01100110 01101111 01110010 00100000 01100111 01101111 01100100 00100111 01110011 00100000 01110011 01100001 01101011 01100101', 200);
        //        return new Response('shutdown... sudo missing (hint: very secure `password`)', 200);
        //        return new Response('Command 'bla' not found, help for help', 200);
    }
}
