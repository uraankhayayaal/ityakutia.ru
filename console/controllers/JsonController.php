<?php

namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Json;
use yii\helpers\FileHelper;

class JsonController extends Controller
{
    public $file;
    public $url = 'https://catalog.api.2gis.ru/3.0/items?page_size=50&region_id=50&key=ruoedw9225&fields=request_type%2Citems.contact_groups&';
    public $url_rubric_id = 'https://catalog.api.2gis.ru/2.0/catalog/branch/list?page_size=50&region_id=1&key=ruoedw9225&fields=request_type%2Citems.contact_groups&';
    public $ids = [];

	public function actionIndex()
    {
        $file_names = [
            'ykt_aa_avtoservice_1.json',
            'ykt_aa_avtoservice_2.json',
            'ykt_aa_avtoservice_3.json',
            'ykt_aa_avtoservice_4.json',
            'ykt_aa_avtoservice_5.json',
            'ykt_aa_avtoservice_6.json',
            'ykt_aa_avtoservice_6.json',
            'ykt_aa_consult_1.json',
            'ykt_aa_consult_2.json',
            'ykt_aa_consult_3.json',
            'ykt_aa_consult_4.json',
            'ykt_aa_consult_5.json',
            'ykt_aa_krasota_1.json',
            'ykt_aa_krasota_2.json',
            'ykt_aa_krasota_3.json',
            'ykt_aa_krasota_4.json',
            'ykt_aa_krasota_5.json',
            'ykt_aa_krasota_6.json',
            'ykt_aa_krasota_7.json',
            'ykt_aa_krasota_8.json',
            'ykt_aa_krasota_9.json',
            'ykt_aa_krasota_91.json',
            'ykt_aa_products_1.json',
            'ykt_aa_products_2.json',
            'ykt_aa_products_3.json',
            'ykt_aa_products_4.json',
            'ykt_aa_products_5.json',
            'ykt_aa_products_6.json',
            'ykt_aa_products_7.json',
            'ykt_aa_products_8.json',
            'ykt_aa_products_9.json',
            'ykt_aa_products_91.json',
            'ykt_aa_products_92.json',
            'ykt_aa_products_93.json',
            'ykt_aa_products_94.json',
            'ykt_aa_products_95.json',
            'ykt_aa_products_96.json',
            'ykt_aa_stroy_1.json',
            'ykt_aa_stroy_2.json',
            'ykt_aa_stroy_3.json',
            'ykt_aa_stroy_4.json',
            'ykt_aa_stroy_5.json',
            'ykt_aa_stroy_6.json',
            'ykt_aa_stroy_7.json',
            'ykt_aa_transport_1.json',
            'ykt_aa_transport_2.json',
            'ykt_aa_transport_3.json',
            'ykt_aa_transport_4.json',
        ];
        $this->openCSV();
        foreach ($file_names as $file_name) {
            $this->addKindergartens($file_name);
        }
        $this->closeCSV();
        return ExitCode::OK;
    }

    public function actionQuery()
    {
        $queries = [
            'кондитерские',
            'бары',
            'рестораны',
            'суши%20бары',
            'туризм',
            'транспорт',
            'красота',
            'автосервис',
            'продукты',
            'консалтинг',
            'сторительство',
            'частные детсады',
            'парикмахерские',
            'шиномонтаж',
            'ателье',
            'ремонт%20телефонов',
            'фотостудии',
            'веб%20разработка',
            'услуги%20визажиста',
            'художественные%20мастерские',
            'мебель',
            'солярные%20комнаты',
            'студии%20загара',
            'тату%20салоны',
            'зоо%20магазины',
            'ювелирные%20магазины',
            'химчистки',
            'ремонт%20оборудования',
            'автошколы',
            'языковые%20школы',
            'магазины%20одежды',
            'услуги%20охраны',
            'фастфуд',
            'кондитерские%20изделия',
            'продовольственные%20магазины',
            'полиграфия',
            'услуги',
        ];
        $this->openCSV();
        foreach ($queries as $query) {
            $this->addFromUrl($query);
        }
        $this->closeCSV();
        return ExitCode::OK;
    }

    public function actionRubrics()
    {
        $this->openCSV();
        for ($i=0; $i < 2000; $i++) { 
            $this->addFromID($i);
        }
        $this->closeCSV();
        return ExitCode::OK;
    }

    protected function addKindergartens($file_name){
        $file_path = \Yii::getAlias("@frontend/web/");
        $file = null;
        if($file = file_exists($file_path.$file_name)){
            $file = file_get_contents($file_path.$file_name);
        }else{
            echo "File read fail! \n";
            return ExitCode::OK;
        }
        $data = Json::decode($file);
        if (isset($data['result']['items'])) {

            $data_array = [];
            foreach ($data['result']['items'] as $org) {
                // $uid = substr($org['id'], 0, strpos($org['id'], '_'));
                // $kindergarten = Kindergarten::find()->where(['uid' => $uid])->one();
                // if($kindergarten === null){
                //     $kindergarten = new Kindergarten();

                    
                $phones = '';
                $emails = '';
                if (isset($org['contact_groups'][0]))
                    foreach ($org['contact_groups'][0]['contacts'] as $contact){
                        // website phone vkontakte instagram facebook email
                        // if($contact['type'] == 'website') $kindergarten->web_link = $contact['text'];
                        if($contact['type'] == 'phone') $phones = $phones . (!empty($phones) ? ', ' : '') . $contact['text'];
                        // if($contact['type'] == 'vkontakte') $kindergarten->vk_link = $contact['text'];
                        // if($contact['type'] == 'instagram') $kindergarten->in_link = $contact['text'];
                        if($contact['type'] == 'email') $emails = $emails . (!empty($emails) ? ', ' : '') . $contact['text'];
                    }
                    
                $data_array[] = [$org['name'],$emails,$phones];
            }
            $this->writeCSV($data_array);
        }
    }

