<?php

	/**
	 * Zeilenmetriken
	 * Halstead - Metriken
	 * zyklomatische Komplexität
	 * Maintainability Index
	 */

	// Ohne Messungen können Auswirkungen durch Änderungen nicht bewertet werden
	// nutzlos ohne Referenz und Grenzwerte

	// * LCOM , 2 , Koppelung der Methoden einer Klasse :
	// * LOC , 27 , alle Codezeilen : 4 bis 400
	// * LLOC , 7 , logischer Code :
	// * CommW ,  , Wertigkeit der Kommentare : 30%
	// * MI , , Wartungs Index : ~ 90

	// CC , 1 , zyklomatische Komplexität : 1 - 4 , 8 - 10 , 11+
	// AC , , eingehende Abhängigkeit anderer Komponenten :
	// EC , , ausgehende Abhängigkeit (Vererbung, Parameter, Exception) :
	// NOC , , Anzahl der Klassen :
	// NOCA , , Anzahl der abstrakten Klassen :
	// NOCC , , Anzahl der konkreten Klassen :
	// NOI , , Anzahl Interface :
	// * Bugs , , erwartete Anzahl von Fehlern :

	// Länge einer Funktion / Methode : 4 - 40 Zeilen

	class Example {
	    private $a;
	    private $b;

	    public function f1() {
	        $this->a = 1;
	    }

	    public function f2() {
	        $this->f3();
	    }

	    public function f3() {
	        $this->a = 2;
	    }

	    public function f4() {
	        $this->b = 3;
	    }

	    public function f5() {
	        $this->b = 4;
	    }

	}