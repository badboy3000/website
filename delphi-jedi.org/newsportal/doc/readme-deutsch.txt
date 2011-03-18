
                                News Portal
                                      
   Version 0.24pre6
   
Einleitung

   Newsportal ist ein PHP-Basierter Newsreader. Es steht unter der GNU
   Public License (siehe beiliegende LICENSE).
   
�berblick

   Diese Skriptsammlung erm�glicht von einer Webseite aus den Zugriff auf
   einen Newsserver (per NNTP). Man kann damit Webforen und Newsgruppen
   verbinden, so da� auf ein "Webforum" auch per NNTP zugegriffen werden
   kann. Dieses Skript eignet sich auch f�r die Pr�sentation von
   Announce-Newsgruppen auf Webseiten, ohne da� der Benutzer merkt, da�
   er in Wirklichkeit auf einen Newsserver zugreift.
   
   Die eigentliche Funktionalit�ts des Skripts liegt in der Datei
   newsportal.php, in der die meisten php-Funktionen untergebracht sind.
   Zus�tzlich gibt es vier weitere php-Dateien, auf die direkt mit dem
   Browser zugegriffen wird:
     * index.php zeigt die auf dem Newsserver verf�gbaren Newsgruppen an
       (sofern sie auch in die Datei groups.txt eingetragen sind).
     * thread.php zeigt die Artikel in einer Newsgruppe an.
     * article.php zeigt einen einzelnen Artikel an.
     * post.php schreibt eine Nachricht in die passende Newsgruppe.
     * attachment.php zeit m�gliche Attachments an.
       
   Neben dan Dateien, auf die direkt zugegriffen wird, gibt es eine Zahl
   weiterer Dateien, die das Verhalten von Newsportal steuern oder
   wichtige Daten enthalten:
     * config.inc enth�lt die Einstellungen
     * head.inc enth�lt den Kopf jeder von Newsportal ausgegebenen Seite,
       wie den HTML-title und das Body-Tag mit den Farbeinstellungen f�r
       die Webseiten.
     * tail.inc enth�lt das Ende jeder generierten Seite.
     * deutsch.lang: Die deutschen Sprachdefinitionen
     * english.lang: Die englischen Sprachdefinitionen
       
   Da das Abfragen der Artikel�bersicht vom Newsserver viel Zeit
   beansprucht, werden diese Dateien im Verzeichnis spool/
   zwischengespeichert. Die Dateien dort drin k�nnen nach belieben
   gel�scht werden, sie werden bei Bedarf neu angelegt.
   
Installation:

    1. Das Archiv in ein Verzeichnis entpacken.
    2. Die Datei config.inc mu� angepasst werden (f�r einen Schnellstart
       m�ssen $server, $port, $title und gegebenenfalls $readonly
       ver�ndert werden).
    3. In die Datei groups.txt werden alle Newsgruppen eingetragen, die
       Newsportal anzeigen soll. Optional kann man hinter den
       Gruppennamen von einem Leerzeichen getrennt eine Beschreibung
       eintragen, die dann von der index.php3 angezeigt wird. Fehlt
       diese, wird die Beschreibung vom Newsserver angefordert.
    4. Das Verzeichnis spool mu� mit "chmod 777 spool" f�r jeden les- und
       schreibbar gemacht werden. Nach einem Update kann es passieren,
       da� das Skript ohne das L�schen aller Dateien in diesem
       Verzeichnis nicht funktioniert. Das kommt aber darauf an, ob ich
       das Format dieser Dateien ge�ndert habe. NewsPortal erkennt
       normalerweise fehlerhafte Spooldateien und l�scht sie
       gegebenenfalls.
    5. In der Datei head.inc den Zeichensatz anpassen, falls man sich
       nicht in Westeuropa oder den USA befindet, wo die Voreinstellung
       von iso-8859-1 richtig ist.
       
