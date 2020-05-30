<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\TestDomain\Controller;

use App\Infrastructure\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;
use App\Shared\ExceptionToArray;
use App\Infrastructure\Serializer\SerializerException;

/**
 *
 * Description of TestDomainController
 *
 * @Route("/TestDomain")
 *
 * @author Mostafa A. Hamid <info@manonworld.de>
 *
 */
class TestDomainController extends BaseController
{
    
    /**
     *
     * Testing index action with request content data
     *
     * @return JsonResponse
     */
    public function index()
    {
        try {
            return $this->json(
                $this->serializer->serialize([
                        'testkey' => 'testval'
                    ])
            );
        } catch (SerializerException $e) {
            return $this->json(
                ExceptionToArray::exec($e),
                $e->getCode()
            );
        }
    }
}
