<?php

namespace App\DataFixtures;

use App\Entity\Leader;
use App\Entity\LeaderTranslate;
use App\DataFixtures\LanguageFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class LeaderFixtures extends Fixture implements DependentFixtureInterface
{
    const LEADERS = [
      ['country' => ['RU' =>'Маори'], 'name' => ['RU' =>'Купе'], 'image' => 'civ6-gs-civilization-maori'],
      /*['country' => 'Венгрия', 'name' => 'Матвей I Корвин',  'image' => 'civ6-gs-civilization-hungary'],
      ['country' => 'Канада', 'name' => 'Вильфрид Лорье',  'image' => 'civ6-gs-civilization-canada'],
      ['country' => 'Инки', 'name' => 'Пачакутек',  'image' => 'civ6-gs-civilization-inca'],
      ['country' => 'Мали', 'name' => 'Манса Муса',  'image' => 'civ6-gs-civilization-mali'],
      ['country' => 'Швеция', 'name' => 'Кристина',  'image' => 'civ6-gs-civilization-sweden'],
      ['country' => 'Оттоманы', 'name' => 'Сулейман',  'image' => 'civ6-gs-civilization-ottomans'],
      ['country' => 'Финикия', 'name' => 'Дидона',  'image' => 'civ6-gs-civilization-phoenicia'],
      ['country' => 'Англия', 'name' => 'Алиенора Аквитанская',  'image' => 'civ6-gs-civilization-eleanor'],
      ['country' => 'Франция', 'name' => 'Алиенора Аквитанская',  'image' => 'civ6-gs-civilization-eleanor'],
      ['country' => 'Америка', 'name' => 'Тедди Рузвельт',  'image' => 'civ6_teddy1'],
      ['country' => 'Англия', 'name' => 'Виктория',  'image' => 'victoria'],
      ['country' => 'Аравия', 'name' => 'Саладин',  'image' => 'civ6-saladin'],
      ['country' => 'Ацтеки', 'name' => 'Монтесума',  'image' => 'civ6-aztec'],
      ['country' => 'Бразилия', 'name' => 'Педро II',  'image' => 'civ6_brazil_pedro'],
      ['country' => 'Германия', 'name' => 'Фридрих I',  'image' => 'Barbarossa'],
      ['country' => 'Греция', 'name' => 'Перикл',  'image' => 'Civ6_Greece_Pericles'],
      ['country' => 'Греция', 'name' => 'Горго',  'image' => 'Civ6_Greece_Gorgo'],
      ['country' => 'Египет', 'name' => 'Клеопатра',  'image' => 'Cleopatra'],
      ['country' => 'Индия', 'name' => 'Ганди',  'image' => 'Civ6_India_Gandhi'],
      ['country' => 'Испания', 'name' => 'Филип II',  'image' => 'Civ6_Spain_PhilipII'],
      ['country' => 'Китай', 'name' => 'Цинь Шихуанди',  'image' => 'qin_hero'],
      ['country' => 'Конго', 'name' => 'Нзинга Мбемба',  'image' => 'Civ6_Congo_Afonsu'],
      ['country' => 'Норвегия', 'name' => 'Харальд III Суровый',  'image' => 'Civ6_Norway_Harald'],
      ['country' => 'Рим', 'name' => 'Траян',  'image' => 'Civ6_Rome_Trajan'],
      ['country' => 'Россия', 'name' => 'Петр I',  'image' => 'Civ6_Russia_Peter'],
      ['country' => 'Скифы', 'name' => 'Томирис',  'image' => 'CivilizationVI_Scythia_Tomyris'],
      ['country' => 'Франция', 'name' => 'Екатерина Медичи',  'image' => 'CivilizationVI_France_Catherine'],
      ['country' => 'Шумеры', 'name' => 'Гильгамеш',  'image' => 'Civ6_Sumerian_Gilgamesh'],
      ['country' => 'Япония', 'name' => 'Ходзё Токимунэ',  'image' => 'civ6_tokimune1'],
      ['country' => 'Польща', 'name' => 'Ядвига',  'image' => 'jadwiga'],*/
    ];




    public function load(ObjectManager $manager)
    {

        
        foreach (LeaderFixtures::LEADERS as $head) {
            $leader = new Leader();

            $leader->setImage($head['image'] . '.jpg');
            $leader->setGamesCount(0);
            $leader->setName($head['name']['RU']);
            $leader->setCountry($head['country']['RU']);

            $manager->persist($leader);

            

            $leaderTranslateRU = new LeaderTranslate();
            
            $leaderTranslateRU->setName($head['name']['RU']);
            $leaderTranslateRU->setCountry($head['country']['RU']);
            $leaderTranslateRU->setLeader($leader);
            $leaderTranslateRU->setLanguage($this->getReference(LanguageFixtures::LANG_RU_REFERENCE));


            $leaderTranslateEN = new LeaderTranslate();

            $leaderTranslateEN->setName($head['name']['RU']);
            $leaderTranslateEN->setCountry($head['country']['RU']);
            $leaderTranslateEN->setLeader($leader);
            $leaderTranslateEN->setLanguage($this->getReference(LanguageFixtures::LANG_EN_REFERENCE));


            $leaderTranslateFR = new LeaderTranslate();

            $leaderTranslateFR->setName($head['name']['RU']);
            $leaderTranslateFR->setCountry($head['country']['RU']);
            $leaderTranslateFR->setLeader($leader);
            $leaderTranslateFR->setLanguage($this->getReference(LanguageFixtures::LANG_FR_REFERENCE));
            
            $manager->persist($leaderTranslateRU);
            $manager->persist($leaderTranslateEN);
            $manager->persist($leaderTranslateFR);

          
        };

        $manager->flush();
    }

    public function getDependencies()
    {
      return array(
        LanguageFixtures::class,
      );
    }
    
}
