��            )   �      �     �     �     �     �  W   �  �   >     �     �          %  1  9     k     |     �  �  �  2   �     �     �     �     �  O   �  $   A	  0   f	  a   �	  _   �	     Y
  �   _
  �   �
  �   �    K  %   O  <   u  (   �     �  �   �    �  '   �  1   �  5     1   9  t  k     �     �  .     4  A  i   v     �     �  2         3  �   O  W     J   \  �   �  �   �     �  �   �    �  �   �                         	                
                                                                                                (pick destination) Add Custom Destination Add Custom Extension Admin Brief description that will be published in the Extension Registry about this extension Choose un-identified destinations on your system to add to the Custom Destination Registry. This will insert the chosen entry into the Custom Destination box above. Conflicting Extensions Custom Applications Custom Destination: %s Custom Destinations Custom Destinations allows you to register your custom destinations that point to custom dialplans and will also 'publish' these destinations as available destinations to other modules. This is an advanced feature and should only be used by knowledgeable users. If you are getting warnings or errors in the notification panel about CUSTOM destinations that are correct, you should include them here. The 'Unknown Destinations' chooser will allow you to choose and insert any such destinations that the registry is not aware of into the Custom Destination field. Custom Extension Custom Extension:  Custom Extensions Custom Extensions provides you with a facility to register any custom extensions or feature codes that you have created in a custom file and FreePBX doesn't otherwise know about them. This allows the Extension Registry to be aware of your own extensions so that it can detect conflicts or report back information about your custom extensions to other modules that may make use of the information. You should not put extensions that you create in the Misc Apps Module as those are not custom. DUPLICATE Extension: This extension already in use Delete Description Destination Quick Pick Edit:  Invalid Destination, must not be blank, must be formatted as: context,exten,pri Invalid Extension, must not be blank Invalid description specified, must not be blank More detailed notes about this destination to help document it. This field is not used elsewhere. More detailed notes about this extension to help document it. This field is not used elsewhere. Notes Registry to add custom extensions and destinations that may be created and used so that the Extensions and Destinations Registry can include these. This is the Custom Destination to be published. It should be formatted exactly as you would put it in a goto statement, with context, exten, priority all included. An example might look like:<br />mycustom-app,s,1 This is the Extension or Feature Code you are using in your dialplan that you want the FreePBX Extension Registry to be aware of. Project-Id-Version: 1.3
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2017-12-07 17:33-0500
PO-Revision-Date: 2015-04-23 16:23+0200
Last-Translator: Yuriy <alliancesko@gmail.com>
Language-Team: Russian <http://weblate.freepbx.org/projects/freepbx/customappsreg/ru_RU/>
Language: ru_RU
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=3; plural=n%10==1 && n%100!=11 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2;
X-Generator: Weblate 2.2-dev
 (выбрать назначение) Добавить специальное назначение Добавить Особый номер Администратор Короткое описание этого номера, которое будет использоваться в Регистре номеров Выберите свободный номер назначения для добавления в реестр дополнительных назначений. Выбранный номер будет включен в список дополнительных назначений. Конфликтующие номера Дополнительные приложения Дополнительное назначение :%s Дополнительные назначения Специальное назначение даёт возможность регистрировать специальные сценарии, которые встраиваются в ваш диал план и становятся доступными для перенаправления на них из других модулей. Это такая очень продвинутая опция, и может использоваться только опытными пользователями, которые понимают что они хотят сделать. Если видны предупреждения или сообщения в панели состояния системы по поводу CUSTOM направлений, то всё в порядке, вы должны ими просто пользоваться. Выбор терминации звонка в сценариях входящей маршрутизации будет выглядеть как 'Custom Applications' где созданный контекст можно выбрать в 'Установить направление'. Особый Номер Особый номер:  Особые внутренние номера Особые номера помогают регистрировать какие-либо специальные номера донабора, которые создаются в custom файлах, а FreePBX не имеет понятия о них. Это даёт возможность содержать регистр внутренних номеров таким образом, чтобы предотвращать конфликты с одинаковыми номерами (или кодами донабора) и сообщать о них в другие модули, которые могут использовать эту информацию. Вы не должны создавать эти особые номера в модуле Misc Apps так как они будут другими. ДУБЛИКАТ внутреннего номера: этот номер уже используется Удалить Описание Назначение Бытрый Перехват Редактировать: Неверное назначение, не должно быть пустым, и должно быть в формате: контекст, экстеншен, приоритет Неверный внутренний номер, не может быть пустым Неверное описание. Не должно быть пустым Более детальные замечания, которые помогут документировать эти назначения, когда их много. Это поле больше нигде не используется. Более детальные примечания об этом номере, которое поможет документировать записи, когда их много. Это поле больше нигде не используется. Примечания Реестр особых внутренних номеров и дополнительных назначений, который может включаться в реестры внутренних номеров и назначений. Это объявление использования Специального назначения. При создании необходимо указывать контекст, внутренний номер и приоритет. Например:<br />mycustom-app,s,1 Это Особый номер или код донабора, который будет использоваться в вашем диал плане, для учета его в общем Регистре номеров FreePBX. 