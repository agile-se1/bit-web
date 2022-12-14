# Getting Started

## Installation

Um das Projekt einzurichten und mit der Entwicklung zu beginnen, müssen folgende Schritte durchgeführt werden:

* `.env.example` kopieren und als `.env` speichern
* `composer install` ausführen, um alle PHP-Dependencies zu installieren
* `npm install` ausführen, um alle JavaScript-Dependencies zu installieren
* `sail up -d` ausführen, um Docker-Container mit relevanten Services im Hintergrund zu starten (zuvor muss 'sail' als
  alias für 'vendor/bin/sail' gesetzt werden)
* `sail artisan key:generate` ausführen, um einen neuen Schlüssel zu generieren

## Entwicklung starten

Für die tägliche Entwicklungsarbeit müssen jeweils folgende Schritte durchgeführt werden:

* `sail up -d` ausführen, um Docker-Container mit relevanten Services im Hintergrund zu starten
* `npm run watch` ausführen, um den Frontend Compiler zu starten. Hot-swapping läuft aktuell leider noch nicht

## Database aufsetzen
* `sail artisan migrate:reset` setzt die Datenbank zurück
* `sail artisan migrate:fresh` setzt die Datenbank zurück und baut eine neue auf
* `sail artisan migrate` setzt eine neue Datenbank auf
* `sail artisan db:seed` speichert die Testwerte in die Datenbank
