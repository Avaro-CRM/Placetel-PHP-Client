# Placetel PHP Client

[![Packagist Version](https://img.shields.io/packagist/v/avaro/placetel-php-client.svg)](https://packagist.org/packages/avaro/placetel-php-client)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/avaro/placetel-php-client.svg)](https://www.php.net/)

**Placetel PHP Client** is a modern, easy-to-use PHP package for integrating the [Placetel REST API](https://developer.placetel.de/) into your own applications or CRM systems.
With this client, you can easily retrieve, create, update, and delete contacts, all through a clean, object-oriented API.

---

## Features

- Fully CRUD-capable Contact Repository (`create`, `getById`, `update`, `delete`)
- Modern PHP 8+ design with namespaces and DTOs
- Composer-ready and immediately usable in your own projects

---

## Installation

Install via Composer:

```bash
composer require avaro-crm/placetel-php-client
```

## Quick Start

```php

require 'vendor/autoload.php';

use Avaro\Placetel\Client;
use Avaro\Placetel\Entity\Contact;

$client = new Client(getenv('PLACETEL_API_TOKEN'));

// Retrieve all contacts
$contacts = $client->contacts()->all();
foreach ($contacts as $contact) {
    echo $contact->getFirstName() . ' ' . $contact->getLastName() . PHP_EOL;
}

// Create a new contact
$newContact = new Contact(
    firstName: "Anna",
    lastName: "Schmidt",
    email: "anna.schmidt@example.com",
    company: "Avaro GmbH"
);

$created = $client->contacts()->create($newContact);
echo "Contact created with ID: " . $created->getId();

// Update a contact
$created->setEmail("anna.maria@example.com");
$updated = $client->contacts()->update($created);

// Delete a contact
$client->contacts()->delete($updated->getId());
```