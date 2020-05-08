# Installation

Add the private repository to the repositories section of your composer.json file:

```
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:dev-partners/streamally-sdk.git",
            "package": {
                "name": "devpartners/streamally"
            }
        }
    ],
```

Then add the package using composer

```
composer require devpartners/streamally
```

# Registering Users

```php

$response = (new \StreamAlly\StreamAlly('sampleApiToken'))->register([
    // Name is required
   'name' => 'John Smith',
    // Email is required
   'email' => 'john@example.net',
    // Country code should be included
    // Only include phone if user has opted-in to text messages
   'phone' => '19541234567',
    // By default, if not included, one device will be assigned
   'devices' => 2,
    // Number of minutes before premiere date/time a notification should be sent out
    // If the resulting time is in the past, the notification will be sent immediately
    // If phone is included, a text will be sent
    'notify_minutes_before' => 120,
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