Konfiguration

   Folgende Einstellungen k�nnen in der config.inc vorgenommen werden:
   
   Verzeichnisse und Dateien:
     * $file_newsportal="newsportal.php": Name des newsportal-Skripts
     * $file_groups="index.php": Die Gruppen�bersicht
     * $file_thread="thread.php": Die Artikel�bersicht
     * $file_article="article.php": Zeigt den Artikel an
     * $file_post="post.php": einen Artikel schreiben. Die Datei kann
       entfernt werden, wenn das System auf readonly gesetzt ist (siehe
       unten)
     * $file_language="deutsch.lang": Verweis auf die
       Sprachdefinitionsdatei.
     * $file_footer: Hier kann Optional der Name einer Datei angegeben
       werden, die an jede �ber Newsportal verschickte Nachricht
       angeh�ngt wird.
       
   Servereinstellungen
     * $server: Adresse des Newsservers
     * $port: Port des Newsservers, normalerweise 119
     * $post_server: Optional kann hier f�r das Schreiben von Artikeln
       ein eigener Server angegeben werden. Es ist dann nat�rlich so, da�
       ein Artikel eine Zeit braucht, bis er vom $post_server zum $server
       gelangt ist.
     * $post_port: Port des Post-Newsservers, normalerweise 119
     * $maxfetch: Hier wird die maximal bei einem Aufruf von thread.php3
       vom Newsserver anzufordernden Artikel�bersichten beschr�nkt. Auf
       "0" gesetzt werden so viele Artikel angefordert, wie neu zur
       Verf�gung stehen, jede andere Nummer legt die Maximalanzahl fest.
       Diese Option sollte nur dann auf etwas anderes als 0 gesetzt
       werden, wenn es Probleme mit der Geschwindigkeit gibt.
     * $initialfetch: Bei einem Neuaufbau der Overview-Spooldatei wird
       statt $maxfech viele Artikel maximal $initialfetch viele Artikel
       abgeholt. Bei "0" ist es auch ungeschr�nkt.
     * $server_auth_user: Falls der Newsserver durch Name und Passwort
       gsch�tzt wird, kann hier der Username angegeben werden. Ansonsten
       einfach die Variable auf "" setzen.
     * $server_auth_pass: Hier wird das zum Usernamen passende Passwort
       angegeben.
       
   Threaddarstellung
     * $treestyle: Setzt das Aussehen des Nachrichtenbaums.
          + 0: Einfache Auflistung der Artikel
          + 1: Einfache Auflistung der Artikel, jedoch als
            HTML-Auflistung
          + 2: Einfache Auflistung in Tabellenform
          + 3: Thread mit HTML-Auflistungen
          + 4: Thread aus Textzeichen
          + 5: Thread auf Graphikelementen
          + 6: Thread aus Textzeichen mit Tabelle
          + 7: Thread aus Grafikzeichen mit Tabelle
     * $thread_fontPre: Der Inhalt dieser Variable wird vor Texten in der
       Threadansicht ausgegeben. Diese Variable ist gedacht um z.B. die
       Textgr��e der Texte zu �ndern. Standardm�� wird dort der Font
       klein gestellt. Das ist bei alle Threadstyles sinnvoll, wo mit
       Tabellen gearbeitet wird, bei allen anderen ist es sch�ner die
       Variable auf einen leeren String zu setzen.
     * $thread_fontPost: Das gleiche wie $thread_fontPre, nur da� dieser
       String nach Textausgaben ausgegeben wird.
     * $thread_showDate,
       $thread_showSubject,
       $thread_showAuthor:
          + true: das Datum / das Subject / der Autor wird im Artikelbaum
            angezeigt
          + false: Darstellung wird unterdr�ckt.
     * $thread_maxSubject: Anzahl der Zeichen, die vom Subject in der
       Artikel�bersicht angezeigt werden.
     * $maxarticles: Gibt die Anzahl der Artikel an, die maximal im
       Artikelbam angezeigt werden. "0" bedeutet keine Beschr�nkung. Es
       werden immer die letzten x Artikel angezeigt, wo wie sie auf dem
       Newsserver liegen. Das mu� nicht unbedingt mit dem Erstelldatum
       des Artikels �bereinstimmen.
     * $maxarticles_extra: Das Problem beim Betrieb mit $maxarticles ist,
       da� alle Artikeldaten vom Newsserver komplett neu angefordert
       werden m�ssen, wenn der angegebene Wert �berschritten worden ist.
       Damit dies nicht ganz so oft vorkommt, kann $maxarticles_extra
       gesetzt werden. Dann wird die Artikeldatenbank erst neu aufgebaut,
       wenn $maxarticles + $maxarticles_extra Artikel vorliegen, wobei
       dann $maxarticles viele Artikeldaten angefordert werden. Wenn man
       mit $maxarticles arbeitet, weil die Newsgruppen zu gro� sind,
       sollte man unbedingt immer auch mit $maxarticles_extra arbeiten.
       Der Wert sollte etwa 20% von $maxarticles betragen. Nur dann, wenn
       man wirklich eine ganz genau vorgegebene Anzahl von Artikeln auf
       einer Webseite anzeigen will, sollte man hier den Wert auf Null
       setzen.
     * $age_count: Anzahl der verschiedenen Altersstufen f�r die
       farbliche Markierung von Artikeln
     * $age_time[n]: maximales Alter eines Artikels in Sekunden, so da�
       der Artikel mit der Farbe $age_color[n] markiert wird. n ist eine
       nat�rliche Zahl >= 1, wobei alle Zahlen von 1 bis n vergeben sein
       m�ssen, L�cken sind also nicht erlaubt.
     * $age_color[n]: Die Farbe, mit dem der Artikel markiert wird
     * $thread_sorting: Die Sortierreihenfolge f�r die Artikel:
          + 0: Keine Sortierung, die Artikel werden in der Reihenfolge
            angezeigt, in der sie vom Newsserver kommen.
          + 1: aufsteigende Sortierung, die �ltesten Artikel zu oberst
          + -1: absteigende Sortierung, die neusten Artikel zu oberst
       Es ist zu beachten, da� die Artikel in einer Baumstruktur
       angezeigt werden, so da� der oberste Artikel eines Teilbaums immer
       den Ausschlag gibt.
     * $articles_per_page: Ist dieser Wert ungleich 0, so gibt er die
       Anzahl der Artikel an, die auf einer Seite gleichzeitig angezeigt
       werden sollen. Es gibt dann Links um die einzelnen Seiten zu
       wechseln. Benutzt man diese Option, so sollte man $maxarticles
       beachten: Diese Variable gibt n�mlich auch an, wieviele Artikel in
       den Spooldateien gespeichert werden, sa da� ein zu hoher Wert
       trotz Seiteneinteilung die Geschwindigkeit herabsetzen kann.
     * $startpage: In Verbindung mit $articles_per_page wird hier
       angegeben, welche Seite bei Aufruf des Threads angezeigt werden
       soll:
          + "first": zeigt zuerst die erste Seite an.
          + "last": zeigt die letzte Seite an.
       Die Angabe sollte mit $thread_sorting abgestimmt werden. "first"
       f�r 0 und 1, und "last" f�r -1.
       
   Artikeldarstellung
     * $article_show["Subject"],
       $article_show["From"],
       $article_show["Newsgroups"],
       $article_show["Organization"],
       $article_show["Date"],
       $article_show["Message-ID"],
       $article_show["User-Agent"],
       $article_show["References"]: Bei "true" wird die jeweilige
       Headerzeile in der Artikelansicht angezeigt, bei "false" wird sie
       unterdr�ckt. Momentan ist die Ansicht weiterer Headerzeilen nicht
       m�glich.
       
   Attachments
     * $attachment_show: true oder false, je nochdem ob die Dekodierung
       von Attachments unterst�tzt werden soll. Ist sie deaktiviert,
       werden die m�glichen Attachments im Rohformat angezeigt.
     * $attachment_delete_alternative: true oder false. Wenn ein Artikel
       mehr als einen Body in verschiedenen Formaten hat (multipart
       alternative), dann werden alle �berfl�ssigen Alternativen
       verworfen.
     * $attachment_uudecode: true oder false. Aktiviert die Dekodierung
       von uuencoded Attachments. Momentan sehr langsam und fehlerhaft.
       
   Frameunterst�tzung
   Beispieldateien f�r die Frameunterst�tzung liegen in extras/frames/.
   In dieser Sektion werden die targets f�r diverse Links definiert, also
   in welchem Frame welche Webseite dargestellt werden soll. In der
   config.inc mu� statt "thread.php3" "thread_frameset.php3" eingetragen
   werden.
     * $frame_article: Name des Artikel-Frames. Mu� mit dem Namen in
       thread_frameset.php3 �bereinstimmen
     * $frame_thread: Name des Thread-Frames;
     * $frame_groups: Name des Frames f�r die Gruppen�bersicht,
       normalerweise "_top".
     * $frame_post: Name des Schreiben-Frames
     * $frame_threadframeset: Frame, in dem der Frameset erscheinen soll,
       der den Artikel- und Thread-Frame aufnimmt. Normalerweise "_top".
     * $frame_externallink: Zielframe f�r extrerne Links innerhalb von
       Artikeln
       
   Sicherheitseinstellungen
     * $send_poster_host: bei "true" wird bei jeder geschriebenen
       Nachricht noch die Zeile "X-HTTP-Posting-Host: " in den Header
       geschrieben, und der Name des Rechners eingetragen, der die
       Nachricht abgeschickt ist. Das kann als Ersatz von
       "NNTP-Posting-Host" angesehen werden, dessen Wert beim Einsatz von
       Newsportal immer nur den Namen des Webservers anzeigt.
     * $readonly: wenn auf "true" gesetzt, kann man keine Artikel in
       Gruppen schreiben.
     * $testgroup: auf "true" gesetzt wird beim Anzeigen des Threads
       �berpr�ft, ob betreffende Gruppe in die "groups.txt" eingetragen
       ist. Andernfalls k�nnte man �ber das direkte Eintragen der
       richtigen URL eine Gruppe einsehen, obwohl diese nicht in der
       Gruppen�bersicht angezeigt wird.
     * $validate_email: Hier kann eingestellt werden, wie Newsportal beim
       Posten eine angegebene eMail-Adresse auf richtigkeit pr�ft:
          + 0: keine �berpr�fung. Ist nicht zu empfehlen, da
            normalerweise der Newsserver eine Fehlermeldung liefert, wenn
            die Adresse syntaktisch Falsch ist.
          + 1: �:berpr�ft die Adresse auf syntaktische Richtigkeit.
          + 2: hier wird zus�tzlich �berpr�ft, ob zu der angegebenen
            Domain ein MX oder A Record existiert.
       
   Allgemeines
     * $title: Name des Systems, wird als �berschrift verwendet
     * $organization: Die Organisation f�r den NNTP-Header beim Schreiben
       von Nachrichten
     * $setcookies: Erlaubt dem Benutzer, seinen Namen und seine
       eMail-Adresse beim schreiben eines Artikels als Cookie
       abzuspeichern, so da� die Daten beim erneuten Schreiben eines
       Artikels automatisch eingesetzt werden.
     * $compress_spoolfiles: Hier kann eingestellt werden, ob die
       Spooldateien komprimiert werden sollen. Dies ist im Normalfall
       empfohlen, da auf etwa 10 bis 15% der Originalgr��e komprimiert
       wird. Bei aelteren PHP-Versionen mu� man diese Variable jedoch auf
       false setzen, falls diese Kompression noch nicht unterst�tzen.
       
