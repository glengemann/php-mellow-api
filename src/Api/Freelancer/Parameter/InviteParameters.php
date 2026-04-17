<?php

declare(strict_types=1);

namespace Mellow\Api\Freelancer\Parameter;

class InviteParameters
{
    /**
     * @param array{
     *     email: string,
     *     phone?: string,
     *     firstName?: string,
     *     lastName?: string,
     *     middleName?: string,
     *     citizenship?: string,
     *     address?: string,
     *     postalCode?: string,
     *     city?: string,
     *     state?: string,
     *     country?: string,
     *     birthdate?: string,
     *     birthCountry?: string,
     *     specialization?: int,
     *     note?: string,
     *     inEnglish?: bool,
     *     sendEmail?: bool,
     * } $parameters
     */
    public function __construct(
        private array $parameters = [],
    ) {
    }

    public function toArray(): array
    {
        return $this->parameters;
    }

    public function email(string $email): static
    {
        $this->parameters['email'] = $email;

        return $this;
    }

    public function phone(?string $phone): static
    {
        if (null !== $phone && '' !== $phone && !preg_match('/^\d+$/', $phone)) {
            throw new \InvalidArgumentException('The "phone" option must contain digits only.');
        }

        $this->parameters['phone'] = $phone;

        return $this;
    }

    public function firstName(?string $firstName): static
    {
        $this->parameters['firstName'] = $firstName;

        return $this;
    }

    public function lastName(?string $lastName): static
    {
        $this->parameters['lastName'] = $lastName;

        return $this;
    }

    public function middleName(?string $middleName): static
    {
        $this->parameters['middleName'] = $middleName;

        return $this;
    }

    public function citizenship(?string $citizenship): static
    {
        $this->parameters['citizenship'] = $citizenship;

        return $this;
    }

    public function address(?string $address): static
    {
        $this->parameters['address'] = $address;

        return $this;
    }

    public function postalCode(?string $postalCode): static
    {
        $this->parameters['postalCode'] = $postalCode;

        return $this;
    }

    public function city(?string $city): static
    {
        $this->parameters['city'] = $city;

        return $this;
    }

    public function state(?string $state): static
    {
        $this->parameters['state'] = $state;

        return $this;
    }

    public function country(?string $country): static
    {
        $this->parameters['country'] = $country;

        return $this;
    }

    public function birthdate(?string $birthdate): static
    {
        $this->parameters['birthdate'] = $birthdate;

        return $this;
    }

    public function birthCountry(?string $birthCountry): static
    {
        $this->parameters['birthCountry'] = $birthCountry;

        return $this;
    }

    public function specialization(?int $specialization): static
    {
        if (null !== $specialization && $specialization < 1) {
            throw new \InvalidArgumentException('The "specialization" option must be a positive integer.');
        }

        $this->parameters['specialization'] = $specialization;

        return $this;
    }

    public function note(?string $note): static
    {
        $this->parameters['note'] = $note;

        return $this;
    }

    public function inEnglish(?bool $inEnglish): static
    {
        $this->parameters['inEnglish'] = $inEnglish;

        return $this;
    }

    public function sendEmail(?bool $sendEmail): static
    {
        $this->parameters['sendEmail'] = $sendEmail;

        return $this;
    }
}
