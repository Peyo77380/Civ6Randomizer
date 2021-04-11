<?php

namespace App\DataFixtures;

use App\Entity\Leader;
use App\DataFixtures\LanguageFixtures;
use App\Entity\LeaderTranslateCountry;
use App\Entity\LeaderTranslateName;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class LeaderFixtures extends Fixture implements DependentFixtureInterface
{
    const LEADERS = [
      [
        'country' => [
          'RU' =>'Маори',
          'EN' => 'Maori',
          'FR' => 'Maori',
        ], 
        'name' => [
          'RU' =>'Купе',
          'EN' => 'Coupe',
          'FR' => 'Coupé',
        ],
        'image' => 'civ6-gs-civilization-maori',
      ],
      [
        'country' => [
          'RU' => 'Венгрия', 
          'EN' => 'Hungary', 
          'FR' => 'Hongrie'
        ], 
        'name' => [
          'RU' => 'Матвей I Корвин', 
          'EN' => 'Matthias Corvinus', 
          'FR' => 'Matthias I Corvin'
        ],
        'image' => 'civ6-gs-civilization-hungary'],
        ['country' => ['RU' => 'Канада', 'EN' => 'Canada', 'FR' => 'Canada'], 'name' => ['RU' => 'Вильфрид Лорье', 'EN' => 'Wilfried Laurier', 'FR' => 'Wilfried Laurier'],'image' => 'civ6-gs-civilization-canada'],
        ['country' => ['RU' => 'Инки', 'EN' => 'Incas', 'FR' => 'Incas'], 'name' => ['RU' => 'Пачакутек', 'EN' => 'Pachacutec', 'FR' => 'Pachacutec'],'image' => 'civ6-gs-civilization-inca'],
        ['country' => ['RU' => 'Мали', 'EN' => 'Mali', 'FR' => 'Mali'], 'name' => ['RU' => 'Манса Муса', 'EN' => 'Mansa Musa', 'FR' => 'Mansa Musa'],'image' => 'civ6-gs-civilization-mali'],
        ['country' => ['RU' => 'Швеция', 'EN' => 'Sweden', 'FR' => 'Suède'], 'name' => ['RU' => 'Кристина', 'EN' => 'Kristina', 'FR' => 'Kristina'],'image' => 'civ6-gs-civilization-sweden'],
        ['country' => ['RU' => 'Оттоманы', 'EN' => 'Ottomans', 'FR' => 'Ottomans'], 'name' => ['RU' => 'Сулейман', 'EN' => 'Suleiman', 'FR' => 'Soliman'],'image' => 'civ6-gs-civilization-ottomans'],
        ['country' => ['RU' => 'Финикия', 'EN' => 'Phoenicia', 'FR' => 'Phénicie'], 'name' => ['RU' => 'Дидона', 'EN' => 'Dido', 'FR' => 'Didon'],'image' => 'civ6-gs-civilization-phoenicia'],
        ['country' => ['RU' => 'Англия', 'EN' => 'England', 'FR' => 'Angleterre'], 'name' => ['RU' => 'Алиенора Аквитанская', 'EN' => 'Alienora Aquitaine', 'FR' => 'Alienora Aquitaine'],'image' => 'civ6-gs-civilization-eleanor'],
        ['country' => ['RU' => 'Франция', 'EN' => 'France', 'FR' => 'France'], 'name' => ['RU' => 'Алиенора Аквитанская', 'EN' => 'Alienora Aquitaine', 'FR' => 'Alienora Aquitaine'],'image' => 'civ6-gs-civilization-eleanor'],
        ['country' => ['RU' => 'Америка', 'EN' => 'America', 'FR' => 'Amérique'], 'name' => ['RU' => 'Тедди Рузвельт', 'EN' => 'Teddy Roosevelt', 'FR' => 'Theodore Roosevelt'],'image' => 'civ6_teddy1'],
        ['country' => ['RU' => 'Англия', 'EN' => 'England', 'FR' => 'Angleterre'], 'name' => ['RU' => 'Виктория', 'EN' => 'Victoria', 'FR' => 'Victoria'],  'image' => 'victoria'],
        ['country' => ['RU' => 'Аравия', 'EN' => 'Arabia', 'FR' => 'Arabie'], 'name' => ['RU' => 'Саладин', 'EN' => 'Saladin', 'FR' => 'Saladin'],'image' => 'civ6-saladin'],
        ['country' => ['RU' => 'Ацтеки', 'EN' => 'Aztecs', 'FR' => 'Aztèques'], 'name' => ['RU' => 'Монтесума', 'EN' => 'Montezuma', 'FR' => 'Montezuma'],'image' => 'civ6-aztec'],
        ['country' => ['RU' => 'Бразилия', 'EN' => 'Brazil', 'FR' => 'Brésil'], 'name' => ['RU' => 'Педро II', 'EN' => 'Pedro II', 'FR' => 'Pedro II'],'image' => 'civ6_brazil_pedro'],
        ['country' => ['RU' => 'Германия', 'EN' => 'Germany', 'FR' => 'Allemagne'], 'name' => ['RU' => 'Фридрих I', 'EN' => 'Frederick I', 'FR' => 'Frédéric Barberousse'],  'image' => 'Barbarossa'],
        ['country' => ['RU' => 'Греция', 'EN' => 'Greece', 'FR' => 'Grèce'], 'name' => ['RU' => 'Перикл', 'EN' => 'Pericles', 'FR' => 'Périclès'],'image' => 'Civ6_Greece_Pericles'],
        ['country' => ['RU' => 'Греция', 'EN' => 'Greece', 'FR' => 'Grèce'], 'name' => ['RU' => 'Горго', 'EN' => 'Gorgo', 'FR' => 'Gorgo'],'image' => 'Civ6_Greece_Gorgo'],
        ['country' => ['RU' => 'Египет', 'EN' => 'Egypt', 'FR' => 'Egypte'], 'name' => ['RU' => 'Клеопатра', 'EN' => 'Cleopatra', 'FR' => 'Cléopâtre'],  'image' => 'Cleopatra'],
        ['country' => ['RU' => 'Индия', 'EN' => 'India', 'FR' => 'Inde'], 'name' => ['RU' => 'Ганди', 'EN' => 'Gandhi', 'FR' => 'Gandhi'],'image' => 'Civ6_India_Gandhi'],
        ['country' => ['RU' => 'Испания', 'EN' => 'Spain', 'FR' => 'Espagne'], 'name' => ['RU' => 'Филип II', 'EN' => 'Philip II', 'FR' => 'Philippe II'],'image' => 'Civ6_Spain_PhilipII'],
        ['country' => ['RU' => 'Китай', 'EN' => 'China', 'FR' => 'Chine'], 'name' => ['RU' => 'Цинь Шихуанди', 'EN' => 'Qin shihuangdi', 'FR' => 'Qin shihuangdi'],  'image' => 'qin_hero'],
        ['country' => ['RU' => 'Конго', 'EN' => 'Congo', 'FR' => 'Congo'], 'name' => ['RU' => 'Нзинга Мбемба', 'EN' => 'Nzinga Mbemba', 'FR' => 'Nzinga Mbemba'],'image' => 'Civ6_Congo_Afonsu'],
        ['country' => ['RU' => 'Норвегия', 'EN' => 'Norway', 'FR' => 'Norvège'], 'name' => ['RU' => 'Харальд III Суровый', 'EN' => 'Harald III the Severe', 'FR' => 'Harald III le Sévère'],'image' => 'Civ6_Norway_Harald'],
        ['country' => ['RU' => 'Рим', 'EN' => 'Rome', 'FR' => 'Rome'], 'name' => ['RU' => 'Траян', 'EN' => 'Trajan', 'FR' => 'Trajan'],'image' => 'Civ6_Rome_Trajan'],
        ['country' => ['RU' => 'Россия', 'EN' => 'Russia', 'FR' => 'Russie'], 'name' => ['RU' => 'Петр I', 'EN' => 'Peter I', 'FR' => 'Peter I'],'image' => 'Civ6_Russia_Peter'],
        ['country' => ['RU' => 'Скифы', 'EN' => 'Scythians', 'FR' => 'Scythes'], 'name' => ['RU' => 'Томирис', 'EN' => 'Tomiris', 'FR' => 'Tomiris'],  'image' => 'CivilizationVI_Scythia_Tomyris'],
        ['country' => ['RU' => 'Франция', 'EN' => 'France', 'FR' => 'France'], 'name' => ['RU' => 'Екатерина Медичи', 'EN' => 'Catherine de Medici', 'FR' => 'Catherine de Médicis'],  'image' => 'CivilizationVI_France_Catherine'],
        ['country' => ['RU' => 'Шумеры', 'EN' => 'Sumerians', 'FR' => 'Sumériens'], 'name' => ['RU' => 'Гильгамеш', 'EN' => 'Gilgamesh', 'FR' => 'Gilgamesh'],'image' => 'Civ6_Sumerian_Gilgamesh'],
        ['country' => ['RU' => 'Япония', 'EN' => 'Japan', 'FR' => 'Japon'], 'name' => ['RU' => 'Ходзё Токимунэ', 'EN' => 'Hojo Tokimune', 'FR' => 'Hojo Tokimune'],'image' => 'civ6_tokimune1'],
        ['country' => ['RU' => 'Польща', 'EN' => 'Poland', 'FR' => 'Pologne'], 'name' => ['RU' => 'Ядвига', 'EN' => 'Jadwiga ', 'FR' => 'Jadwiga '],  'image' => 'jadwiga'],
    ];


    public function load(ObjectManager $manager)
    {
        $ref = [];
        $ref[] = [
          'iso' => 'RU', 
          'ref' => $this->getReference(LanguageFixtures::LANG_RU_REFERENCE)
        ];
        $ref[] = [
          'iso' => 'EN', 
          'ref' => $this->getReference(LanguageFixtures::LANG_EN_REFERENCE)
        ];
        $ref[] = [
          'iso' => 'FR', 
          'ref' => $this->getReference(LanguageFixtures::LANG_FR_REFERENCE)
        ];
        
        foreach (LeaderFixtures::LEADERS as $head) {
            $leader = new Leader();

            $leader->setImage($head['image'] . '.jpg');
            $leader->setGamesCount(0);

            $manager->persist($leader);

            

            foreach ($ref as $lang) {

              $leaderTranslateName = new LeaderTranslateName();

              $leaderTranslateName->setLeader($leader);
              $leaderTranslateName->addLanguage($lang['ref']);
              $leaderTranslateName->setTranslation($head['name'][$lang['iso']]);

              $manager->persist($leaderTranslateName);

              $countryTranslate = new LeaderTranslateCountry();

              $countryTranslate->setLeader($leader);
              $countryTranslate->addLanguage($lang['ref']);
              $countryTranslate->setTranslation($head['country'][$lang['iso']]);
      
              $manager->persist($countryTranslate);
              
            }
           
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
