<?php

namespace App\Entity;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *     "groups"={"products_read"}
 *     },
 *   subresourceOperations={
 *  "api_administrators_products_get_subresource"={
 *     "normalization_context"={"groups"={"products_subresource"}}
 *   }
 *     },
 *
 *
 *  attributes={
 *     "pagination_enabled"=true,
 *     "order":{"name":"ASC"}
 *     },
 *  collectionOperations={"GET"={"path"="/produits"},"POST"={"path"="/produits"}},
 *  itemOperations={"GET"={"path"="/produits/{id}"}}
 * )
 * @ApiFilter(
 *  SearchFilter::class, properties={"name"}
 * )
 *
 * @ApiFilter(
 *  OrderFilter::class
 * )
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @groups({"products_read","products_subresource"})
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $series;

    /**
     * @ORM\Column(type="string", length=100)
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $numseries;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $pictureurl;

    /**
     * @ORM\Column(type="integer")
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $quantity;

    /**
     * @ORM\Column(type="float")
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $creatdat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @groups({"products_read","user_administrators","products_subresource"})
     */
    private $upddat;

    /**
     * @ORM\ManyToMany(targetEntity=Shopper::class, inversedBy="products")
     *
     */
    private $shoppers;

    /**
     * @ORM\ManyToOne(targetEntity=Administrator::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     *
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
