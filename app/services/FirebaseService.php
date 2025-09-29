<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Kreait\Firebase\Messaging;

class FirebaseService
{
    protected Database $database;
    protected Messaging $messaging;

    public function __construct()
    {
        $factory = (new Factory)
            //Path to service account file
            ->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'))
            //Change This to firebase realtime database path
            ->withDatabaseUri('https://monitoring-server-ronobis-solo-default-rtdb.asia-southeast1.firebasedatabase.app/');

        $this->database = $factory->createDatabase();
        $this->messaging = $factory->createMessaging();
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function getMessaging(): Messaging
    {
        return $this->messaging;
    }
}
