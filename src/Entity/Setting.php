<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingRepository::class)
 */
class Setting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shopTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shopSubtitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contactSubtitle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getShopTitle(): ?string
    {
        return $this->shopTitle;
    }

    public function setShopTitle(string $shopTitle): self
    {
        $this->shopTitle = $shopTitle;

        return $this;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(string $contactTitle): self
    {
        $this->contactTitle = $contactTitle;

        return $this;
    }

    public function getShopSubtitle(): ?string
    {
        return $this->shopSubtitle;
    }

    public function setShopSubtitle(string $shopSubtitle): self
    {
        $this->shopSubtitle = $shopSubtitle;

        return $this;
    }

    public function getContactSubtitle(): ?string
    {
        return $this->contactSubtitle;
    }

    public function setContactSubtitle(string $contactSubtitle): self
    {
        $this->contactSubtitle = $contactSubtitle;

        return $this;
    }
}
