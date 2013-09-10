###**RWIS: Shortcode für Wordpress**

Zum Einbinden des Relive Webplayers in Wordpress kann der RWIS Shortcode genutzt werden. Dieser hat nach den Angaben der API, sämtliche Einstellungen zum Designen und anpassen des Players. <br><br> <span style="color:#f00;">Bitte beachte das der Player noch in der Entwicklungsphase ist, so können sich einige Angaben noch ändern!</span>

<pre>
/**
* @Shortcode: RWIS - Relive Webplayer Iframe Shortcode
* @info: Shortcode zum Einbinden des Relive WebPlayers 
*        in eine Wordpress Seite
* @developer: Michael McCouman jr.
* @version: 1.5 iframe shortcode
*/
</pre>


###Installation

1. Lade dir das die Widget (*.Zip) Datei herunter

2. Entpacken und Inhalt über FTP auf deinen Server
<code>.../worpdress/wp-content/plugins/</code>

3. Plugin Registrieren

###Anwenden

Du kannst nach dem registrieren unter "Plugins" den Shortcode in ein Artikel oder Postbeitrag anwenden. Zum auswählen des Streams nutzen den folgenden Code:

<code>[relive-radio stream="mix"]</code>

* mix 
* mix-mobile
* technik
* technik-mobile
* kultur 
* kultur-mobile

<img src="http://dev.wikibyte.org/ReliveRadio/img/mix.png"/>



####**Anzahl der Liste**

Du kannst die Anzahl der angezeigten Podcasts in der Liste beeinflussen, diese zeigt Informationen der gerade gesendeten Podcast Episode, mit Podcastnamen, Episoden Title & Links, wie auch die kommenden Sendungen an:

<span style="color:#f00;"><b>Achtung!</b> Diese Funktion ist noch in Planung und noch nicht verfügbar!</span>

**Beispiel:**

<code>[relive-radio ... liste="5"]</code>



####**Relive Style**

Du kannst deinen Relive Webplayer auch den typischen Relive Style zum richtigen Stream verpassen:

* mix (grün)
* technik (blau)
* kultur (orange)

**Beispiel:**

<code>[relive-radio ... style="mix"]</code>


####**Eigene Farbe**

Du kannst deinen Player auch eine eigene Farbe, passend zu deinem Theme geben. Gebe hierzu einfach einen Farbecode ein. <i>Bitte beachte das du <u>keine</u> # benötigst</i>: 

**Beispiel:**

<code>[relive-radio ... color="f00"]</code>

####**Fixieren**

Du kannst deinen WebPlayer fixieren, wenn dieser nicht exakt angezeigt wird. Nutze dabei die folgende Angaben:

* Links <code>l="XXpx"</code>
* Rechts <code>r="XXpx"</code>
* Hoch <code>t="XXpx"</code>
* Runter <code>b="XXpx"</code>

**Beispiel:**

Links:
	
	l="-10px"
	
Rechts:
	
	r="-10px"
	
Hoch:
	
	t="-20px" 
	
Runter:
	
	b="-50px"
	
	
**Shortcode:**

<code>[relive-radio ... l="-10px" r="-10px" t="-20px" b="-50px"]</code>

	
####**Ausrichtung**
	
Zum ausrichten des Players, kannst du die folgenden 2 Angaben nutzen:

* Höhe <code>height="XXX"</code>
* Breite <code>width="XXX%"</code>

**Beispiel:**

Höhe:
	
	height="560"
	
Breite: 

	width="99%"
	
**Shortcode:**

<code>[relive-radio ... height="560" width="99%"]</code>


**Alle Teile - Beispiel:**

Hier also noch einmal der gesamte Shortcode mit allen Angaben und Möglichkeiten in einer Übersicht:

	[relive-radio 
	stream="mix" 
	style="mix" 
	color="f00" 
	l="-10px" 
	r="-10px" 
	t="-20px" 
	b="-50px" 
	height="560" 
	width="99%"]
