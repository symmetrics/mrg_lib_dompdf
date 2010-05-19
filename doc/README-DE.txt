* DOCUMENTATION

** INSTALLATION
Extrahieren Sie den Inhalt dieses Archivs in Ihr Magento Verzeichnis.

** USAGE
Dieses Modul ermöglicht die Integration der DomPDF Bibliothek in Magento
für andere Module. Sie konvertiert HTML Sourcecode zu PDF Dateien.
Dieses Modul muss nur installiert werden, wenn es bei einem anderen Modul 
als Abhängigkeit eingetragen ist.
DomPDF beachtet (gröstenteils) CSS 2.1. Es liest externe und inline Stylesheets
sowie style Attribute in HTML Tags. Außerdem werden die meisten HTML-
Formatierungs-Tags unterstützt.
Eine genauere Beschreibung der Bibliothek findet sich unter:
http://www.digitaljunkies.ca/dompdf/about.php

** FUNCTIONALITY
*** A: Übergebenes HTML wird in eine PDF Datei konvertiert.
        Eine Beispielimplementierung gibt es z.B. in
        symmetrics_module_pdfprinter
        symmetrics_module_reorderlist
*** B: Per Migrationsskript wird ein Font-Cache Verzeichnis angelegt. Der Pfad
        ist: [MAGENTO-ROOT]/var/lib/Symmetrics/dompdf/fonts/

** TECHNICAL
Das PDF Rendering wird mithilfe von PDFLib (www.pdflib.com) order durch eine 
mitgelieferte Version der "R&OS CPDF Klasse" (www.ros.co.nz/pdf) verwendet, je
nachdem, ob die "PDFLib PECL" Extension vorhanden ist.

Im Constructor der Klasse, in der DomPDF verwendet werden soll, kann folgender
Code zum Laden der Lib eingebunden werden:
    require_once 'Symmetrics/dompdf/dompdf_config.inc.php';
    spl_autoload_unregister(array(Varien_Autoload::instance(), 'autoload'));
    spl_autoload_register('DOMPDF_autoload');
    Varien_Autoload::register();
Hierbei wird der Autoloader so erweitert, dass die DomPDF Klassen korrekt
geladen werden können.

Die Ausgabe erfolgt z.B. über
    $dompdf = new DOMPDF();
    $dompdf->set_paper('a4', 'landscape');
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream('filename.pdf');

Wobei $html den HTML Sourcecode enthält.

Hierbei muss sehr vorsichtig vorgegangen werden, da eine Modifikation
des Autoloaders potentiell sehr Fehleranfällig ist.

In der dompdf_config.inc.php lassen sich diverse Einstellungen vornehmen, die
aber mit Standardwerten gefüllt sind und nicht modifiziert werden müssen.
Die Einzige notwendige Änderung dieser Werte geschieht mit o.g. Source-Code,
welche den Pfad des Font-Caches ändert,
dessen Verzeichnis über das Migrationsskript angelegt wird.

Eine genaue technische Dokumentation lässt sich unter folgendem Link finden:
http://www.digitaljunkies.ca/dompdf/usage.php
Außerdem gibt es eine API Dokumentation unter folgender URL:
http://www.digitaljunkies.ca/dompdf/doc/

** PROBLEMS
Verschachtelte Tabellen funktionieren nicht (zuverlässig).
Geordnete Listen werden nicht unterstützt (<ol>).
Absolute+relative Positionierung funktioniert noch nicht.
Nicht sehr fehler-tolerant für invaliden HTML Sourcecode.
Große Dateien können eine Weile brauchen zum rendern.
Große Dateien brauchen viel Arbeitsspeicher.

* TESTCASES
** BASIC
*** A:  Die Bibliothek lässt sich alleine nicht testen.
        1. Am einfachsten ist es, die Testcases von einem der folgenden Module
            durchzugehen, da sie DomPdf verwende:
                symmetrics_module_pdfprinter
                symmetrics_module_reorderlist
        2. Sie können auch den oben geposteten Sourcecode benutzen, um eine
            eigene Implementierung zu schaffen. Sie sollten dann zum Testen
            verschiedene HTML Gerüste übergeben, um sich von der
            Funktionalität zu überzeugen.
*** B: Prüfen Sie, ob das Verzeichnis angelegt wurde und vom Webserver beschreibbar ist.
        Außerdem sollte natürlich keine Fehlermeldung erscheinen, wenn ein PDF mit Schriften
        generiert wird.