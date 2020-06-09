<?php

namespace App\Entity;

use App\Repository\ShopperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShopperRepository::class)
 */
class Shopper
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $contact;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creatdat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $upddat;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="shoppers")
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="shoppers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customers;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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

    public function getCreatdat(): ?\DateTimeInterface
    {
        return $this->creatdat;
    }

    public function setCreatdat(\DateTimeInterface $creatdat): self
    {
        $this->creatdat = $creatdat;

        return $this;
    }

    public function getUpddat(): ?\DateTimeInterface
    {
        return $this->upddat;
    }

    public function setUpddat(?\DateTimeInterface $upddat): self
    {
        $this->upddat = $upddat;

        return $this;
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
            $product->addShopper($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->removeShopper($this);
        }

        return $this;
    }

    public function getCustomers(): ?Customer
    {
        return $this->customers;
    }

    public function setCustomers(?Customer $customers): self
    {
        $this->customers = $customers;

        return $this;
    }
}