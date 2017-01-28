
## 1 Zweck und Herkunft
Die Halstead-Komplexitätsmetriken wurden durch Maurice Halstead als quantitatives Maß für die Komplexität entwickelt. Sie basieren direkt auf der Anzahl der Operatoren und Operanden in einem Modul. Die Halstead-Metriken zählen zu den ältesten Softwaremetriken. Sie wurden bereits **1977** eingeführt und sind seither intensiv genutzt und verifiziert worden. Da sie im direkten Zusammenhang zum Programmcode stehen, werden sie oft als Metrik zur Messung der Wartbarkeit eingesetzt. Die Halstead-Messungen sind auch nützlich, um die Codequalität bereits während der Entwicklungsphase positiv zu gestalten.

## 2 Anzahl der Operatoren und Operanden
Die Halstead-Metriken betrachten den Quellcode als eine Aufeinanderfolge von Operatoren und Operanden.

Sie zählen

    die Anzahl der verschiedenen Operatoren (n1)
    die Anzahl der verschiedenen Operanden (n2)
    die Gesamtanzahl der Operatoren (N1)
    die Gesamtanzahl der Operanden (N2).

Alle anderen Halstead-Maße werden von diesen vier Werten mit Hilfe der **unten beschriebenen Formeln** abgeleitet.

### 2.1 Operanden
Zeichen der folgenden Kategorien werden von Testwell CMT++ und CMTJava als Operanden gezählt:
IDENTIFIER   alle Identifier, die keine reservierten Wörter sind
TYPENAME
TYPESPEC   (type specifiers) Reservierte Wörter, die Typen spezifizieren: bool, char, double, float, int, long, short, signed, unsigned, void. Hierzu gehöhren auch einige kompilerspezifische nichtstandardisiert Keywörter.
CONSTANT   Zeichenkonstanten, numerische oder String-Konstanten.

### 2.2 Operatoren
Alle Zeichen der folgenden Kategorien werden durch Testwell CMT++ und CMTJava als Operatoren gezählt (die Zeichen asm und this werden jedoch als Operanden gezählt) :
SCSPEC   (storage class specifiers) Reservierte Wörter, die Speicherklassen beschreiben: auto, extern, inlin, register, static, typedef, virtual, mtuable.
TYPE_QUAL   (type qualifiers) Reservierte Wörter, die Typen qualifizieren: const, friend, volatile.
RESERVED   Andere reservierte Wörter der C++ Programmiersprache: asm, break, case, class, continue, default, delete, do, else, enum, for, goto, if, new, operator, private, protected, public, return, sizeof, struct, switch, this, union, while, namespace, using, try, catch, throw, const_cast, static_cast, dynamic_cast, reinterpret_cast, typeid, template, explicit, true, false, typename. Diese Kategorie beinhaltet auch einige kompilerspezifische (und nicht standardisierte) Keywords.
OPERATOR   die folgenden Zeichen: !   !=   %   %=   &   &&   ||   &=   ( )   *   *=   +   ++   +=   ,   -   --   -=   ->   .   ...   /   /=   :   ::   <   <<   <<=   <=   =   ==   >   >=   >>   >>=   ?   [ ]   ^   ^=   {   }   |   |=   ~
Die folgenden Kontrollstrukturen case ...:   for (...)   if (...)   seitch (...)   while for (...)   und catch (...)   werden in einer besonderen Weise behandelt.
Der Doppelpunkt und die Klammern werden als Teil des Konstrukts betrachtet. Case und der Doppelpunkt oder for (...)   if (...)   switch (...)   while for (...)   und catch (...)   sowie die Klammern werden zusammen als ein Operator gezählt.

### 2.3 Andere
OPERATOR   Die in /* und */ oder // eingeschlossenen Kommentare und newline gehöhren nicht zu den C++ Zeichen, werden aber durch Testwell CMT++ gezählt.

