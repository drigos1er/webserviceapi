<?php
namespace App\Events;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Administrator;
use App\Entity\Apiuser;
use App\Entity\Customer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\HttpKernel\kernelEvents;


/**
 * Class PasswordEncoder
 * @package App\Events
 */
class PasswordEncoder implements EventSubscriberInterface
{

    private $encoder;

    /**
     * PasswordEncoder constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public static function getSubscribedEvents()
    {


        return [
            kernelEvents::VIEW=>['encodePassword',EventPriorities::PRE_WRITE]
        ];
    }

    public function encodePassword(GetResponseForControllerResultEvent $event){
        $result=$event->getControllerResult();
        $method=$event->getRequest()->getMethod();   // Renvoi la method GET, POST, PUT

        if(($result instanceof Administrator && $method=='POST') || ($result instanceof Customer && $method=='POST') ){

            $hash=$this->encoder->encodePassword($result,$result->getPassword());
            $result->setUpddat( new \DateTime());
            $result->setCreatdat( new \DateTime());
            $result->setPassword($hash);

        }




    }

}