<?php
/**
 *
 */

namespace Avaro\Placetel\Entity;

class Contact {
    public function __construct(
        protected ?string $id = null,
        protected ?\DateTime $createdAt = null,
        protected ?\DateTime $updatedAt = null,
        protected ?string $speedDial = null,
        protected ?string $firstName = null,
        protected ?string $lastName = null,
        protected ?string $email = null,
        protected ?string $emailWork = null,
        protected ?string $company = null,
        protected ?string $address = null,
        protected ?string $addressWork = null,
        protected ?string $phone = null,
        protected ?string $phoneWork = null,
        protected ?string $mobile = null,
        protected ?string $mobileWork = null,
        protected ?string $fax = null,
        protected ?string $faxWork = null,
        protected ?string $facebookUrl = null,
        protected bool $blocked = false,
        protected ?string $color = null,
    ) {}

    public function getId(): ?string { return $this->id; }
    public function getCreatedAt(): ?\DateTime { return $this->createdAt; }
    public function getUpdatedAt(): ?\DateTime { return $this->updatedAt; }

    // speedDial
    public function getSpeedDial(): ?string { return $this->speedDial; }
    public function setSpeedDial(?string $speedDial): void { $this->speedDial = $speedDial; }

    // firstName
    public function getFirstName(): ?string { return $this->firstName; }
    public function setFirstName(?string $firstName): void { $this->firstName = $firstName; }

    // lastName
    public function getLastName(): ?string { return $this->lastName; }
    public function setLastName(?string $lastName): void { $this->lastName = $lastName; }

    // email
    public function getEmail(): ?string { return $this->email; }
    public function setEmail(?string $email): void { $this->email = $email; }

    // emailWork
    public function getEmailWork(): ?string { return $this->emailWork; }
    public function setEmailWork(?string $emailWork): void { $this->emailWork = $emailWork; }

    // company
    public function getCompany(): ?string { return $this->company; }
    public function setCompany(?string $company): void { $this->company = $company; }

    // address
    public function getAddress(): ?string { return $this->address; }
    public function setAddress(?string $address): void { $this->address = $address; }

    // addressWork
    public function getAddressWork(): ?string { return $this->addressWork; }
    public function setAddressWork(?string $addressWork): void { $this->addressWork = $addressWork; }

    // phone
    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(?string $phone): void { $this->phone = $phone; }

    // phoneWork
    public function getPhoneWork(): ?string { return $this->phoneWork; }
    public function setPhoneWork(?string $phoneWork): void { $this->phoneWork = $phoneWork; }

    // mobile
    public function getMobile(): ?string { return $this->mobile; }
    public function setMobile(?string $mobile): void { $this->mobile = $mobile; }

    // mobileWork
    public function getMobileWork(): ?string { return $this->mobileWork; }
    public function setMobileWork(?string $mobileWork): void { $this->mobileWork = $mobileWork; }

    // fax
    public function getFax(): ?string { return $this->fax; }
    public function setFax(?string $fax): void { $this->fax = $fax; }

    // faxWork
    public function getFaxWork(): ?string { return $this->faxWork; }
    public function setFaxWork(?string $faxWork): void { $this->faxWork = $faxWork; }

    // facebookUrl
    public function getFacebookUrl(): ?string { return $this->facebookUrl; }
    public function setFacebookUrl(?string $facebookUrl): void { $this->facebookUrl = $facebookUrl; }

    // blocked
    public function isBlocked(): bool { return $this->blocked; }
    public function setBlocked(bool $blocked): void { $this->blocked = $blocked; }

    // color
    public function getColor(): ?string { return $this->color; }
    public function setColor(?string $color): void { $this->color = $color; }
}
