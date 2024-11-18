<?php
/**
 * Description of Contact.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class Contact extends DTO
{
    protected string $name;

    protected ?string $phone;

    protected ?string $email;

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
