
# Attachment-view-counter

Nach meinen Recherchen scheint es im offiziellen WoltLab-Plugin-Store kein Plugin zu geben, das die Anzahl der Bildbetrachter direkt anzeigt (also Views pro Bild/Anhang). 
Die meisten vorhandenen Plugins beschäftigen sich eher mit allgemeinen Besucherstatistiken oder dem Tracking von Seitenbesuchen und nicht speziell mit einzelnen Bildern.

Das Ziel besteht darin, ein eigenes kleines Plugin/Paket zu erstellen, das beim Anklicken eines Anhangs einen Zähler in der Datenbank erhöht und diesen anschließend im Template ausgibt.

# Grundidee / Architektur

* Ziel:
Jedes Mal, wenn ein Bild (Anhang) im Forum angezeigt wird, wird ein Zähler erhöht und diese Zahl im Template ausgegeben.

* Technische Bausteine:

- Eigene DB-Tabelle für View-Counts

- Event Listener / Controller-Hook beim Anzeigen eines Anhangs

- Template-Erweiterung (TPL)

# Finale Plugin-Struktur 

```
com.example.attachmentViews/
├── files/
│   └── lib/
│       └── system/
│           ├── event/
│           │   └── AttachmentViewListener.class.php
│           └── attachment/
│               └── AttachmentViewHandler.class.php
├── templates/
│   └── attachmentViews.tpl
├── acptemplates/
├── templateListener.xml
├── eventListener.xml
├── install.sql
└── package.xml

```


# ZIP korrekt erstellen

* Linux / macOS

Im Plugin-Verzeichnis:
```
zip -r attachmentViews.zip \
package.xml \
install.sql \
eventListener.xml \
templateListener.xml \
files \
templates
```

# Windows (Explorer)

Alle oben genannten Dateien & Ordner markieren

Rechtsklick → „Senden an → ZIP-komprimierter Ordner“

ZIP umbenennen, z. B.:
```
attachment-view-counter_1.0.0.zip
```


# Installation im WoltLab 

ACP → Konfiguration → Pakete → Paket installieren

„Paket hochladen” auswählen.

ZIP auswählen.

Installieren

# Erfolgsanzeichen

Es erscheint keine Fehlermeldung.

Die Tabelle „wcf1_attachment_view“ existiert.

Das Plugin erscheint in der Paketliste.
