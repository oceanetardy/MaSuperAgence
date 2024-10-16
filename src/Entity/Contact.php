<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Contact {

    /**
     * @var string|null
     * @Assert\NotBlank()
     */
    #[Assert\Length(min: '2', max: '100')]
    #[Assert\NotBlank]
    private $firstname;


    /**
     * @var string|null
     * @Assert\NotBlank()
     */
    #[Assert\Length(min: '2', max: '100')]
    #[Assert\NotBlank]
    private $lastname;

    /**
     * @var string|null
     * @Assert\NotBlank()
     */
    #[Assert\Regex(pattern: '/[0-9]{10}/')]
    private $phone;


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    #[Assert\Length(min: '10')]
    #[Assert\Email]
    private $email;

    /**
     * @var string|null
     */
    #[Assert\Length(min: '10')]
    #[Assert\NotBlank]
    private $message;

    /**
     * @var Property|null
     */
    private $property;


    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): Contact
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): Contact
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return Contact
     */
    public function setMessage(?string $message): Contact
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Property|null
     */
    public function getProperty(): ?Property
    {
        return $this->property;
    }

    /**
     * @param Property|null $property
     */
    public function setProperty(?Property $property): void
    {
        $this->property = $property;
    }
}