### 3.1 Programmlänge ( Length )
Die Programmlänge (program length, N) ist die Summe der Gesamtzahl aller Operatoren und Operanden eines Programms:
        N = N1 + N2

### 3.2 Vokabulargröße ( Vocabulary )
Die Vokabulargröße (vocabulary size, n) erhält man durch die Addition der Anzahl der verschiedenen Operatoren und Operanden:
        n = n1 + n2

### 3.3 Volumen des Programms ( Volume )
Das Volumen des Programm (program volume, V) gibt den Informationsgehalt der Software gemessen in mathematischen Bits an. Man erhält das Volumen, wenn man die Programmlänge mit dem Zweierlogaritmus der Vokabulargröße (n) multipliziert:
        V = N * log2(n)

Halsteads Volumen (V) beschreibt die Größe der Implementation. Die Berechnung erfolgt mit Hilfe der Anzahl der ausgeführten Operationen und der Bearbeiteten Operanden im Algorithmus. Der Wert V ist daher im Vergleich zu den Zeilenmetriken weniger vom Code-Layout abhängig.

Das Volumen einer Funktion sollte mindestens 20 und höchstens 1000 betragen. Eine parameterlose Funktion, die aus einer nicht leeren Zeile besteht beträgt etwa 20. Wenn das Volumen den Wert von 1000 übersteigt, macht die Funktion wahrscheinlich zu viele Dinge.

Das Volumen einer Datei sollte zwischen 100 und höchstens 8000 liegen. Diese Grenzwerte basieren auf Volumen, deren LOCpro und v(G) nahe der empfohlenen Limits liegen. Sie können daher zur doppelten Kontrolle dienen.



### 3.4 Schwierigkeitsgrad (D)
Der Schwierigkeitsgrad (difficulty level, D) oder Fehlerneigung eines Programms ist proportional zur Anzahl verschiedenen Operatoren in diesem Programm.
D ist ebenfalls proportional zum Verhältnis zwischen der Gesamtanzahl der Operatoren und der Anzahl der verschiedenen Operanden. Wird der gleiche Operand beispielsweise mehrmals im Programm benutzt, wird er dadurch fehleranfälliger.
        D = ( n1 / 2 ) * ( N2 / n2 )

### 3.5 Programmniveau/Program level (L)
Durch den Kehrwert des Schwierigkeitsgrades erhält man das Programmniveau.
Ein Programm mit einem niedrigen Niveau ist relativ anfällig für Fehler.
        L = 1 / D

### 3.6 Implementieraufwand/Effort to implement (E)
Der Implementieraufwand (Effort to implement, E) ist proportional zum Volumen und zum Schwierigkeitsgrad des Programms.
        E = V * D

### 3.7 Implementierzeit/Time to implement (T)
Die Implementierzeit (T) und die Zeit, die notwendig ist ein Programm zu verstehen, ist proportional zum Implementieraufwand (Effort to implement). Empirische Untersuchungen haben ergeben, daß man eine guten Wert für die notwendige Zeit in Sekunden erhält, wenn man den Implementieraufwand (E) durch 18 teilt.

        T = E / 18

### 3.8 Anzahl der ausgelieferten Bugs (B)
Anzahl der ausgelieferten Bugs (B) korreliert mit der Komplexität der Software.
Halstead gibt für die Berechnung von B die folgende Formel:
        B = ( E ** (2/3) ) / 3000         ** steht für den Exponenten

"Halsteads delivered Bugs" (B) ist eine Schätzung für die Anzahl der Fehler in der Implementation.
Die Anzahl der ausgelieferten Bugs einer Datei sollte unter 2 liegen. Aus Erfahrungen weiß man, dass C oder C++ Quellcode meist sogar mehr Bugs enthält als der Wert B angibt. Die Anzahl der Defekte neigt leider dazu, schneller zu wachsen als B.

B ist die wichtigste Halstead-Metrik für den dynamischen Test von Software. Beim Softwaretest sollte man mindestens so viele Fehler im Modul finden wie die Metrik B angibt.