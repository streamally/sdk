Currently, the SDK in beta, so use at your own risk. Things might change without any warning.

# Installation

Add the package via composer.

```
composer require streamally/sdk
```

# Registering Users

```php

$response = (new \StreamAlly\StreamAlly('sampleApiToken'))->register([
    // Name is required
   'name' => 'John Smith',
    // Email is required
   'email' => 'john@example.net',
 
    // Show ID from StreamAlly Studio
    'show_id' => '3240438024',

    // Country code should be included
    // Only include phone if user has opted-in to text messages
   'phone' => '19541234567',
    // By default, if not included, one device will be assigned
   'devices' => 2,
    // Send a notification by email and/or text message
    'notify' => 120,
]);

```

### Response

The response includes the JSON returned from the API in associative array format.

```

[
   "success" => true,
   "user" => [
        "id" => 3299393,
        "name" => "John Smith",
         ...
    ],
    "links" => [
        "https://studio.streamally.live/go/1234578?token=134545674"
    ]
]

```

