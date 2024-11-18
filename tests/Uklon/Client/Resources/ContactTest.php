<?php
/**
 * Description of ContactTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources;

use Dots\Uklon\Client\Resources\Contact;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * @dataProvider getProvideContactTestData
     */
    public function testContact(string $name, ?string $phone, ?string $email): void
    {
        $contact = Contact::fromArray([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
        ]);

        $this->assertEquals($name, $contact->getName());
        $this->assertEquals($phone, $contact->getPhone());
        $this->assertEquals($email, $contact->getEmail());

        $data = $contact->toArray();
        $this->assertEquals($name, $data['name']);
        $this->assertEquals($phone, $data['phone']);
        $this->assertEquals($email, $data['email']);
    }

    public static function getProvideContactTestData(): array
    {
        return [
            'full contact information' => ['John Doe', '123456789', 'john@example.com'],
            'only name and email' => ['Jane Doe', null, 'jane@example.com'],
            'only name and phone' => ['Alice Smith', '987654321', null],
            'only name' => ['Bob Johnson', null, null],
        ];
    }
}
