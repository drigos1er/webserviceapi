<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $series;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $numseries;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pictureurl;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creatdat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $upddat;

    /**
     * @ORM\ManyToMany(targetEntity=Shopper::class, inversedBy="products")
     */
    private $shoppers;

    /**
     * @ORM\ManyToOne(targetEntity=Administrator::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $administrators;

    public function __construct()
    {
        $this->shoppers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSeries(): ?string
    {
        return $this->series;
    }

    public function setSeries(string $series): self
    {
        $this->series = $series;

        return $this;
    }

    public function getNumseries(): ?string
    {
        return $this->numseries;
    }

    public function setNumseries(string $numseries): self
    {
        $this->numseries = $numseries;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPictureurl(): ?string
    {
        return $this->pictureurl;
    }

    public function setPictureurl(?string $pictureurl): self
    {
        $this->pictureurl = $pictureurl;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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
        }

        return $this;
    }

    public function removeShopper(Shopper $shopper): self
    {
        if ($this->shoppers->contains($shopper)) {
            $this->shoppers->removeElement($shopper);
        }

        return $this;
    }

    public function getAdministrators(): ?Administrator
    {
        return $this->administrators;
    }

    public function setAdministrators(?Administrator $administrators): self
    {
        $this->administrators = $administrators;

        return $this;
    }
}