Sicherheitshinweise

   Ein paar Kleinigkeiten m��en beachtet werden, damit NewsPortal nicht
   zu einem Sicherheitsloch werden soll:
     * Zu Debugzwecken wird immer der User-Agent in der Artikelansicht
       mit�bermittelt, wenn die Anzeige ($article_show["User-Agent"])
       abgeschaltet ist, ist der Eintrag lediglich unsichtbar.
     * Die config.inc kann solange von jedem Websurfer (der den
       Dateinamen kennt) abgerufen werden, wie die Datei nicht in einen
       gesch�tzten Bereich des Webservers verschoben worden ist.
       
   Dieses Skript ist nur f�r den Zugriff auf lokale Newsgruppen gedacht.
   Wenn Gruppen des UseNet im Web verf�gbar sind, ergeben sich folgende
   Probleme:
     * Spammer k�nnen anonym ($send_poster_host beachten!) Artikel
       abschicken
     * Es gibt im Internet Listen mit sogenannten "offenen" Newsservern.
       Offen hei�t hier meist nicht, da� die jeder benutzen darf, sondern
       da� diese einfach nur nicht ordentlich gesichert worden sind.
       Bevor Du also einen solchen Newsserver benutzt, solltest Du Dich
       vergewissern, da� der Betreiber nichts gegen Dein Vorhaben
       einzuwenden hat.
     * Es wird im UseNet oft nicht gerne gesehen, wenn Personen anonym in
       Newsgruppen schreiben k�nnen. Bevor Du also schreibenden Zugriff
       auf eine Newsgruppe erlaubst, solltest Du in der betreffenden
       Gruppe nachfragen, ob es dort keine Einw�nde gibt. Etwas anderes
       ist es nat�rlich, wenn Du NewsPortal in einem gesch�tzten Bereich
       Deines Webservers betreibst, auf den nur eine Dir bekannte
       Benutzergruppe zugreifen kann. Gib keinen �ffentlichen
       Schreibzugriff auf UseNet Newsgruppen, wenn Du nicht ganz genau
       wei�t, was Du tust!
       
   Die Benutzung des Skripts erfolgt auf eigene Gefahr!
   
Kompatiblit�t

   Sollte auf jedem PHP4-F�higen Webserver zusammen mit jedem
   NNRP-f�higen Newsserver laufen. Webserver und Newsserver m��en nicht
   auf der selben Maschine laufen.
   
Kontakt:

   Florian Amrhein
   eMail: florian.amrhein@web.de
   WWW: http://florian-amrhein.de
