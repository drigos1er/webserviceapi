<?php
namespace App\Events;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Administrator;
use App\Entity\Apiuser;
use App\Entity\Shopper;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\HttpKernel\kernelEvents;


/**
 * Class PasswordEncoder
 * @package App\Events
 */
class customerSubscriber implements EventSubscriberInterface
{

    private $security;

    /**
     * PasswordEncoder constructor.
     * @param $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    public static function getSubscribedEvents()
    {

        return [
            kernelEvents::VIEW=>['setUserForCustomer',EventPriorities::PRE_VALIDATE]
        ];
    }

    public function setUserForCustomer(GetResponseForControllerResultEvent $event){
        $result=$event->getControllerResult();
        $method=$event->getRequest()->getMethod();   // Renvoi la method GET, POST, PUT

        if($result instanceof Shopper && $method=='POST'){

            // recuperer l'utilisateur connecté
            $user=$this->security->getUser();

            $result->setCustomers($user);
            $result->setUpddat( new \DateTime());
            $result->setCreatdat( new \DateTime());


        }




    }

}