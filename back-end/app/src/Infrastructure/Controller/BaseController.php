<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Infrastructure\Serializer\JmsSerializer;
use App\Infrastructure\Serializer\HateoasSerializer;

/**
 *
 * Description of BaseController
 *
 * @property LoggerInterface $logger Symfony built in Logger Interface
 * @property RequestStack $request Symfony builtin HTTP request
 * @property ValidatorInterface $validator Symfony builtin Validator Interface
 * @property JmsSerializer $serializer JMS Serializer for Messaging
 * @property HateoasSerializer $hateoas Serializer for REST responses
 *
 * @author Mostafa A. Hamid <info@manonworld.de>
 */
class BaseController extends AbstractController
{
    
    /**
     *
     * @var LoggerInterface $logger
     */
    protected LoggerInterface $logger;
    
    /**
     *
     * @var RequestStack $request
     */
    protected RequestStack $request;
    
    /**
     *
     * @var ValidatorInterface $validator
     */
    protected ValidatorInterface $validator;
    
    /**
     *
     * @var JmsSerializer $serializer
     */
    protected JmsSerializer $serializer;
    
    /**
     *
     * @var HateoasSerializer $hateoas
     */
    protected HateoasSerializer $hateoas;
    
    /**
     *
     * New Instance
     *
     * @param LoggerInterface $logger
     * @param Request $request
     * @param ValidatorInterface $validator
     * @param Serializer $serializer
     */
    public function __construct(
        LoggerInterface $logger,
        RequestStack $request,
        ValidatorInterface $validator,
        JmsSerializer $serializer,
        HateoasSerializer $hateoas
    ) {
        $this->logger       = $logger;
        $this->request      = $request;
        $this->validator    = $validator;
        $this->serializer   = $serializer;
        $this->hateoas      = $hateoas;
    }
}
