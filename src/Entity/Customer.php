<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *     "groups"={"user_customers"}
 *     },
 *  attributes={
 *     "pagination_enabled"=true
 *     }
 * )
 */
class Customer extends Apiuser
{


    /**
     * @ORM\Column(type="integer")
     * @groups({"user_customers"})
     */
    private $contact;

    /**
     * @ORM\OneToMany(targetEntity=Shopper::class, mappedBy="customers")
     * @groups({"user_customers"})
     * @ApiSubresource
     */
    private $shoppers;

    public function __construct()
    {
        $this->shoppers = new ArrayCollection();
    }



    public function getContact(): ?int
    {
        return $this->contact;
    }

    public function setContact(int $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection|Shopper[]
     */
    public function getShoppers(): Collection
    {
        return $this->shoppers;
    }

    public function addShopper(Shopper $shopper): self
    {
        if (!$this->shoppers->contains($shopper)) {
            $this->shoppers[] = $shopper;
            $shopper->setCustomers($this);
        }

        return $this;
    }

    public function removeShopper(Shopper $shopper): self
    {
        if ($this->shoppers->contains($shopper)) {
            $this->shoppers->removeElement($shopper);
            // set the owning side to null (unless already changed)
            if ($shopper->getCustomers() === $this) {
                $shopper->setCustomers(null);
            }
        }

        return $this;
    }
}
