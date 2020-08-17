��    0      �  C         (     )     <     D     [     p     �     �  W   �  �   �     �     �     �     �  1  �          *     =  �  O  2   ;
     n
     u
     �
     �
     �
  ~   �
     0  	   7  O   A  $   �  0   �     �     �  a     _   r     �     �  �   �     o     u      |     �     �  D   �  �   �  �   �  v   H     �  �  �     {     �  $   �  *   �     �     �       _     �   }     V     k     �     �  B  �           "     C  &  c  ?   �     �     �     �     �     �  �   �     �     �  W   �  ,   �  -   +  )   Y     �  i   �  p        u     z  �   �          &     .     M     V  ]   [     �  x   �  �   3     �            (   '      
                              )      *      $      &             0   #                                                    %      -                                  +   ,   !   	              /       .   "              (pick destination) Actions Add Custom Destination Add Custom Extension Add Destination Add Extension Admin Brief description that will be published in the Extension Registry about this extension Choose un-identified destinations on your system to add to the Custom Destination Registry. This will insert the chosen entry into the Custom Destination box above. Conflicting Extensions Custom Applications Custom Destination: %s Custom Destinations Custom Destinations allows you to register your custom destinations that point to custom dialplans and will also 'publish' these destinations as available destinations to other modules. This is an advanced feature and should only be used by knowledgeable users. If you are getting warnings or errors in the notification panel about CUSTOM destinations that are correct, you should include them here. The 'Unknown Destinations' chooser will allow you to choose and insert any such destinations that the registry is not aware of into the Custom Destination field. Custom Extension Custom Extension:  Custom Extensions Custom Extensions provides you with a facility to register any custom extensions or feature codes that you have created in a custom file and FreePBX doesn't otherwise know about them. This allows the Extension Registry to be aware of your own extensions so that it can detect conflicts or report back information about your custom extensions to other modules that may make use of the information. You should not put extensions that you create in the Misc Apps Module as those are not custom. DUPLICATE Extension: This extension already in use Delete Description Destination Destination Quick Pick Destinations Does this destination end with 'Return'? If so, you can then select a subsequent destination after this call flow is complete. Edit:  Extension Invalid Destination, must not be blank, must be formatted as: context,exten,pri Invalid Extension, must not be blank Invalid description specified, must not be blank List Custom Extensions List Destinations More detailed notes about this destination to help document it. This field is not used elsewhere. More detailed notes about this extension to help document it. This field is not used elsewhere. No Notes Registry to add custom extensions and destinations that may be created and used so that the Extensions and Destinations Registry can include these. Reset Return Set the Destination after return Submit Target The entered extension conflicts with another extension on the system This is the Custom Destination to be published. It should be formatted exactly as you would put it in a goto statement, with context, exten, priority all included. An example might look like:<br />mycustom-app,s,1 This is the Extension or Feature Code you are using in your dialplan that you want the FreePBX Extension Registry to be aware of. WARNING: This destination is being used by other module objects. Changing this destination may cause unexpected issue. Yes Project-Id-Version: PACKAGE VERSION
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2017-12-07 17:33-0500
PO-Revision-Date: 2019-04-10 10:38+0000
Last-Translator: florian alberts <alberts@ar-systems.de>
Language-Team: German <http://*/projects/freepbx/customappsreg/de/>
Language: de_DE
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Generator: Weblate 3.0.1
 (Ziel auswählen) Aktionen Benutzerdefiniertes Ziel hinzufügen Benutzerdefinierte Nebenstelle hinzufügen Ziel hinzufügen Nebenstelle hinzufügen Administrator Eine kurze Beschreibung dieser Nebenstelle, die im Nebenstellenverzeichnis veröffentlicht wird Wählen Sie Ziele aus dem Wählplan Ihres Systems (extensions_custom.conf), um sie in den "benutzerdefinierten Zielen" (Custom Destinations] zu registrieren (Registry) und als Abwurf im Callflow verfügbar zu machen. Nebenstellenkonflikt Benutzerdefinierte Anwendungen Benutzerdefiniertes Ziel: %s Benutzerdefinierte Ziele Mit benutzerdefinierten Zielen können Sie Ihre benutzerdefinierten Ziele registrieren, die auf benutzerdefinierte Wählpläne verweisen und diese Ziele auch als veröffentlichte Ziele für andere Module veröffentlichen. Dies ist eine erweiterte Funktion und sollte nur von erfahrenen Benutzern verwendet werden. Wenn Sie Warnungen oder Fehler im Benachrichtungsfenster über benutzerdefinierte Ziele erhalten, die korrekt sind, sollten Sie diese hier einfügen. Mit dem Befehl 'Unbekannte Ziele' können Sie beliebige Ziele festlegen, die der Registrierung nicht bekannt sind. Benutzerdefinierte Nebenstelle Benutzerdefinierte Nebenstelle:  Benutzerdefinierte Nebenstellen Benutzerdefinierte Nebenstellen bieten Ihnen die Möglichkeit, beliebige benutzerdefinierte Nebenstellen oder Featurecodes zu registrieren, die Sie in einer benutzerdefinierte  Datei erstellt haben und von der FreePBX sonst nix weiß. Dies ermöglicht der Nebenstellenregistrierung ihre eigenen Nebenstellen zu kennen, damit Sie Fehler erkennen oder Rückinformationen über Ihre eigenen Nebenstellen an andere Module geben kann. Sie sollten keine Nebenstellen einsetzen, die in Misc Apps Modul erstellt wurden, da diese nicht benutzerdefiniert sind. DUPLIKAT-Nebenstelle: Diese Nebenstelle wird bereits verwendet. Löschen Beschreibung Ziel Ziel-Schnellauswahl Ziele Endet dieses Ziel mit „Zurückkehren“? Falls ja, können Sie ein nachfolgendes Ziel wählen, nachdem dieser Anruffluss abgeschlossen ist. Bearbeiten:  Nebenstelle Ungültiges Ziel, darf nicht leer sein, muss formatiert werden als: context, exten, pri Ungültige Nebenstelle, darf nicht leer sein Ungültige Beschreibung, darf nicht leer sein Benutzerdefinierte Nebenstellen auflisten Nebenstellen auflisten Genauere Angaben zu diesem Ziel. Dieses Feld dient der Dokumentation und wird nirgendwo anders verwendet. Genauere Angaben zu dieser Nebenstelle. Dieses Feld dient der Dokumentation und wird nirgendwo anders verwendet. Nein Notizen Registrierung für das Hinzufügen von benutzerdefinierten Nebenstellen und ~ Zielen, die der Nebenstellen und Zielregistrierung hinzugefügt werden. Zurücksetzen Zurück Ziel nach Rückkehr einstellen Absenden Ziel Die eingegebene Nebenstelle verursacht einen Konflikt mit einer anderen Nebenstelle im System Dies ist das benutzerdefinierte Ziel, welches nutzbar gemacht werden soll. Es muss genau so formatiert sein, wie in einem goto statement; mit Kontext, Nebenstelle und Priorität. Ein Beispiel könnte so aussehen: <br />meinebenutzerdefinierte-Anwendung,s,1 Dies ist die Nebenstelle oder die Funktion aus Ihrem Wählplan, die Sie der FreePBX Registrierung bekannt machen wollen. WARNUNG: Dieses Ziel wird von anderen Modulen verwendet. Eine Änderung des Ziels kann unerwartete Auswirkungen mit sich bringen. Ja 