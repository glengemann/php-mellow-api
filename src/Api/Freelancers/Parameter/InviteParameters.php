<?php

declare(strict_types=1);

namespace Mellow\Api\Freelancers\Parameter;

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
     * } $options
     */
    public function __construct(
        private array $options = [],
    ) {
    }

    public function toArray(): array
    {
        return $this->options;
    }

    public function email(string $email): static
    {
        $this->options['email'] = $email;

        return $this;
    }

    public function phone(?string $phone): static
    {
        if (null !== $phone && '' !== $phone && !preg_match('/^\d+$/', $phone)) {
            throw new \InvalidArgumentException('The "phone" option must contain digits only.');
        }

        $this->options['phone'] = $phone;

        return $this;
    }

    public function firstName(?string $firstName): static
    {
        $this->options['firstName'] = $firstName;

        return $this;
    }

    public function lastName(?string $lastName): static
    {
        $this->options['lastName'] = $lastName;

        return $this;
    }

    public function middleName(?string $middleName): static
    {
        $this->options['middleName'] = $middleName;

        return $this;
    }

    public function citizenship(?string $citizenship): static
    {
        $this->options['citizenship'] = $citizenship;

        return $this;
    }

    public function address(?string $address): static
    {
        $this->options['address'] = $address;

        return $this;
    }

    public function postalCode(?string $postalCode): static
    {
        $this->options['postalCode'] = $postalCode;

        return $this;
    }

    public function city(?string $city): static
    {
        $this->options['city'] = $city;

        return $this;
    }

    public function state(?string $state): static
    {
        $this->options['state'] = $state;

        return $this;
    }

    public function country(?string $country): static
    {
        $this->options['country'] = $country;

        return $this;
    }

    public function birthdate(?string $birthdate): static
    {
        $this->options['birthdate'] = $birthdate;

        return $this;
    }

    public function birthCountry(?string $birthCountry): static
    {
        $this->options['birthCountry'] = $birthCountry;

        return $this;
    }

    public function specialization(?int $specialization): static
    {
        if (null !== $specialization && $specialization < 1) {
            throw new \InvalidArgumentException('The "specialization" option must be a positive integer.');
        }

        $this->options['specialization'] = $specialization;

        return $this;
    }

    public function note(?string $note): static
    {
        $this->options['note'] = $note;

        return $this;
    }

    public function inEnglish(?bool $inEnglish): static
    {
        $this->options['inEnglish'] = $inEnglish;

        return $this;
    }

    public function sendEmail(?bool $sendEmail): static
    {
        $this->options['sendEmail'] = $sendEmail;

        return $this;
    }
}
