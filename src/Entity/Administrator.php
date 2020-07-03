<?php

namespace App\Entity;

use App\Repository\AdministratorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ORM\Entity(repositoryClass=AdministratorRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *     "groups"={"user_administrators"}
 *     },
 *  attributes={
 *     "pagination_enabled"=true
 *     },
 *  collectionOperations={"GET"={"path"="/admin"},"POST"={"path"="/admin"}},
 *  subresourceOperations={
         "products_get_subresource"={"path"="/admin/{id}/produits"}
 *     },
 *  itemOperations={"GET"={"path"="/admin/{id}"},"DELETE"={"path"="/admin/{id}"},"PUT"={"path"="/admin/{id}"}}
 * )
 */
class Administrator extends Apiuser
{


    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="administrators")
     * @groups({"user_administrators"})
     * @ApiSubresource
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }



    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setAdministrators($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getAdministrators() === $this) {
                $product->setAdministrators(null);
            }
        }

        return $this;
    }
}
