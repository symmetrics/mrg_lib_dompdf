* DOCUMENTATION

** INSTALLATION
Extrahieren Sie den Inhalt dieses Archivs in Ihr Magento Verzeichnis.

** USAGE
Konvertiert HTML Sourcecode zu PDF Dateien.
Im Constructor der Klasse kann folgender Code zum Laden der Lib eingebunden
werden:
    require_once 'Symmetrics/dom    pdf/dompdf_config.inc.php';
    spl_autoload_unregister(arra    y(Varien_Autoload::instance(), 'autoload'));
    spl_autoload_register('DOMPD    F_autoload');
    Varien_Autoload::register();
Die Ausgabe erfolgt z.B. über
    $dompdf = new DOMPDF();
    $dompdf->set_paper('a4', 'landscape');
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream('filename.pdf');

Wobei $html den HTML Sourcecode enthält.



** FUNCTIONALITY
*** A: Übergebenes HTML wird in eine PDF Datei konvertiert.
        Eine Beispielimplementierung gibt es z.B. in
        symmetrics_module_pdfprinter
        symmetrics_module_reorderlist

** TECHNICAL
Muss noch analysiert werden.

** PROBLEMS
Verschachtelte Tabellen funktionieren nicht

* TESTCASES
** BASIC
*** A: Gehen Sie die Testcases der beiden o.g. Module durch oder verwenden Sie
        unter USAGE genannten Sourcecode, um ein PDF zu erhalten.