    protected function addFromUrl($query, $page = 1){

        //$file = file_get_contents($this->url.'page='.$page.'&q='.$query);
        $c = curl_init($this->url.'page='.$page.'&q='.$query);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $file = curl_exec($c);

        $data = Json::decode($file);
        if (isset($data['result']['items'])) {

            $data_array = [];
            foreach ($data['result']['items'] as $org) {
                // $uid = substr($org['id'], 0, strpos($org['id'], '_'));
                // $kindergarten = Kindergarten::find()->where(['uid' => $uid])->one();
                // if($kindergarten === null){
                //     $kindergarten = new Kindergarten();

                    
                $phones = '';
                $emails = '';
                if (isset($org['contact_groups'][0]))
                    foreach ($org['contact_groups'][0]['contacts'] as $contact){
                        // website phone vkontakte instagram facebook email
                        // if($contact['type'] == 'website') $kindergarten->web_link = $contact['text'];
                        if($contact['type'] == 'phone') $phones = $phones . (!empty($phones) ? ', ' : '') . $contact['text'];
                        // if($contact['type'] == 'vkontakte') $kindergarten->vk_link = $contact['text'];
                        // if($contact['type'] == 'instagram') $kindergarten->in_link = $contact['text'];
                        if($contact['type'] == 'email') $emails = $emails . (!empty($emails) ? ', ' : '') . $contact['text'];
                    }
                    
                $data_array[] = [$org['name'],$emails,$phones];
            }
            $this->writeCSV($data_array);
            
            if(((intval($data['result']['total']-1)/5)+1) > $page)
                $this->addFromUrl($query, $page+1);
        }
    }

    protected function addFromID($id, $page = 1){

        //$file = file_get_contents($this->url.'page='.$page.'&q='.$query);
        $c = curl_init($this->url_rubric_id.'page='.$page.'&rubric_id='.$id);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $file = curl_exec($c);

        $data = Json::decode($file);
        if (isset($data['result']['items'])) {
            if($page == 1) $this->ids[] = $id;
            $data_array = [];
            foreach ($data['result']['items'] as $org) {
                // $uid = substr($org['id'], 0, strpos($org['id'], '_'));
                // $kindergarten = Kindergarten::find()->where(['uid' => $uid])->one();
                // if($kindergarten === null){
                //     $kindergarten = new Kindergarten();

                    
                $phones = '';
                $emails = '';
                if (isset($org['contact_groups'][0]))
                    foreach ($org['contact_groups'][0]['contacts'] as $contact){
                        // website phone vkontakte instagram facebook email
                        // if($contact['type'] == 'website') $kindergarten->web_link = $contact['text'];
                        if($contact['type'] == 'phone') $phones = $phones . (!empty($phones) ? ', ' : '') . $contact['text'];
                        // if($contact['type'] == 'vkontakte') $kindergarten->vk_link = $contact['text'];
                        // if($contact['type'] == 'instagram') $kindergarten->in_link = $contact['text'];
                        if($contact['type'] == 'email') $emails = $emails . (!empty($emails) ? ', ' : '') . $contact['text'];
                    }
                    
                $data_array[] = [$org['name'],$emails,$phones];
            }
            $this->writeCSV($data_array);
            
            if(((intval($data['result']['total']-1)/5)+1) > $page)
                $this->addFromID($id, $page+1);
        }
    }

    protected function openCSV(){

        // open the file "demosaved.csv" for writing
        $this->file = fopen('novosibirsk.csv', 'w');
         
        // save the column headers
        fputcsv($this->file, array('Names', 'Email', 'Phones'));

    }
    protected function closeCSV(){

        // Close the file
        fclose($this->file);
        var_dump($this->ids);
    }

    protected function writeCSV($data){
         
        // save each row of the data
        foreach ($data as $row)
        {
            fputcsv($this->file, $row);
            echo $row[1]." - ".$row[0]."\n";
        }
         
    }

    public function actionFilter(){
        $baseCSV = file('novosibirsk.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);//Складываем строки из CSV файла в масив

        foreach($baseCSV as $itemBaseCSV){
        $arrLineCsv = explode(";", $itemBaseCSV);//Формируем масив из отдельной строки по разделителю ;
        $arrUniqFinish[$arrLineCsv[0].";".$arrLineCsv[1].";".$arrLineCsv[2]] = $arrLineCsv[0];//В новый масив забиваем всю строку как ключ, а елемент масива, по которому фильтруем на дубли, как значение          
        }

        $arrUniqFinish = array_unique($arrUniqFinish);//Фильтруем дубли с помощью функции array_unique.

        foreach($arrUniqFinish as $keyArr => $valueArr){
        $finishSavedCsv[] = $keyArr;//Забиваем в новый масив значения которые берем с ключей масива $arrUniqFinish, который в свою очередь уже чистый от дублей по признаку 5 столбца (счет от 0)

        }

        file_put_contents('novosibirsk_filtered.csv', implode("\n", $finishSavedCsv));//Перезаписываем CSV файл с уникальными строками
    }
}