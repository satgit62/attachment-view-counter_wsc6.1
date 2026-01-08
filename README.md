
# Attachment-view-counter

Nach meinen Recherchen scheint es im offiziellen WoltLab-Plugin-Store kein Plugin zu geben, das die Anzahl der Bildbetrachter direkt anzeigt (also Views pro Bild/Anhang). 
Die meisten vorhandenen Plugins beschäftigen sich eher mit allgemeinen Besucherstatistiken oder dem Tracking von Seitenbesuchen und nicht speziell mit einzelnen Bildern.

# Grundidee / Architektur

Ziel:
Jedes Mal, wenn ein Bild (Anhang) im Forum angezeigt wird, wird ein Zähler erhöht und diese Zahl im Template ausgegeben.

Technische Bausteine:

Eigene DB-Tabelle für View-Counts

Event Listener / Controller-Hook beim Anzeigen eines Anhangs

Template-Erweiterung (TPL)

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

