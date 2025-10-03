<?php
/**
 * @author Jan Habbo Brüning <jan.habbo.bruening@gmail.com>
 */

namespace Avaro\Placetel\Repository;

use Avaro\Placetel\Http\ApiClient;
use Avaro\Placetel\Entity\Contact;

class ContactRepository {
    public function __construct(private ApiClient $client) {}

    public function all(): array {
        $data = $this->client->get('contacts');
        return array_map(fn($c) => $this->mapContact($c), $data);
    }

    public function create(Contact $contact): Contact {
        $data = $this->client->post('contacts', [
            "first_name" => $contact->getFirstName(),
            "last_name" => $contact->getLastName(),
            "company" => $contact->getCompany(),
            "email" => $contact->getEmail(),
            "email_work" => $contact->getEmailWork(),
            "mobile" => $contact->getMobile(),
            "mobile_work" => $contact->getMobileWork(),
            "phone" => $contact->getPhone(),
            "phone_work" => $contact->getPhoneWork(),
        ]);
        return $this->mapContact($data);
    }

    public function delete(Contact|string $contactOrId): bool
    {
        $id = $contactOrId instanceof Contact ? $contactOrId->getId() : $contactOrId;

        return $this->client->delete("contacts/{$id}") !== null;
    }
    
    public function getById(string $id): ?Contact
    {
        
        $data = $this->client->get("contacts/{$id}");

        return $this->mapContact($data);
    }
    
    private function mapContact(array $data): Contact {

        return new Contact(
            id: $data['id'],
            createdAt: new \DateTime($data['created_at']),
            updatedAt: new \DateTime($data['updated_at']),
            firstName: $data['first_name'] ?? null,
            lastName: $data['last_name'] ?? null,
            company: $data['company'] ?? null,
            phone: $data['phone'] ?? null,
            phoneWork: $data['phone_work'] ?? null,
            mobile: $data['mobile'] ?? null,
            mobileWork: $data['mobile_work'] ?? null,
            email: $data['email'] ?? null,
            emailWork: $data['email_work'] ?? null,
            blocked: $data['blocked'] ?? false,
        );
    }

    public function update(Contact $contact): Contact
    {
        if (!$contact->getId()) {
            throw new \RuntimeException("Cannot update contact without ID.");
        }

        $data = $this->client->put(
            "contacts/{$contact->getId()}",
            [
                "first_name" => $contact->getFirstName(),
                "last_name" => $contact->getLastName(),
                "company" => $contact->getCompany(),
                "email" => $contact->getEmail(),
                "email_work" => $contact->getEmailWork(),
                "phone" => $contact->getPhone(),
                "phone_work" => $contact->getPhoneWork(),
                "mobile" => $contact->getMobile(),
                "mobile_work" => $contact->getMobileWork(),
            ]
        );

        return $this->mapContact($data);
    }
}
