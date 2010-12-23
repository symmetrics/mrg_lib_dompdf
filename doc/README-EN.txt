* DOCUMENTATION

** INSTALLATION
Extract content of this archive to your Magento directory.

** USAGE
This module enables the integration of DomPDF library to Magento
for other modules. It converts the HTML source code to PDF files.
This module must only be installed if it is specified as dependency for
another module. 
DomPDF takes into account (mostly) CSS 2.1. It reads external and inline
syte sheets such as style attributes in HTML tags. Besides the most HTML-
formatting tags are supported.
Detailed description of the library can be found here:
http://www.digitaljunkies.ca/dompdf/about.php

** FUNCTIONALITY
*** A: Passed HTML is converted to PDF file.
		An example of implementation is for example in
        symmetrics_module_pdfprinter
        symmetrics_module_reorderlist
*** B: Per migration script a font cache directory is created. The path
        is: [MAGENTO-ROOT]/var/lib/Symmetrics/dompdf/fonts/

** TECHNICAL
The PDF rendering is used with the help of PDFLib (www.pdflib.com) or through
provided version of "R&OS CPDF Klasse" (www.ros.co.nz/pdf), depending on
whether the "PDFLib PECL" extension is available.

In constructor of class where DomPDF should be applied, the following code
can be integrated for loading the lib:
    require_once 'Symmetrics/dompdf/dompdf_config.inc.php';
    spl_autoload_unregister(array(Varien_Autoload::instance(), 'autoload'));
    spl_autoload_register('DOMPDF_autoload');
    Varien_Autoload::register();
Here the autoloader is extended so that the DomPDF classes can be loaded
correctly.

The output is made for example through:
    $dompdf = new DOMPDF();
    $dompdf->set_paper('a4', 'landscape');
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream('filename.pdf');

where $html contains the HTML source code.

Here much care must be taken, as a modification of autoloader is 
potentially very error-prone.

In the dompdf_config.inc.php different settings can be made that are however
filled with default values and must not be changed. The only necessary change
of these values happens with the above mentioned source code, which changes the
path of the font cache, dirctory of which is created through the migration script.

Detailed technical documentation can be found here:
http://www.digitaljunkies.ca/dompdf/usage.php
Besides there is an API documentation at the following URL:
http://www.digitaljunkies.ca/dompdf/doc/

** PROBLEMS
Nested tables do not work (reliably).
Ordered lists are not supported (<ol>).
Absolute+relative positioning does not work yet.
Not very fault-tolerant for individual HTML source code.
Big files can take a while to render.
Big files need much main memory.

* TESTCASES
** BASIC
*** A:  The library can not be tested alone.
        1. The easiest way is to go through the test cases from one of the following modules,
			as they use DomPdf:
                symmetrics_module_pdfprinter
                symmetrics_module_reorderlist
        2. You can also use the above posted source code in order to make
			an own implementation. Then you should pass different HTML structures
			for testing in order to check the functionality.
*** B: Check if the directory has been created and is writable by the web server.
		Besides of course no error message should appear when PDF with fonts is generated.
		