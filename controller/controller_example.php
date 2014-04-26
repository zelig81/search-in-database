<?php
namespace controller;
class KrugozorModuleAdvertControllerList extends KrugozorModuleAdvertControllerCommon
{
    public function run()
    {
        $this->getView()->loadI18n('Common/General', 'Advert/List');
 
        $this->initTitle();
 
        if (!$this->checkAccess())
        {
            return $this->createNotification()
                        ->setMessage($this->getView()->lang['notification']['forbidden_access'])
                        ->setType('alert')
                        ->setNotificationUrl('/admin/')
                        ->run();
        }
 
        $list = new KrugozorModuleAdvertServiceList
        (
            $this->getRequest(), $this->getMapper('Advert/Advert'), new KrugozorPaginationManager(10, 10, $this->getRequest())
        );
 
        $this->getView()->adverts    = $list->getList();
        $this->getView()->pagination = $list->getPagination();
 
        $this->getView()->id_category = $this->getRequest()->getRequest('id_category');
        $this->getView()->id_user     = $this->getRequest()->getRequest('id_user');
 
        return $this->getView();
    }
}
/*
Данный пример иллюстрирует реальный код контроллера на PHP5 в рамках объектно-ориентированного приложения, построенного по концепции MVC. Здесь контроллер выступает в роли класса с единственным методом run(), который запускает Front-Controller. Цель контроллера — отдать в Представление (View) данные для формирования страницы со списком объявлений (Замечание: контроллер в MVC не предназначен для передачи данных из модели в представление; последнее утверждение является нарушением паттерна).

В начале с помощью метода контроллера getView() программист получает объект Представления (View), который вызывает методы, специфичные для Представления (View): метод loadI18n() с помощью которого в Представление (View) подгружаются файлы интернационализации, а также метод initTitle(), формирующий title HTML-страницы на основе данных, полученных в ходе разбора файлов интернационализации.

Далее через метод контроллера checkAccess() проверяется, имеет ли пользователь доступ к этой странице. Если доступ не разрешён, формируется предупреждение и происходит перенаправление на ресурс «/admin/». Далее инстанцируется Модель (Model), а точнее, один из компонентов модели — сервис Krugozor_Module_Advert_Service_List. Данный класс инкапсулирует логику получения массива объектов моделей на основе различных параметров из объекта запроса Request, а также взаимодействует с объектом пагинации.

После получения данных от сервиса в Представление (View) передается массив моделей adverts, объект пагинации pagination, идентификатор запрошенной в URL-адресе категории id_category и идентификатор пользователя id_user, после чего Представление (View) отдается во Front-Controller для дальнейшего действия (шаблонизации и вывод в выходной поток).

В примере явно видно, что Контроллер представляет собой связующее звено между двумя основными компонентами системы — Моделью (Model) и Представлением (View). Модель ничего «не знает» о Представлении, а Контроллер не содержит в себе какой-либо бизнес-логики.
*/
?>