
## Betrachtet den Zusammenhang der Komponenten einer Klasse , ( LCOM )

### Erläuterung:

Zusammenhang der Methoden einer Klasse (LCOM) ist das messen der Abhängigkeiten in einer Klasse.

Das setzt das SOLID Prinzip um.
Der Ideale LCOM ist LCOM = 1.

### Vereinbarung im Team ( LCOM ) : 
???

### Merke:
Halte die Abhängigkeiten der Komponenten in einer Klasse gering

### Beispiel:

	<?php
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

### Auswertung:

In diesem Beispiel haben wir 2 Abhängigkeiten:

    f1() teilt ein Attribute a mit f3(), und f2() und ruft f3()
    f4() teilt ein Attribute b mit f5()

Daraus ergibt sich, das unser Beispiel das LCOM 2 hat.