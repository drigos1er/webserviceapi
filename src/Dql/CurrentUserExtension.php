<?php


namespace App\Dql;


use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Customer;
use App\Entity\Shopper;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Security;

class CurrentUserExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{

    private $security;
    private $auth;

    /**
     * PasswordEncoder constructor.
     * @param $security
     */
    public function __construct(Security $security,AuthorizationCheckerInterface $checker)
    {
        $this->security = $security;
        $this->auth=$checker;
    }


 private function addWhere(QueryBuilder $queryBuilder, string $resourceClass) {
     // 1. recuperré l'utilisateur courant
     $cuser=$this->security->getUser();




     // 2. effectuer la requête en fonction de l'utilisateur connecté

     if(($resourceClass === Customer::class || $resourceClass===Shopper::class) && !$this->auth->isGranted('ROLE_ADMIN')){
         $rallias= $queryBuilder->getRootAliases()[0];






         if($resourceClass===Customer::class){
             $queryBuilder->andWhere("$rallias.id=:user");
         }elseif($resourceClass===Shopper::class){
             $queryBuilder->join("$rallias.customers","c")
                 ->andWhere("c.id=:user");

         }


         $queryBuilder->setParameter("user",$cuser);




     }

 }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
       $this->addWhere($queryBuilder,$resourceClass);
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = [])
    {
        $this->addWhere($queryBuilder,$resourceClass);
    }


}