###**RWIW: Relive in Wordpress einbinden:**

Zum Einbinden des Relive Webplayers in Wordpress, kann der Widget für den Miniplayer genutzt werden. <br><br>Downloade dir die aktuelle Version des Widgets oder füge den Code zum erstellen eines Wordpress Widget in die ''function.php'' deines Themes ein.

<pre>
/**
* @Widget: RWIW - Relive Webplayer Iframe Widget
* @info: Widget zum Einbinden des Relive Mini WebPlayers in die Wordpress Sidebar
* @developer: Michael McCouman jr.
* @version: 1.0.5 iframe widget
*/
</pre>


###Installation

1. Lade dir das die Widget (*.Zip) Datei herunter

2. Entpacken und Inhalt über FTP auf deinen Server
<code>.../worpdress/wp-content/plugins/</code>

3. gehe unter: 
<i>Design <small style>-></small> Widgets <small>-></small> ReliveRadio Miniplayer</i>


###Konfiguration

Suchen dir einen Stream aus und schon wird der ReliveRadio Miniplayer in deiner Sidebar angezeigt


* Wähle einen Stream aus, zwischen: <i>mix, mix-mobile, technik, technik-mobile, kultur, kultur-mobile</i>
* du kannst einen der Styles von Relive Radio wählen
* oder eine eigene Farbe angeben


<img src="http://dev.wikibyte.org/ReliveRadio/img/mix-widget.png"/>



####**Fixieren**

Du kannst deinen Player fixieren, wenn dieser nix exakt sitzt. Nutze dabei die folgenden Felder:

* Links
* Rechts
* Hoch
* Runter

**Beispiel:**

Links:
	
	-10px
	
Rechts:
	
	0
	
Hoch:
	
	-5px
	
Runter:
	
	0
	
####**Ausrichtung**
	
Die Einbindung des Players erfolgt über iFrames. Je nach Design kann es unterschiede bei der Darstellung geben. Um diese anzupassen, kannst die folgenden 2 Felder nutzen:

* Höhe
* Breite

**Beispiel:**

Höhe:
	
	112
	
Breite: 

	107%
<br>